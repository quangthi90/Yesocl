<?php
use Doctrine\MongoDB\Connection,
    Doctrine\Common\ClassLoader,
//    Doctrine\Common\EventManager,
    Doctrine\Common\Annotations\AnnotationRegistry,
    Doctrine\ODM\MongoDB\DocumentManager,
    Doctrine\ODM\MongoDB\Configuration,
    Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
//    Doctrine\Solr\Subscriber\MongoDBSubscriber,
//	Doctrine\Solr\Metadata\Driver\AnnotationDriver as SolrDriver,
//	Doctrine\Solr\Configuration as SolrConfig;

class Doctrine {
    protected $registry;
    protected $dm;
//    protected $client;

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
//        $classLoader = new \Doctrine\Common\ClassLoader('Doctrine\Solr', DIR_DATABASE);
//        $classLoader->register();
        
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
        $configD->setDefaultDB('yesocl');

        $connection = new \Doctrine\MongoDB\Connection('mongodb://admin:admin@ds041367.mongolab.com:41367/yesocl');

        $this->dm = \Doctrine\ODM\MongoDB\DocumentManager::create($connection, $configD); 

        \Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver::registerAnnotationClasses();
        
//        SolrDriver::registerAnnotationClasses();
		AnnotationRegistry::registerFile(
		    DIR_DATABASE . 'Doctrine/ODM/MongoDB/Mapping/Annotations/DoctrineAnnotations.php'
		);
		
		// Config Solr
//        $config = \Doctrine\Solr\Configuration::fromConfig(array());
//		$em = new EventManager();
//		Doctrine\Solr\Runner::run($config, $em);
//		
//		$this->client =  $config->getSolariumClientImpl();
	}

    public function __get($key) {
        return $this->registry->get($key);
    }
    
    public function __set($key, $value) {
        $this->registry->set($key, $value);
    }
}
?>