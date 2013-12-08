<?php
class ModelToolSearch extends Model
{
	public function searchUserByKeyword( $data = array() ) {
		if ( !isset( $data['keyword'] ) || empty( $data['keyword'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\User\User',
			)
    	);
 
		$query_data = 'solrEmail_t:*' . $data['keyword'] . '* OR ';
		$query_data .= 'solrFullname_t:*' . $data['keyword'] . '* OR ';
		$query_data .= 'username_t:*' . $data['keyword'] . '* ';

		if ( isset( $data['start'] ) ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 5;
		}

		$query->setQuery( $query_data );
		$query->setRows( $data['limit'] );
		$query->setStart( $data['start'] );
 
		return $this->client->execute( $query );
	}

	public function searchPostByKeyword( $data = array() ) {
		if ( !isset( $data['keyword'] ) || empty( $data['keyword'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\Branch\Post',
			)
    	);
 
		$query_data = 'title_t:*' . $data['keyword'] . '* OR ';
		$query_data .= 'content_t:*' . $data['keyword'] . '* OR ';
		$query_data .= 'description_t:*' . $data['keyword'] . '* ';

		if ( isset( $data['start'] ) ) {
			$data['start'] = (int)$data['start'];
		}else {
			$data['start'] = 0;
		}

		if ( isset( $data['limit'] ) ) {
			$data['limit'] = (int)$data['limit'];
		}else {
			$data['limit'] = 5;
		}

		$query->setQuery( $query_data );
		$query->setRows( $data['limit'] );
		$query->setStart( $data['start'] );
 
		return $this->client->execute( $query );
	}
}
?>