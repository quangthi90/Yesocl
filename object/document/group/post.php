<?php
namespace Document\Group;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;

/** @MongoDB\EmbeddedDocument */
Class Post extends AbstractPost {
	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Category") */
	private $category;

	/** @MongoDB\String */
	private $thumb;

	public function setCategory( $category ){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}

	public function setThumb( $thumb ){
		$this->thumb = $thumb;
	}

	public function getThumb(){
		return $this->thumb;
	}
}