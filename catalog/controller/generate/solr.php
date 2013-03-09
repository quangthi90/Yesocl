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
		
		$code .= $this->getCode( $this->request->get['document'], '$this->' );

		$code .= "\n\t\t" . '$this->solrContent = $solrContent;';
		$code .= "\n\t\t" . 'return $solrContent;';
		$code .= "\n\t" . '}';
		$code .= "\n" . '}';

		// print($code);
		// exit;
		$file = DIR_ROOT . 'object/document/' . $this->request->get['document'] . '.php';

		$fp = fopen( $file, 'a' );
		fwrite($fp, $code);
		fclose($fp);
		
		print "Document is written success! Please check file: " . $file;
	}

	private function getCode( $file_name, $parent ){
		$file = DIR_ROOT . 'object/document/' . $file_name . '.php';
		
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
			'/** @MongoDB\ReferenceMany(targetDocument="',
			'") */',
		);

		$code = '';
		
		foreach ( $lines as $key => $line ){
			if ( strpos($line, '@BmSolr') != null ){
				$collected = false;
				for ( $i = $key; $i < count($lines); $i++ ){
					if ( strpos($lines[$i], '$') != null ){
						$param_name = 'get' . trim( ucwords(str_replace($clear_global, "", $lines[$i])) ) . '()';
						$collected = true;
						$code .= "\n\t\t" . '$solrContent .= ' . $parent . $param_name . ' . "  ";';
					}

					if ( $collected ){
						break;
					}
				}
			}

			if ( strpos($line, "EmbedMany") != null ){
				$file_name = trim( str_replace($clear_document, "", $line) );

				$param = $this->getParam($lines, $key);
				$code .= "\n\n\t\t" . 'if ( count($this->' . $param . ') > 0 ) {';
				$code .= "\n\t\t\t" . 'foreach ($this->' . $param . ' as $data) {';
				$code .= $this->getCode( $file_name, '$data->' );
				$code .= "\n\t\t\t" . '}';
				$code .= "\n\t\t" . '}' . "\n";
				// print($code); exit;
			}
		}

		return $code;
	}

	private function getParam( $lines, $index ){
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
				return 'get' . trim( ucwords(str_replace($clear_global, "", $lines[$i])) ) . '()';
			}
		}
	}
}
?>