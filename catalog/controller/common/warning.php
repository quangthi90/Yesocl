<?php
class ControllerCommonWarning extends Controller {
	public function index() {
		print($this->session->getFlash('message') ); exit;
	}
}
?>