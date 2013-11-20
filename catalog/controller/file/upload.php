<?php
/**
* 
*/
class ControllerFileUpload extends Controller
{
	public function index(){
		$this->load->model( 'tool/image' );		
		$path = $this->config->get('common')['image']['upload_cache'];
		if ( !empty($this->request->files['files']['name'][0]) ){
			$name = $this->request->files['files']['name'][0];
			$parts = explode('.', $name);
			$name = time() . '.' . $parts[1];
		}else{
			$name = time() . '.jpg';
		}
	
		return $this->model_tool_image->upload( $path, $name, 'files' );
	}
}
?>