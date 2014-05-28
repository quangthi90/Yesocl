<?php
use Document\User\Setting;

class ModelUserSetting extends Model {
	/**
	 * Get Setting by User
	 * 2014/04/15
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string User ID
	 * @return: Object User Setting
	 */
	public function getSettingByUser( $idUser ) {
		return $this->dm->getRepository('Document\User\Setting')->findOneBy(array(
			'user.id' => $idUser
		));
	}

	public function addStocksToWatchList( $idUser, $aStockIds ){
		if ( !$oSetting = $this->dm->getRepository('Document\User\Setting')->findOneBy(array('user.id' => $idUser)) ) {
			$oSetting = new Setting();
			$oUser = $this->dm->getRepository('Document\User\User')->findOneBy( array(
				'deleted' => false,
				'id' => $idUser
			));
			if ( !$oUser ) return false;
			$oSetting->setUser( $oUser );
			$this->dm->persist( $oSetting );
		}

		$lStocks = $this->dm->getRepository('Document\Stock\Stock')->findBy(array(
			'deleted' => false,
			'id' => array('$in' => $aStockIds)
		));

		if ( !$lStocks ) return false;
		foreach ( $lStocks as $oStock ) {
			$oSetting->addStock( $oStock );
		}

		$this->dm->flush();

		return true;
	}

	public function removeStockFromWatchList( $idUser, $idStock ){
		if ( !$oSetting = $this->dm->getRepository('Document\User\Setting')->findOneBy(array('user.id' => $idUser)) ) return false;

		$oStock = $oSetting->getStockById( $idStock );

		if ( !$oStock ) return false;

		$oSetting->getStocks()->removeElement( $oStock );

		$this->dm->flush();

		return true;
	}
}
?>