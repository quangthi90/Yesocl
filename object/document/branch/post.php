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

	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Category") */
	private $category;

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

	public function setCategory( $category ){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}
}