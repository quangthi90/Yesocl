<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;

/** @MongoDB\EmbeddedDocument */
Class Post extends AbstractPost {
	/** @MongoDB\String */
	private $description;

	/** @MongoDB\String */
	private $thumb;

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setThumb( $thumb ){
		$this->thumb = $thumb;
	}

	public function getThumb(){
		return $this->thumb;
	}
}