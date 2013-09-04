<?php

class ExtensionLoader
{
    private $config;
    private $customer;
    public function __construct(Twig_Environment $twig, $registry){
        $this->config = $registry->get('config');
        $this->customer = $registry->get('customer');

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
            new Twig_SimpleFunction('get_current_user', array($this, 'getCurrentUser'))
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
        return HTTP_CATALOG . 'catalog/view/theme/default/stylesheet/' . $path;
    }

    public function assetJs( $path ){
        return HTTP_CATALOG . 'catalog/view/javascript/' . $path;
    }

    public function assetImg( $path ){
        return HTTP_IMAGE . $path;
    }

    public function getCurrentUser(){
        return $this->customer;
    }
}