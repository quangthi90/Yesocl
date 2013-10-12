<?php
use Document\City;

Class ModelLocalisationCity extends Model {
	public function addCity($name, $data = array(), $status = false) {
		$city = new City($name, $status);

		if (isset($data['districts'])) {
			foreach ($data['districts'] as $district) {
				$district = $this->dm->find('District', $district);

				if ($district) {
					$city->addDistrict($district);
				}
			}
		}

		$this->dm->persist($city);
		$this->dm->flush();
	}

	public function getCityById($id) {
		$city = $this->dm->find('City', $id);

		if ($city) {
			$districts_info = $city->getDistricts();
			$districts = array();
			foreach ($districts_info as $district) {
				$streets_info = $district->getStreets();
				$streets = array();
				foreach ($streets_info as $street) {
					$streets[] = array(
						'id' => $street->getId(),
						'name' => $street->getName(),
						'status' => $street->getStatus()
						);
				}

				$wards_info = $district->getWards();
				$wards = array();
				foreach ($wards_info as $ward) {
					$wards[] = array(
						'id' => $ward->getId(),
						'name' => $ward->getName(),
						'status' => $ward->getStatus()
						);
				}

				$districts[] = array(
					'id' => $id,
					'name' => $district->getName(),
					'streets' => $streets,
					'wards' => $wards,
					'status' => $district->getStatus()
					);
			}
			$result = array(
				'id' => $id,
				'name' => $city->getName(),
				'districts' => $districts,
				'status' => $city->getStatus()
				);
		}else {
			$result = false;
		}

		return $result;
	}

	public function getCities($data = array()) {
		return;
	}

	public function editCity($id, $data = array()) {
		$city = $this->find('City', $id);

		if (isset($data['name'])) {
			$city->setName($data['name']);
		}

		if (isset($data['districts']) && is_array($data['districts'])) {
			foreach ($data['districts'] as $district) {
				$district = $this->dm->find('District', $district);

				if ($district) {
					$city->addDistrict($district);
				}
			}
		}

		if (isset($data['status'])) {
			$city->setStatus($data['status']);
		}

		$this->dm->flush();
	}

	public function deleteCity($id) {
		$city = $this->dm->find('City', $id);

		$this->dm->remove($city);
	}

	public function searchLocationByKeyword( $data = array() ) {
		if ( !isset( $data['filter_location'] ) || empty( $data['filter_location'] ) ) {
			return array();
		}

		$query = $this->client->createSelect(
    		array(
				'mappedDocument' => 'Document\Localisation\City',
				)
    	);
 		
		$query_data = 'location_t:*"' . $data['filter_location'] . '"*';
 
		$query->setQuery( $query_data );
 
		return $this->client->execute( $query );
	}
}