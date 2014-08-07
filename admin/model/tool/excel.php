<?php
class ModelToolExcel extends Model {
	public function getActiveSheet( $file ) {
		$objPHPExcel = PHPExcel_IOFactory::load($file);

		$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
		
		return $sheetData;
	}

	public function createExcelFile( $aMatrix, $sFilename ){
		$objPHPExcel = new PHPExcel();

		// Set properties
		// $objPHPExcel->getProperties()->setCreator("Maarten Balliauw");
		// $objPHPExcel->getProperties()->setLastModifiedBy("Maarten Balliauw");
		// $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");
		// $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
		// $objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.");

		// Add data
		$objPHPExcel->setActiveSheetIndex(0);
		foreach ( $aMatrix as $iRowNum => $aCols ) {
			$iRowNum += 1;
			foreach ( $aCols as $sColName => $iValue ) {
				$objPHPExcel->getActiveSheet()->SetCellValue($sColName.$iRowNum, $iValue);
			}
		}

		// Rename sheet
		// $objPHPExcel->getActiveSheet()->setTitle('Simple');
				
		// Save Excel 2007 file
		$objWriter = new PHPExcel_Writer_Excel2007( $objPHPExcel );
		$objWriter->save( DIR_CACHE . $sFilename . '.xlsx' );

		// Redirect output to a client’s web browser (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$sFilename.'.xlsx"');
		header('Cache-Control: max-age=0');
		readfile( DIR_CACHE . $sFilename . '.xlsx' );
exit;
	}
}
?>