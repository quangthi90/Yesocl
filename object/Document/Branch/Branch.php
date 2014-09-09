<?php
namespace Document\Branch;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** @MongoDB\Document(collection="branch") */
Class Branch {
	/** @MongoDB\Id */
	private $id;

	/** 
	 * @MongoDB\String 
	 */
	private $name; 

	/** 
	 * @MongoDB\String 
	 */
	private $slug; 

	/** @MongoDB\ReferenceMany(targetDocument="Position", mappedBy="branches") */
	private $positions = array();
	
	/** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\ReferenceMany(targetDocument="Document\Group\Group", mappedBy="branch") */
	private $groups = array();

	/** @MongoDB\ReferenceMany(targetDocument="Category", mappedBy="branch") */
	private $categories = array();

	/** @MongoDB\ReferenceMany(targetDocument="Post", mappedBy="branch") */
	private $posts = array();

	/** @MongoDB\ReferenceMany(targetDocument="Document\User\User", inversedBy="branches") */
	private $members = array();	

	/** @MongoDB\Int */
	private $order;

    /** 
	 * @SOLR\Field(type="text")
	 */
	private $type;

	/** 
	 * @MongoDB\String 
	 */
	private $logo;

	/** 
	 * @MongoDB\Boolean 
	 */
	private $deleted = false;

	/** 
	 * @MongoDB\String
	 */
	private $code;

	/**
	 * Get All Category of Branch follow isBranch value
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 *		- Boolean $bIsBranch
	 *		- Boolean $bIsObject
	 * @return:
	 * 		- List Category Object if $bIsGetId == false
	 * 		- List Category ID if $bIsGetId == true
	 */
	public function getIsBranchCategories( $bIsBranch, $bIsGetId = false ){
		$aCategories = array();
		foreach ( $this->categories as $oCategory ){
			if ( $oCategory->getIsBranch() == $bIsBranch ){
				if ( !$bIsGetId ) $aCategories[] = $oCategory;
				
				else $aCategories[] = $oCategory->getId();
			}
		}
		
		return $aCategories;
	}

	/**
	 * Get Post By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Post ID
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

	/**
	 * Get Post By Slug
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string post Slug
	 * @return:
	 * 		- Object Post
	 * 		- null if not found
	 */
	public function getPostBySlug( $post_slug ){
		foreach ( $this->posts as $post ){
			if ( $post->getSlug() == $post_slug ){
				return  $post;
			}
		}
		
		return null;
	}

	/**
	 * Get Member By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Member ID
	 * @return:
	 * 		- Object Member
	 * 		- null if not found
	 */
	public function getMemberById( $member_id ){
		foreach ( $this->members as $member ){
			if ( $member->getId() == $member_id ){
				return  $member;
			}
		}
		
		return null;
	}

	/**
	* Format array to save to Cache
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array Branch
	*/
    public function formatToCache(){
		$data = array(
			'id'		=> $this->getId(),
			'name' 		=> $this->getName(),
			'slug'		=> $this->getSlug(),
			'status'	=> $this->getStatus(),
			'logo'		=> $this->getLogo(),
			'member_count' => $this->getMembers()->count(),
			'post_count' => $this->getPosts()->count()
		);

		return $data;
	}

	/**
	 * Get Post By Category ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Category ID
	 * @return:
	 * 		- list Object Posts
	 */
	public function getPostsByCategory( $category_id ){
		$posts = array();
		foreach ( $this->posts as $post ){
			if ( $post->getCategory()->getId() == $category_id ){
				$posts[$post->getId()] = $post;
			}
		}
		
		return posts;
	}

	public function getCategoryById( $category_id ){
		foreach ( $this->categories as $category ) {
			if ( $category_id == $category->getId() ){
				return $category;
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

	public function addPosition( $position ){
		$this->positions[] = $position;
	}

	public function setPositions( $positions ){
		$this->positions = $positions;
	}

	public function getPositions(){
		return $this->positions;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function addGroup( \Document\Group\Group $group ){
		$this->groups[] = $group;
	}

	public function setGroups( $groups ){
		$this->groups = $groups;
	}

	public function getGroups(){
		return $this->groups;
	}

	public function addCategory( $category ){
		$this->categories[] = $category;
	}

	public function setCategories( $categories ){
		$this->categories = $categories;
	}

	public function getCategories(){
		return $this->categories;
	}

	public function setPosts( $posts ){
		$this->posts = $posts;
	}

	public function getPosts(){
		return $this->posts;
	}

	public function setOrder( $order ){
		$this->order = $order;
	}

	public function getOrder(){
		return $this->order;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

	public function setMembers( $members ){
		$this->members = $members;
	}

	public function getMembers(){
		return $this->members;
	}

	public function addMember( \Document\User\User $member ){
		return $this->members[] = $member;
	}

	public function setLogo( $logo ){
		$this->logo = $logo;
	}

	public function getLogo(){
		return $this->logo;
	}

	public function setDeleted( $deleted ){
		$this->deleted = $deleted;
	}

	public function getDeleted(){
		return $this->deleted;
	}

	public function setCode( $code ){
		$this->code = $code;
	}

	public function getCode(){
		return $this->code;
	}
}