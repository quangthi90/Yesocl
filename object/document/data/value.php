<?php
namespace Document\Data;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Solr\Mapping\Annotations as SOLR;

/** 
 * @MongoDB\Document(collection="data_value")
 * @SOLR\Document(collection="data_value")
 */
Class Value {
	/** 
	 * @MongoDB\Id 
	 * @SOLR\Field(type="id")
	 */
	private $id;

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
	 */
	private $name; 

	/** 
	 * @MongoDB\String 
	 * @SOLR\Field(type="text")
	 */
	private $value; 

	/** @MongoDB\ReferenceOne(targetDocument="Type", inversedBy="values") */
	private $type;

	public function getId(){
		return $this->id;
	}

	public function setName( $name ){
		$this->name = $name;
	}

	public function getName(){
		return $this->name;
	}

	public function setValue( $value ){
		$this->value = $value;
	}

	public function getValue(){
		return $this->value;
	}

	public function setType( $type ){
		$this->type = $type;
	}

	public function getType(){
		return $this->type;
	}

	/** 
	 * @SOLR\Field(type="text")
	 */
	private $dataCode; 

	public function setDataCode( $dataCode ){
		$this->dataCode = $dataCode;
	}

	public function getDataCode(){
		return $this->dataCode;
	}

	/** @MongoDB\PrePersist */
    public function prePersist()
    {
        $this->setData();
    }

    /** @MongoDB\PreUpdate */
    public function preUpdate()
    {
        $this->setData();
    }

	public function setData(){
		$this->dataCode = $this->type->getCode();
	}
}