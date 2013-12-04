<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\Document(collection="branch_post") */
Class Post extends AbstractPost {
	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Branch", inversedBy="posts") */
	private $branch;

	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Category") */
	private $category;

	/** @MongoDB\PostPersist */
    public function postPersist()
    {
    	$this->setType('Branch');
    }

	public function setBranch( $branch ){
		$this->branch = $branch;
	}

	public function getBranch(){
		return $this->branch;
	}

	public function setCategory( $category ){
		$this->category = $category;
	}

	public function getCategory(){
		return $this->category;
	}
}