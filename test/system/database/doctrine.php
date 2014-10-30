<?php
use Doctrine\MongoDB\Connection,
    Doctrine\Common\ClassLoader,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\ODM\MongoDB\DocumentManager,
    Doctrine\ODM\MongoDB\Configuration,
    Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

class Doctrine {
    protected $registry;
    protected $dm;
	protected $client;

    public function __construct($registry) {
        $this->registry = $registry;

        require_once DIR_DATABASE . '/Doctrine/Common/ClassLoader.php';

        //----------------------------- Load library -------------------------
        // Doctrine Common
        $classLoader = new \Doctrine\Common\ClassLoader('Doctrine\ODM\MongoDB', DIR_DATABASE);
        $classLoader->register();
        
        // MongoDB
        $classLoader = new \Doctrine\Common\ClassLoader('Doctrine\MongoDB', DIR_DATABASE);
        $classLoader->register();
        
        // Common
        $classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Common', DIR_DATABASE);
        $classLoader->register();
		
		// Solr
        $classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Solr', DIR_DATABASE);
        $classLoader->register();
		
		// Solarium
        $classLoader = new \Doctrine\Common\ClassLoader('Solarium', DIR_DATABASE);
        $classLoader->register();
		
		// Symfony
        $classLoader = new \Doctrine\Common\ClassLoader('Symfony', DIR_DATABASE);
        $classLoader->register();
        
        // -------------------------- Others --------------------
        $classLoader = new \Doctrine\Common\ClassLoader('Document', DIR_ROOT . '/object');
        $classLoader->register();
        $classLoader = new \Doctrine\Common\ClassLoader('Hydrator', DIR_ROOT . '/object');
        $classLoader->register();
        $classLoader = new \Doctrine\Common\ClassLoader('Proxy', DIR_ROOT . '/object');
        $classLoader->register();
        $classLoader = new \Doctrine\Common\ClassLoader('Repository', DIR_ROOT . '/object');
        $classLoader->register();

        $configD = new \Doctrine\ODM\MongoDB\Configuration();
        $configD->setMetadataCacheImpl(new \Doctrine\Common\Cache\ArrayCache);
        $configD->setMetadataDriverImpl(AnnotationDriver::create(DIR_ROOT . '/object/document'));
        $configD->setProxyDir(DIR_ROOT . '/object/proxy');
        $configD->setProxyNamespace('Proxy');
        $configD->setHydratorDir(DIR_ROOT . '/object/hydrator');
        $configD->setHydratorNamespace('Hydrator'); 
        $configD->setDefaultDB( DB_DATABASE );// yesocl

        $connection = new \Doctrine\MongoDB\Connection(new Mongo());

        $this->dm = \Doctrine\ODM\MongoDB\DocumentManager::create($connection, $configD); 

        \Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver::registerAnnotationClasses();
        
		AnnotationRegistry::registerFile(
		    DIR_DATABASE . 'Doctrine/ODM/MongoDB/Mapping/Annotations/DoctrineAnnotations.php'
		);
		
		AnnotationRegistry::registerFile(
		    DIR_DATABASE . 'Doctrine/Solr/Mapping/Annotations/SolrAnnotations.php'
		);
			
		// solr
		$optionArr = array(
			'solarium_client_config' => array(
				'host' => '127.0.0.1',
				'port' => 8983,
				'path' => '/solr/',
				),
			);
		$configSolr = Doctrine\Solr\Configuration::fromConfig( $optionArr );
		Doctrine\Solr\Runner::run($configSolr, $this->dm->getEventManager());
		$this->client = $configSolr->getSolariumClientImpl();
		
	}

    public function __get($key) {
        return $this->registry->get($key);
    }
    
    public function __set($key, $value) {
        $this->registry->set($key, $value);
    }

    public function getDm(){
        return $this->dm;
    }

    public function getClient(){
        return $this->client;
    }
}
?>