<?php
class ModelToolExcel extends Model {
	public function getActiveSheet( $file ) {
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		
		return $sheetData;
	}

	public function createExcelFile(){
		$objPHPExcel = new PHPExcel();

		// Set properties
		// $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
		// $objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
		// $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
		// $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
		// $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

		// Add some data
		$objPHPExcel->setActiveSheetIndex(0);
		// $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Hello');
		// $objPHPExcel->getActiveSheet()->SetCellValue('B2', 'world!');
		// $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Hello');
		// $objPHPExcel->getActiveSheet()->SetCellValue('D2', 'world!');

		print(get_class($objPHPExcel->getActiveSheet())); exit;
	}
}
?>