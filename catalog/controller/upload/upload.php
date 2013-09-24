<?php
error_reporting(E_ALL | E_STRICT);

class ControllerUploadUpload extends Controller { 
	public function index() {
		$this->load->model('tool/upload');
		$upload_handler = new ModelToolUpload();
	}
}
?>
