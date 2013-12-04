<?php
namespace Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB,
	Document\AbsObject\Post as AbstractPost;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\EmbeddedDocument */
Class Post extends AbstractPost {
	/** @MongoDB\PostPersist */
    public function postPersist()
    {
    	$this->setType('User');
    }
}