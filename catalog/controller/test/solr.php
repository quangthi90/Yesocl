<?php
class ControllerTestSolr extends Controller{
	public function index(){
		//------------------ Bootstrap --------------------
		/* Domain name of the Solr server */
		define('SOLR_SERVER_HOSTNAME', 'http://localhost:8983/solr/');
		
		/* Whether or not to run in secure mode */
		define('SOLR_SECURE', true);
		
		/* HTTP Port to connection */
		define('SOLR_SERVER_PORT', ((SOLR_SECURE) ? 8443 : 8983));
		
		/* HTTP Basic Authentication Username */
		define('SOLR_SERVER_USERNAME', 'root');
		
		/* HTTP Basic Authentication password */
		define('SOLR_SERVER_PASSWORD', 'changeit');
		
		/* HTTP connection timeout */
		/* This is maximum time in seconds allowed for the http data transfer operation. Default value is 30 seconds */
		define('SOLR_SERVER_TIMEOUT', 10);
		
		/* File name to a PEM-formatted private key + private certificate (concatenated in that order) */
		define('SOLR_SSL_CERT', 'certs/combo.pem');
		
		/* File name to a PEM-formatted private certificate only */
		define('SOLR_SSL_CERT_ONLY', 'certs/solr.crt');
		
		/* File name to a PEM-formatted private key */
		define('SOLR_SSL_KEY', 'certs/solr.key');
		
		/* Password for PEM-formatted private key file */
		define('SOLR_SSL_KEYPASSWORD', 'StrongAndSecurePassword');
		
		/* Name of file holding one or more CA certificates to verify peer with*/
		define('SOLR_SSL_CAINFO', 'certs/cacert.crt');
		
		/* Name of directory holding multiple CA certificates to verify peer with */
		define('SOLR_SSL_CAPATH', 'certs/');
		
		//------------------ end Bootstrap -----------------
		
		$options = array
		(
		    'hostname' => SOLR_SERVER_HOSTNAME,
		    'login'    => SOLR_SERVER_USERNAME,
//		    'password' => SOLR_SERVER_PASSWORD,
		    'port'     => SOLR_SERVER_PORT,
		);
		
		$client = new SolrClient($options);
		
		$doc = new SolrInputDocument();
		
		$doc->addField('id', 334455);
		$doc->addField('cat', 'Software');
		$doc->addField('cat', 'Lucene');
		
		$updateResponse = $client->addDocument($doc);
		
		print_r($updateResponse->getResponse());
	}
}
?>