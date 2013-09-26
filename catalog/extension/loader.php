<?php

class ExtensionLoader
{
    private $config;
    private $customer;
    private $session;

    public function __construct(Twig_Environment $twig, $registry){
        $this->config = $registry->get('config');
        $this->customer = $registry->get('customer');
        $this->session = $registry->get('session');

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
            new Twig_SimpleFunction('get_flash', array($this, 'getFlash'))
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
}