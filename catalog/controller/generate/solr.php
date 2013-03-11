<?php
class ControllerGenerateSolr extends Controller{
	public function index(){
		if ( !isset($this->request->get['token']) || $this->request->get['token'] != '117465c9fb58077646d3dfa16998f754' ){
			$this->redirect( $this->url->link('error/not_found') );
		}
		 
		if ( !isset($this->request->get['document']) || empty($this->request->get['document']) ){
			$this->redirect( $this->url->link('error/not_found') );
		}
		
		$code = "\n\n\t" . '/**';
		$code .= "\n\t" . '* @SOLR\Field(type="text")';
		$code .= "\n\t" . '*/';
		$code .= "\n\t" . 'private $solrContent;';

		$code .= "\n\n\t" . 'public function setSolrContent( $solrContent ){';
		$code .= "\n\t\t" . '$this->solrContent = $solrContent;';
		$code .= "\n\t" . '}';

		$code .= "\n\n\t" . 'public function getSolrContent(){';
		$code .= "\n\t\t" . '$solrContent = "";';
		$code .= "\n";
		
		$code .= $this->getCode( $this->request->get['document'], '$this->' );

		$code .= "\n";
		$code .= "\n\n\t\t" . '$this->solrContent = $solrContent;';
		$code .= "\n\t\t" . 'return $solrContent;';
		$code .= "\n\t" . '}';
		$code .= "\n" . '}';
		
		$file = DIR_ROOT . 'object/' . $this->request->get['document'] . '.php';

		$fp = fopen( $file, 'a' );
		fwrite($fp, $code);
		fclose($fp);
		
		print "Document is written success! Please check file: " . $file;
	}

	private function getCode( $file_name, $parent ){
		$file = DIR_ROOT . 'object/' . strtolower($file_name) . '.php';
		
		$lines = file($file);
		
		$output = '';
		
		$clear_global = array(
			'private',
			'protected',
			'public',
			';',
			'$'
		);

		$clear_document = array(
			'/** @MongoDB\EmbedMany(targetDocument="', 
			'* @MongoDB\EmbedMany(targetDocument="',
			'/** @MongoDB\EmbedOne(targetDocument="',  
			'* @MongoDB\EmbedOne(targetDocument="',
			'") */',
			'")',
		);

		$code = '';
		
		$collected = true;
		foreach ( $lines as $key => $line ){
			if ( strpos($line, '@BmSolr') != null ) {
				$collected = false;
			}

			if ( !$collected ) {
				if ( strpos($line, "EmbedMany") != null ) {
					$file_name = trim( str_replace($clear_document, "", $line) );
					$param = $this->getParam($lines, $key);

					$code .= "\n\n\t\t" . 'if ( count($this->' . $param . ') > 0 ) {';
					$code .= "\n\t\t\t" . 'foreach ($this->' . $param . ' as $data) {';
					$code .= $this->getCode( $file_name, '$data->' );
					$code .= "\n\t\t\t" . '}';
					$code .= "\n\t\t" . '}';
					$code .= "\n";

					$collected = true;
				}elseif( strpos($line, "EmbedOne") != null) {
					$file_name = trim( str_replace($clear_document, "", $line) );
					$param = $this->getParam($lines, $key, $upcase = false);

					$code .= $this->getCode( $file_name, $parent . $param . '->' );

					$collected = true;
				}elseif ( strpos($line, '$') != null ) {
					$param_name = 'get' . trim( ucwords(str_replace($clear_global, "", $line)) ) . '()';
					$code .= "\n\t\t" . '$solrContent .= ' . $parent . $param_name . ' . "  ";';
					
					$collected = true;
				}
			}
		}

		return $code;
	}

	private function getParam( $lines, $index, $upcase = true ){
		$clear_global = array(
			'private',
			'protected',
			'public',
			';',
			'$',
			'array()',
			'='
		);

		for ( $i = $index; $i < count($lines); $i++ ){
			if ( strpos($lines[$i], '$') != null ){
				if ( $upcase ) {
					return 'get' . trim( ucwords(str_replace($clear_global, "", $lines[$i])) ) . '()';
				}else {
					return trim( str_replace($clear_global, "", $lines[$i]) );
				}
			}
		}
	}
}
?>