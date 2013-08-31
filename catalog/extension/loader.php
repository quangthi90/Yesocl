<?php

class ExtensionLoader
{
    private $config;
    public function __construct(Twig_Environment $twig, $config){
        $this->config = $config;
        // filters
        // foreach ($extension->getFilters() as $name => $filter) {
        //     if ($name instanceof Twig_SimpleFilter) {
        //         $filter = $name;
        //         $name = $filter->getName();
        //     } elseif ($filter instanceof Twig_SimpleFilter) {
        //         $name = $filter->getName();
        //     }

        //     $this->filters[$name] = $filter;
        // }

        // functions
        foreach ($this->getFunctions() as $function) {
            // print($function->getName()); exit;
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

    public function path(  ){
        return $this->config->get('routing')['BranchPage'];
        // exit;
    }
}