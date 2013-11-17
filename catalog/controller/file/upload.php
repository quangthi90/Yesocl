<?php
/**
* 
*/
class ControllerFileUpload extends Controller
{
	public function index(){
		$this->load->model( 'tool/image' );
		// var_dump($this->request->files['thumb']);
		if ( empty($this->request->files['thumb']) || !$this->model_tool_image->isValidImage($this->request->files['thumb']) ){
			return $this->response->setOutput(json_encode(array(
                'success' => 'not ok: image wrong format'
            )));
		}

		$path = $this->config->get('common')['image']['upload_cache'];
		$name = time();
		if ( $thumb = $this->model_tool_image->uploadImage($path, $name, $this->request->files['thumb']) ) {
			return $this->response->setOutput(json_encode(array(
				'files' => array(
					'name' => $name,
		            'url' => $image = $this->model_tool_image->resize( $thumb, 400, 250, true )
				)
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'not ok: save image false'
        )));
	}
}
?>