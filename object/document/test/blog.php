<?php
namespace Document\Test;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(db="yesocl", collection="test_blog")
 * @SOLR\Document(collection="test_blog")
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
	 */
	private $author;

	/** 
	 * @BmSolr
	 * @MongoDB\String 
	 */
	private $name;

	/** @MongoDB\EmbedMany(targetDocument="\Test\Post") */
	private $posts = array();

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

	/**
	* @SOLR\Field(type="text")
	*/
	private $solrContent;

	public function setSolrContent( $solrContent ){
		$this->solrContent = $solrContent;
	}

	public function getSolrContent(){
		$solrContent = "";
		$solrContent .= $this->getName() . "  ";

		if ( count($this->getPosts()) > 0 ) {
			foreach ($this->getPosts() as $data) {
		$solrContent .= $data->getAuthor() . "  ";
		$solrContent .= $data->getContent() . "  ";
			}
		}

		$this->solrContent = $solrContent;
		return $solrContent;
	}
}