<?php
namespace Document\Stock;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** 
 * @MongoDB\Document(db="yesocl", collection="stock_meta")
 */
Class Meta {
	/** 
	 * @MongoDB\Id 
	 */
	private $id; 

	/** @MongoDB\ReferenceOne(targetDocument="Stock", inversedBy="meta") */
	private $stock;

	/** 
	 * @MongoDB\Float 
	 */
	private $currentPrice;

	/** 
	 * @MongoDB\Float 
	 */
	private $bookPrice;

	/** 
	 * @MongoDB\Int
	 */
	private $Pb;

	/** 
	 * @MongoDB\Int
	 */
	private $Eps;

	/** 
	 * @MongoDB\Float
	 */
	private $Pe;

	/** 
	 * @MongoDB\Int
	 */
	private $Roa;

	/** 
	 * @MongoDB\Int
	 */
	private $Roe;

	/** 
	 * @MongoDB\Float
	 */
	private $Beta;

	/** 
	 * @MongoDB\Int
	 */
	private $outStandingVolume;

	/** 
	 * @MongoDB\Int
	 */
	private $listedVolume;

	/** 
	 * @MongoDB\Int
	 */
	private $treasuryStock;

	/** 
	 * @MongoDB\Int
	 */
	private $foreignOwnership;

	/** 
	 * @MongoDB\Int
	 */
	private $capitalMarket;

	/** 
	 * @MongoDB\Int
	 */
	private $sales;

	/** 
	 * @MongoDB\Int
	 */
	private $profitAfterTax;

	/** 
	 * @MongoDB\Int
	 */
	private $ownerEquity;

	/** 
	 * @MongoDB\Int
	 */
	private $liability;

	/** 
	 * @MongoDB\Int
	 */
	private $asset;

	
	// private $funds = array();

	public function getId() {
		return $this->id;
	}

	public function setStock( $stock ){
		$this->stock = $stock;
	}

	public function getStock(){
		return $this->stock;
	}

	public function setCurrentPrice( $currentPrice ){
		$this->currentPrice = $currentPrice;
	}

	public function getCurrentPrice(){
		return $this->currentPrice;
	}

	public function setBookPrice( $bookPrice ){
		$this->bookPrice = $bookPrice;
	}

	public function getBookPrice(){
		return $this->bookPrice;
	}

	public function setPb( $pb ){
		$this->pb = $pb;
	}

	public function getPb(){
		return $this->pb;
	}

	public function setEps( $eps ){
		$this->eps = $eps;
	}

	public function getEps(){
		return $this->eps;
	}

	public function setPe( $pe ){
		$this->pe = $pe;
	}

	public function getPe(){
		return $this->pe;
	}

	public function setRoa( $roa ){
		$this->roa = $roa;
	}

	public function getRoa(){
		return $this->roa;
	}

	public function setRoe( $roe ){
		$this->roe = $roe;
	}

	public function getRoe(){
		return $this->roe;
	}

	public function setBeta( $beta ){
		$this->beta = $beta;
	}

	public function getBeta(){
		return $this->beta;
	}

	public function setOutStandingVolume( $outStandingVolume ){
		$this->outStandingVolume = $outStandingVolume;
	}

	public function getOutStandingVolume(){
		return $this->outStandingVolume;
	}

	public function setListedVolume( $listedVolume ){
		$this->listedVolume = $listedVolume;
	}

	public function getListedVolume(){
		return $this->listedVolume;
	}

	public function setTreasuryStock( $treasuryStock ){
		$this->treasuryStock = $treasuryStock;
	}

	public function getTreasuryStock(){
		return $this->treasuryStock;
	}

	public function setForeignOwnership( $foreignOwnership ){
		$this->foreignOwnership = $foreignOwnership;
	}

	public function getForeignOwnership(){
		return $this->foreignOwnership;
	}

	public function setCapitalMarket( $capitalMarket ){
		$this->capitalMarket = $capitalMarket;
	}

	public function getCapitalMarket(){
		return $this->capitalMarket;
	}

	public function setSales( $sales ){
		$this->sales = $sales;
	}

	public function getSales(){
		return $this->sales;
	}

	public function setProfitAfterTax( $profitAfterTax ){
		$this->profitAfterTax = $profitAfterTax;
	}

	public function getProfitAfterTax(){
		return $this->profitAfterTax;
	}

	public function setOwnerEquity( $ownerEquity ){
		$this->ownerEquity = $ownerEquity;
	}

	public function getOwnerEquity(){
		return $this->ownerEquity;
	}

	public function setLiability( $liability ){
		$this->liability = $liability;
	}

	public function getLiability(){
		return $this->liability;
	}

	public function setAsset( $asset ){
		$this->asset = $asset;
	}

	public function getAsset(){
		return $this->asset;
	}

	public function addFund( $key, $fund ){
		$this->funds[$key] = $fund;
	}

	public function setFunds( $funds ){
		$this->funds = $funds;
	}

	public function getFunds(){
		return $this->funds;
	}
}