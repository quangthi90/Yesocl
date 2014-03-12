<?php
class ModelToolExcel extends Model {
	public function loadActiveSheet( $file ) {
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		
		return $sheetData;
	}
}
?>