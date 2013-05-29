<?php
namespace Document\Company;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(collection="company")
 */
Class Company {
	/** 
	 * @MongoDB\Id 
	 */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** 
	 * @MongoDB\String 
	 */
	private $logo;

	/** 
	 * @MongoDB\String 
	 */
	private $description;

	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="companiesCreated") */
	private $owner;

	/** @MongoDB\ReferenceOne(targetDocument="Group", inversedBy="companies") */
	private $group;

	/** @MongoDB\EmbedMany(targetDocument="Career") */
	private $careers = array();

	/** @MongoDB\ReferenceMany(targetDocument="Document\User\User", inversedBy="companyFollowed") */
	private $followers = array();

	/** @MongoDB\ReferenceMany(targetDocument="Company", inversedBy="relativeCompanies") */
	private $relativeCompanies = array();

	/** @MongoDB\EmbedMany(targetDocument="Post") */
	private $posts = array();

	/** @MongoDB\Date */
	private $created;

	/** 
	 * @MongoDB\Boolean 
	 */
	private $status;

	/** 
	 * @MongoDB\String 
	 */
	private $slug;

	/**
	 * Get Post By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Post
	 * 		- null if not found
	 */
	public function getPostById( $post_id ){
		foreach ( $this->posts as $post ){
			if ( $post->getId() == $post_id ){
				return  $post;
			}
		}
		
		return null;
	}

	public function getPostBySlug( $post_slug ){
		foreach ( $this->posts as $post ){
			if ( $post->getSlug() == $post_slug ){
				return  $post;
			}
		}
		
		return null;
	}

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setSlug( $slug ){
		$this->slug = $slug;
	}

	public function getSlug(){
		return $this->slug;
	}

	public function setLogo( $logo ){
		$this->logo = $logo;
	}

	public function getLogo(){
		return $this->logo;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setOwner( $owner ){
		$this->owner = $owner;
	}

	public function getOwner(){
		return $this->owner;
	}

	public function setGroup( $group ){
		$this->group = $group;
	}

	public function getGroup(){
		return $this->group;
	}

	public function addCareer( $career ){
		$this->careers[] = $career;
	}

	public function setCareers( Career $careers ){
		$this->careers = $careers;
	}

	public function getCareers(){
		return $this->careers;
	}

	public function addFollower( $follower ){
		$this->followers[] = $follower;
	}

	public function setFollowers( $followers ){
		$this->followers = $followers;
	}

	public function getFollowers(){
		return $this->followers;
	}

	public function addRelativeCompany( $relativeCompany ){
		$this->relativeCompanies[] = $relativeCompany;
	}

	public function setRelativeCompanies( $relativeCompanies ){
		$this->relativeCompanies = $relativeCompanies;
	}

	public function getRelativeCompanies(){
		return $this->relativeCompanies;
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

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}
}