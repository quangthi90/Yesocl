<?php

class ExtensionLoader
{
    private $config;
    private $customer;
    private $session;
    private $load;
    private $registry;
    private $recentTime;
    private $request;

    public function __construct(Twig_Environment $twig, $registry){
        $this->registry = $registry;

        $this->config = $registry->get('config');
        $this->customer = $registry->get('customer');
        $this->session = $registry->get('session');
        $this->request = $registry->get('request');
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

        // Default reference params
        $this->recentTime = new DateTime();
        date_sub( $this->recentTime, date_interval_create_from_date_string('15 days') );
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
            new Twig_SimpleFunction('is_logged', array($this, 'isLogged')),
            new Twig_SimpleFunction('get_flash', array($this, 'getFlash')),
            new Twig_SimpleFunction('get_friend_list', array($this, 'getFriendList')),
            new Twig_SimpleFunction('in_array', array($this, 'inArray')),
            new Twig_SimpleFunction('get_request_friend', array($this, 'getRequestFriend')),
            new Twig_SimpleFunction('date_format', array($this, 'dateFormat')),
            new Twig_SimpleFunction('get_cookie', array($this, 'getCookie')),
            new Twig_SimpleFunction('get_datetime_from_now', array($this, 'getDatetimeFromNow')),
            new Twig_SimpleFunction('localized_date', array($this, 'localizedDate')),
            new Twig_SimpleFunction('get_routing_list', array($this, 'getRoutingList')),
            new Twig_SimpleFunction('get_user_data', array($this, 'getUserData')),
            new Twig_SimpleFunction('get_fb_api_id', array($this, 'getFbApiId'))
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

        if ( count($params) == 0 ){
            foreach ( $parts as $key => $data ) {
                if ( preg_match('/^{/', $data) && preg_match('/}$/', $data) ){
                    array_splice($parts, $key, 1);
                }
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

    public function getCurrentUser( $width = 180, $height = 180){
        $this->load->model('tool/image');

        $oUser = $this->customer->getUser();
        if ( !$oUser ){
            return null;
        }
        $aUser = $oUser->formatToCache();
        $aUser['avatar'] = $this->registry->get('model_tool_image')->getAvatarUser( $aUser['avatar'], $aUser['email'], $width, $height );
        
        return $aUser;
    }

    public function isLogged(){
        return $this->customer->isLogged();
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

            $user['avatar'] = $this->registry->get('model_tool_image')->getAvatarUser( $user['avatar'], $user['email'] );

            $returns[] = $user;
        }

        return $returns;
    }

    public function dateFormat( DateTime $datetime = null ){
        if ( $datetime == null ){
            $datetime = new DateTime();
        }
        
        return $datetime->format( $this->registry->get('language')->get('date_format_long') );
    }

    public function getCookie( $key ){
        return $this->request->cookie[$key];
    }

    public function getDatetimeFromNow( $value ){
        $datetime = new DateTime();
        date_add( $datetime, date_interval_create_from_date_string($value . ' days') );
        return $datetime;
    }

    public function localizedDate($date, $dateFormat = 'medium', $timeFormat = 'medium', $locale = null, $timezone = null, $format = null){
        if (!class_exists('IntlDateFormatter')) {
            throw new RuntimeException('The intl extension is needed to use intl-based filters.');
        }

        $formatValues = array(
            'none'   => IntlDateFormatter::NONE,
            'short'  => IntlDateFormatter::SHORT,
            'medium' => IntlDateFormatter::MEDIUM,
            'long'   => IntlDateFormatter::LONG,
            'full'   => IntlDateFormatter::FULL,
        );

        $formatter = IntlDateFormatter::create(
            $locale,
            $formatValues[$dateFormat],
            $formatValues[$timeFormat],
            $date->getTimezone()->getName(),
            IntlDateFormatter::GREGORIAN,
            $format
        );

        return $formatter->format($date->getTimestamp());
    }

    public function getRoutingList(){
        return json_encode($this->config->get('routing'));
    }

    public function getUserData(){
        $oLoggedUser = $this->customer->getUser();
        if ( !$oLoggedUser ){
            return json_encode( array() );
        }
        $this->load->model('tool/image');
        $this->load->model('friend/friend');
        $this->load->model('friend/follower');

        // Friends
        $lFriends = $this->registry->get('model_friend_friend')->getFriends( $oLoggedUser->getId(), true );
        $aFriendIds = array();
        foreach ( $lFriends as $oFriend ) 
            $aFriendIds[] = $oFriend->getUser()->getId();
        $aRequestIds = $oLoggedUser->getFriendRequests();
        
        // Followers
        $oFollowers = $this->registry->get('model_friend_follower')->getFollowers( $oLoggedUser->getId() );
        $aFollowedIds = array();
        $aFollowingIds = array();
        if ( $oFollowers ){
            $lFolloweds = $oFollowers->getFolloweds();
            $lFollowings = $oFollowers->getFollowings();
            foreach ( $lFolloweds as $oFollower ) 
                $aFollowedIds[] = $oFollower->getUser()->getId();
            foreach ( $lFollowings as $oFollower ) 
                $aFollowingIds[] = $oFollower->getUser()->getId();
        }
        
        // Avatar
        $sAvatar = $this->registry->get('model_tool_image')->getAvatarUser( 
            $oLoggedUser->getAvatar(),
            $oLoggedUser->getPrimaryEmail()->getEmail()
        );
        $aReturn = array(
            'id' => $oLoggedUser->getId(),
            'username' => $oLoggedUser->getUsername(),
            'fullname' => $oLoggedUser->getFullname(),
            'slug' => $oLoggedUser->getSlug(),
            'avatar' => $sAvatar,
            'friends' => array(
                'friend_ids' => $aFriendIds,
                'request_ids' => $aRequestIds
            ),
            'followers' => array(
                'followed_ids' => $aFollowedIds,
                'following_ids' => $aFollowingIds
            )
        );

        return json_encode( $aReturn );
    }

    public function getFbApiId(){
        return FB_API_ID;
    }
}