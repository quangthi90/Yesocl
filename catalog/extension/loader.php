<?php

class ExtensionLoader
{
    private $config;
    public function __construct(Twig_Environment $twig, $config){
        $this->config = $config;
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
            if ( $index = array_search("{".$key."}", $parts) !== false ){
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
}