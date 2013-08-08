<?php
namespace Document\Group;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document(db="yesocl", collection="group") */
Class Group {
	/** @MongoDB\Id */
	private $id; 

	/** @MongoDB\String */
	private $name;
	
	/** @MongoDB\String */
	private $sumary;
	
	/** @MongoDB\String */
	private $description;
	
	/** @MongoDB\String */
	private $website;
	
	/** @MongoDB\Date */
	private $created;
	
	/** @MongoDB\ReferenceOne(targetDocument="Document\User\User", inversedBy="groups") */
    private $author;
    
    /** @MongoDB\ReferenceOne(targetDocument="Type", inversedBy="groups") */
    private $type;
    
    /** @MongoDB\Boolean */
	private $status;

	/** @MongoDB\EmbedMany(targetDocument="Post") */
	private $posts = array();

	/** @MongoDB\ReferenceOne(targetDocument="Document\Branch\Branch", inversedBy="groups") */
    private $branch;

    /** @MongoDB\EmbedMany(targetDocument="GroupMember") */
	private $groupMembers = array();

	/** @MongoDB\ReferenceMany(targetDocument="Document\Branch\Category") */
	private $categories = array();
	
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
			if ( $post->getId() === $post_id ){
				return $post;
			}
		}
		
		return null;
	}

	/**
	 * Get Group of Member By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Group of Member
	 * 		- null if not found
	 */
	public function getGroupMemberById( $group_id ){
		foreach ( $this->groupMembers as $group ){
			if ( $group->getId() === $group_id ){
				return $group;
			}
		}
		
		return null;
	}

	/**
	 * Get Category By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object Category
	 * 		- null if not found
	 */
	public function getCategoryById( $category_id ){
		foreach ( $this->categories as $category ){
			if ( $category->getId() === $category_id ){
				return $category;
			}
		}
		
		return null;
	}

	/**
	* Format array to save to Cache
	* 2013/07/24
	* @author: Bommer <bommer@bommerdesign.com>
	* @return: array Group
	*/
    public function formatToCache(){
		$data = array(
			'id'		=> $this->getId(),
			'name' 		=> $this->getName(),
			'author' 	=> $this->getAuthor()->getFullname(),
			'email' 	=> $this->getAuthor()->getPrimaryEmail()->getEmail(),
			'created' 	=> $this->getCreated()->format('m/d/Y'),
			'status'	=> $this->getStatus()
		);

		return $data;
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

	public function setSumary( $sumary ){
		$this->sumary = $sumary;
	}

	public function getSumary(){
		return $this->sumary;
	}

	public function setDescription( $description ){
		$this->description = $description;
	}

	public function getDescription(){
		return $this->description;
	}

	public function setWebsite( $website ){
		$this->website = $website;
	}

	public function getWebsite(){
		return $this->website;
	}

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->created = new \DateTime();
	}

	public function setAuthor( $author ){
		$this->author = $author;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
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

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setBranch( $branch ){
		$this->branch = $branch;
	}

	public function getBranch(){
		return $this->branch;
	}

	public function addGroupMember( GroupMember $groupMember ){
		$this->groupMembers[] = $groupMember;
	}

	public function setGroupMembers( $groupMembers ){
		$this->groupMembers = $groupMembers;
	}

	public function getGroupMembers(){
		return $this->groupMembers;
	}

	public function addCategory( \Document\Branch\Category $category ){
		$this->categories[] = $category;
	}

	public function setCategories( $categories ){
		$this->categories = $categories;
	}

	public function getCategories(){
		return $this->categories;
	}
}