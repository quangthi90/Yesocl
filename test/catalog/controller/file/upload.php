<?php
/**
* 
*/
class ControllerFileUpload extends Controller
{
	public function index(){
		$this->load->model( 'tool/image' );		
		$path = $this->config->get('common')['image']['upload_cache'];
		return $this->model_tool_image->upload( $path, 'files' );
	}
}
?>