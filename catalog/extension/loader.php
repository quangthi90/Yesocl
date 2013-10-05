<?php

class ExtensionLoader
{
    private $config;
    private $customer;
    private $session;
    private $load;
    private $registry;

    public function __construct(Twig_Environment $twig, $registry){
        $this->registry = $registry;

        $this->config = $registry->get('config');
        $this->customer = $registry->get('customer');
        $this->session = $registry->get('session');
        $this->dm = $registry->get('dm');
        $this->load = $registry->get('load');

        // filters
        foreach ($this->getFilters() as $filter) {
            $twig->addFunction( $function );
        }

        // functions
        foreach ($this->getFunctions() as $function) {
            $twig->addFunction( $function );
        }
    }

    public function getName(){
        return 'catalog_extension';
    }

    public function getFunctions()
    {
        return array(
            new Twig_SimpleFunction('path', array($this, 'path')),
            new Twig_SimpleFunction('asset_css', array($this, 'assetCss')),
            new Twig_SimpleFunction('asset_js', array($this, 'assetJs')),
            new Twig_SimpleFunction('asset_img', array($this, 'assetImg')),
            new Twig_SimpleFunction('get_current_user', array($this, 'getCurrentUser')),
            new Twig_SimpleFunction('get_flash', array($this, 'getFlash')),
            new Twig_SimpleFunction('get_friend_list', array($this, 'getFriendList')),
            new Twig_SimpleFunction('in_array', array($this, 'inArray')),
            new Twig_SimpleFunction('get_request_friend', array($this, 'getRequestFriend'))
        );
    }

    public function getFilters()
    {
        return array();
    }

    public function path( $path, $params = array() ){
        $routing = $this->config->get('routing')[$path];
        $parts = explode( '/', $routing );

        foreach ( $params as $key => $param ) {
            $index = array_search( "{".$key."}", $parts );
            if ( $index !== false ){
                $parts[$index] = $param;
            }
        }
        
        return HTTPS_SERVER . implode('/', $parts);
    }

    public function assetCss( $path ){
        return HTTPS_SERVER . 'catalog/view/theme/default/stylesheet/' . $path;
    }

    public function assetJs( $path ){
        return HTTPS_SERVER . 'catalog/view/javascript/' . $path;
    }

    public function assetImg( $path ){
        return HTTP_IMAGE . $path;
    }

    public function getCurrentUser(){
        return $this->customer;
    }

    public function getFlash( $key ){
        return $this->session->getFlash( $key );
    }

    public function getFriendList($array = false){
        $user = $this->dm->getRepository('Document\User\User')->find( $this->customer->getId() );

        if ( $user ){
            if ( $array == false ){
                return $user->getFriends();
            }

            $friends = array();
            foreach ( $user->getFriends() as $friend ) {
                $friends[$friends->getUser()->getId()] = $friend;
            }
            return $friends;
        }

        return null;
    }

    public function inArray( $el, $array ){
        return in_array($el, $array);
    }

    public function getRequestFriend(){
        $friend_ids = $this->customer->getFriendRequests();

        $this->load->model('user/user');
        $this->load->model('tool/image');

        $users = $this->registry->get('model_user_user')->getUsers(array(
            'user_ids' => $friend_ids
        ));

        $returns = array();

        foreach ( $users as $user ) {
            $user = $user->formatToCache();

            if ( !empty($user['avatar']) ){
                $user['avatar'] = $this->registry->get('model_tool_image')->resize( $user['avatar'], 180, 180 );
            }elseif ( !empty($user['email']) ){
                $user['avatar'] = $this->registry->get('model_tool_image')->getGavatar( $user['email'], 180 );
            }else{
                $user['avatar'] = $this->registry->get('model_tool_image')->resize( 'no_user_avatar.png', 180, 180 );
            }

            $returns[] = $user;
        }

        return $returns;
    }
}