<?php
class ModelCompanyPost extends Doctrine {
	public function getStatusByPostSlug( $post_slug ){
		$query = $this->dm->getRepository('Document\Company\Company');
	}
}
?>