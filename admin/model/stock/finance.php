<?php
use Document\Stock\Finance,
	Document\Stock\Finances;

class ModelStockFinance extends Model {
	private $oFinances;

	public function addFinance( $idStock, $aData = array() ) {
		// Stock is required
		$oFinances = $this->dm->getRepository('Document\Stock\Finances')->findOneBy(array(
			'stock.id' => $idStock
		));
		if ( !$oFinances ){
			$oFinances = new Finances();
			$oStock = $this->dm->getRepository('Document\Stock\Stock')->find( $idStock );
			if ( !$oStock ) return false;
			$oFinances->setStock( $oStock );
			$this->dm->persist( $oFinances );
		}

		// finance name is required
		if ( isset($aData['finance_id']) ) {
			$aData['finance_id'] = trim($aData['finance_id']);
			$oFinance = $this->dm->getRepository('Document\Finance\Finance')->find( $aData['finance_id'] );
			if ( !$oFinance ) return false;
		}else return false;

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oStockFinance = new Finance();
		$oStockFinance->setFinance( $oFinance );
		$oStockFinance->setValues( $aData['values'] );
		$oStockFinance->setStatus( $aData['status'] );
		$oFinances->addFinance( $oStockFinance );

		$this->dm->flush();

		return $oFinances;
	}

	public function editFinance( $idStock, $idFinance, $aData = array() ) {
		// Stock is required
		$oFinances = $this->dm->getRepository('Document\Stock\Finances')->findOneBy(array(
			'stock.id' => $idStock
		));
		if ( !$oFinances ) return false;
		$oStockFinance = $oFinances->getFinanceById( $idFinance );
		if ( !$oStockFinance ) return false;

		// finance name is required
		if ( isset($aData['finance_id']) ) {
			$aData['finance_id'] = trim($aData['finance_id']);
			$oFinance = $this->dm->getRepository('Document\Finance\Finance')->find( $aData['finance_id'] );
			if ( !$oFinance ) return false;
		}else return false;

		// status
		if ( empty($aData['status']) ) {
			$aData['status'] = false;
		}

		$oStockFinance->setFinance( $oFinance );
		$oStockFinance->setValues( $aData['values'] );
		$oStockFinance->setStatus( $aData['status'] );

		$this->dm->flush();

		return true;
	}

	public function deleteFinances( $idStock, $aData = array() ) {
		if ( !empty($aData['id']) ) {
			$oFinances = $this->dm->getRepository('Document\Stock\Finances')->findOneBy(array(
				'stock.id' => $idStock
			));
			if ( !$oFinances ) return false;
			foreach ($aData['id'] as $id) {
				$oStockFinance = $oFinances->getFinanceById( $id );

				if ( $oStockFinance ) {
					$oFinances->getFinances()->removeElement( $oStockFinance );
				}
			}
		}

		$this->dm->flush();
	}

	public function getFinances( $idStock, $aData = array() ){
		return $this->dm->getRepository('Document\Stock\Finances')->findOneBy(array(
			'stock.id' => $idStock
		));
	}

	public function getAllFinances( $aData = array() ){
		if ( empty($aData) ){
			return $this->dm->getRepository('Document\Stock\Finances')->findAll();
		}

		if ( empty($aData['limit']) || !isset($aData['start']) ){
			return null;
		}

		return $this->dm->getRepository('Document\Stock\Finances')
			->findAll()
			->skip( $aData['start'] )
			->limit( $aData['limit'] );
			// ->sort( array('stock.$id' => 1) );
	}

	public function getAllFinance( $idStock, $aData = array() ) {
		if ( empty($aData['limit']) ){
			$aData['limit'] = 10;
		}

		if ( empty($aData['start']) ){
			$aData['start'] = 0;
		}

		$filter = array();

		if (isset($aData['filter_name'])) {
			$filter['name'] = new MongoRegex("/" . trim($aData['filter_name']) . "/i");
		}

		if (isset($aData['filter_status'])) {
			$filter['status'] = ($aData['filter_status']) ? true : false;
		}

		$stock_finances = $this->dm->getRepository('Document\Stock\Finances')->findOneBy(array( 'stock.id' => $idStock ));

		$results = array();
		if ($stock_finances) {
			// $finance_finances = $this->dm->getRepository('Document\Finance\Finance')->findBy($filter);

			// foreach ($finance_finances as $finance) {

			// }

			// $i = 0;
			foreach ($stock_finances->getFinances() as $finance) {
				$filter['id'] = $finance->getFinance()->getId();

				if ($this->dm->getRepository('Document\Finance\Finance')->findBy($filter)->count()) {
					$results[] = $finance;
					$i++;
				}

				// if ($i == $aData['limit']) {
				// 	break;
				// }
			}
		}

		return $results;
	}
}
?>