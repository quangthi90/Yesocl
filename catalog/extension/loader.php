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
        );
    }

    public function getFilters()
    {
    }

    public function path( $path, $params = array() ){
        $routing = $this->config->get('routing')[$path];
        $parts = explode( '/', $routing );

        foreach ( $params as $key => $param ) {
            if ( $index = array_search("{".$key."}", $parts) !== false ){
                $parts[$index] = $param;
            }
        }

        return implode('/', $parts);
    }
}