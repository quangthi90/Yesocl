<?php
class ModelToolSearch extends Model
{
	public function searchUserByKeyword( $aData = array() ) {
		if ( !isset( $aData['keyword'] ) || empty( $aData['keyword'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\User\User',
			)
    	);
 
		$sQuery = 'solrEmail_t:*' . $aData['keyword'] . '* OR ';
		$sQuery .= 'solrFullname_t:*' . $aData['keyword'] . '* OR ';
		$sQuery .= 'username_t:*' . $aData['keyword'] . '* ';

		if ( isset( $aData['start'] ) ) {
			$aData['start'] = (int)$aData['start'];
		}else {
			$aData['start'] = 0;
		}

		if ( isset( $aData['limit'] ) ) {
			$aData['limit'] = (int)$aData['limit'];
		}else {
			$aData['limit'] = 5;
		}

		$query->setQuery( $sQuery );
		$query->setRows( $aData['limit'] );
		$query->setStart( $aData['start'] );
 
		return $this->client->execute( $query );
	}

	public function searchPostByKeyword( $aData = array() ) {
		if ( !isset( $aData['keyword'] ) || empty( $aData['keyword'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\Branch\Post',
			)
    	);
 
		$sQuery = 'title_t:*' . $aData['keyword'] . '* OR ';
		$sQuery .= 'content_t:*' . $aData['keyword'] . '* OR ';
		$sQuery .= 'description_t:*' . $aData['keyword'] . '* ';

		if ( isset( $aData['start'] ) ) {
			$aData['start'] = (int)$aData['start'];
		}else {
			$aData['start'] = 0;
		}

		if ( isset( $aData['limit'] ) ) {
			$aData['limit'] = (int)$aData['limit'];
		}else {
			$aData['limit'] = 5;
		}

		$query->setQuery( $sQuery );
		$query->setRows( $aData['limit'] );
		$query->setStart( $aData['start'] );
 
		return $this->client->execute( $query );
	}

	public function searchDataValueByKeyword( $sType, $aData = array() ) {
		if ( !isset( $aData['keyword'] ) || empty( $aData['keyword'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\Data\Value',
			)
    	);
 
		$sQuery = 'name_t:*' . $aData['keyword'] . '* OR ';
		$sQuery .= 'value_t:*' . $aData['keyword'] . '* AND ';
		$sQuery .= 'dataCode_t:' . $sType . '';

		if ( isset( $aData['start'] ) ) {
			$aData['start'] = (int)$aData['start'];
		}else {
			$aData['start'] = 0;
		}

		if ( isset( $aData['limit'] ) ) {
			$aData['limit'] = (int)$aData['limit'];
		}else {
			$aData['limit'] = 5;
		}

		$query->setQuery( $sQuery );
		$query->setRows( $aData['limit'] );
		$query->setStart( $aData['start'] );
 
		return $this->client->execute( $query );
	}
}
?>