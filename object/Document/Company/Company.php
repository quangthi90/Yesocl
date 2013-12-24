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

	/** @MongoDB\Date */
	private $created;

	/** @MongoDB\Date */
	private $updated;

	/** 
	 * @MongoDB\Boolean 
	 */
	private $status;

	/** 
	 * @MongoDB\String 
	 */
	private $slug;

	/** @MongoDB\EmbedMany(targetDocument="GroupMember") */
	private $groupMembers = array();

	/** @MongoDB\ReferenceMany(targetDocument="Document\Branch\Branch") */
	private $branchs = array();

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
	 * Get Branch By ID
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: MongoDB ID
	 * @return:
	 * 		- Object branch
	 * 		- null if not found
	 */
	public function getBranchById( $branch_id ){
		foreach ( $this->branchs as $branch ){
			if ( $branch->getId() === $branch_id ){
				return $branch;
			}
		}
		
		return null;
	}

	/** @MongoDB\PrePersist */
	public function prePersist(){
		$this->created = new \DateTime();
	}

	/** @MongoDB\PreUpdate */
	public function preUpdate(){
		$this->updated = new \DateTime();
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

	public function setCreated( $created ){
		$this->created = $created;
	}

	public function getCreated(){
		return $this->created;
	}

	public function setUpdated( $updated ){
		$this->updated = $updated;
	}

	public function getUpdated(){
		return $this->updated;
	}

	public function setStatus( $status ){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
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

	public function addBranch( \Document\Branch\Branch $branch ){
		$this->branchs[] = $branch;
	}

	public function setBranchs( $branchs ){
		$this->branchs = $branchs;
	}

	public function getBranchs(){
		return $this->branchs;
	}
}