<?php
class ControllerGenerateDocumentDoctrine extends Controller{
	public function index(){
		if ( !isset($this->request->get['token']) || $this->request->get['token'] != '117465c9fb58077646d3dfa16998f754' ){
			$this->redirect( $this->url->link('error/not_found') );
		}
		 
		if ( !isset($this->request->get['document']) || empty($this->request->get['document']) ){
			$this->redirect( $this->url->link('error/not_found') );
		}
		
		$file = DIR_ROOT . 'object/document/' . $this->request->get['document'] . '.php';
		
		$lines = file($file);
		
		$output = '';
		
		$array_replace = array(
			'/** @MongoDB\EmbedMany(targetDocument="', 
			'/** @MongoDB\ReferenceMany(targetDocument="',
			'") */',
			'/** @MongoDB\Collection */',
			'/** @MongoDB\Hash */'
		);
		
		foreach ( $lines as $key => $line ){
			if ( strpos($line, '/** @MongoDB') != null ){
				$name = str_replace( array("private $", ";"), "", trim($lines[$key + 1]) );
				
				$name_up = ucwords( $name );
				
				$name_single_up = '';
				
				if ( $name != 'id' ){
					if ( strpos($name, 'array()') != null ){
						$document = str_replace( $array_replace, "", trim($line) );
						
						$document = str_replace( stristr($document, '"'), "", $document );
						
						$name = str_replace( array(" = Array()", " = array()"), "", $name );
						
						$name_up = ucwords( $name );
						
						$name_single = substr( $name, 0, -1 );
						
						$name_single_up = ucwords( $name_single );
						
						$output .= "\n" . "\n" . "\t" . 'public function add' . $name_single_up . '( ' . $document . ' $' . $name_single . ' ){' . "\n";
						$output .= "\t" . "\t" . '$this->' . $name . '[] = $' . $name_single . ';' . "\n";
						$output .= "\t" . '}';
					}
					
					$output .= "\n" . "\n" . "\t" . 'public function set' . $name_up . '( $' . $name . ' ){' . "\n";
					$output .= "\t" . "\t" . '$this->' . $name . ' = $' . $name . ';' . "\n";
					$output .= "\t" . '}';
				}
				
				$output .= "\n" . "\n" . "\t" . 'public function get' . $name_up . '(){' . "\n";
				$output .= "\t" . "\t" . 'return $this->' . $name . ';' . "\n";
				$output .= "\t" . '}';
				
				if ( strpos($line, '/** @MongoDB\Date */') && $name == 'created' ){
					$output .= "\n" . "\n" . "\t" . '/** @MongoDB\PrePersist */';
					$output .= "\n" . "\t" . 'public function prePersist(){' . "\n";
					$output .= "\t" . "\t" . '$this->' . $name . ' = new \DateTime();' . "\n";
					$output .= "\t" . '}';
				}
			}
		}
		
		$output .= "\n" . '}';
		
		$fp = fopen( $file, 'a' );
		fwrite($fp, $output);
		fclose($fp);
		
		print "Document is written success! Please check file: " . $file;
	}
}
?>