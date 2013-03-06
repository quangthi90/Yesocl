<?php
namespace Document\Test;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(db="yesocl", collection="test_blog")
 * @SOLR\Document(collection="post")
 */
Class Blog {
	/** 
	 * @MongoDB\Id
	 * @SOLR\UniqueKey
	 * @SOLR\Field(type="id")
	 */
	private $id; 

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="string")
	 */
	private $author;

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="string")
	 */
	private $name;

	/** @MongoDB\EmbedMany(targetDocument="Post") */
	private $posts = array();

	/**
	 * @SOLR\Field(type="text")
	 */
	private $solrContent;

	public function getId() {
		return $this->id;
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function addPost( Post $post ){
		$this->posts[] = $post;
	}

	public function setPosts( $posts ){
		$this->posts = $posts;
	}

	public function getPosts(){
		return $this->posts;
	}

	public function setSolrContent( $solrContent ){
		$this->solrContent = $solrContent;
	}

	public function getSolrContent(){
		$solrContent = '';

		if (count($this->posts) > 0) {
			foreach ($this->posts as $post) {
				$solrContent .= $post->getAuthor() . ' ' . $post->getContent() . ' ';
			}
		}
		
		return $this->solrContent;
	}
}