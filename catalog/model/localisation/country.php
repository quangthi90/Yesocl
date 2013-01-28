<?php
use Document\Country;

class ModelLocalisationCountry extends Doctrine {
	public function addCountry($name, $data = array(), $status = false) {
		$country = new Country($name, $status);

		if (isset($data['zones']) && is_array($data['zones'])) {
			foreach ($data['zone'] as $zone) {
				$zone = $this->find('Zone', $zone);

				if ($zone) {
					$country->addZone($zone);
				}
			}
		}

		if (isset($data['cities']) && is_array($data['cities'])) {
			foreach ($data['cities'] as $city) {
				$city = $this->dm->find('City', $city);

				if ($city) {
					$country->addCity($city);
				}
			}
		}

		$this->dm->persist($country);
		$this->dm->flush();
	}

	public function getCountryById($id) {
		$country = $this->dm->find('Country', $id);

		if ($country) {
			$zones_info = $country->getZones();
			$zones = array();
			foreach ($zones_info as $zone) {
				$zones[] = array(
					$zone->getId()
					);
			}

			$cities_info = $country->getCities();
			$cities = array();
			foreach ($cities_info as $city) {
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

				$cities[] = array(
					'id' => $id,
					'name' => $city->getName(),
					'districts' => $districts,
					'status' => $city->getStatus()
					);
			}

			$result = array(
				'id' => $id,
				'name' => $country->getName(),
				'zones' => $zones,
				'cities' => $cities,
				'address' => $country->getAddress()->getId(),
				'status' => $country->getStatus()
				);
		}else {
			$result = false;
		}

		return $result;
	}

	public function getCountries($data = array()) {
		return;
	}

	public function editCountry($id, $data = array()) {
		$country = $this->dm->find('Country', $id);

		if (isset($data['name'])) {
			$country->setName($data['name']);
		}

		if (isset($data['zones']) && is_array($data['zones'])) {
			foreach ($data['zones'] as $zone) {
				$zone = $this->dm->find('Zone', $zone);

				if ($zone) {
					$country->addZone($zone);
				}
			}
		}

		if (isset($data['cities']) && is_array($data['cities'])) {
			foreach ($data['cities'] as $city) {
				$city = $this->dm->find('City', $city);

				if ($city) {
					$country->addCity($city);
				}
			}
		}

		if (isset($data['address'])) {
			$country->setAddress($data['address']);
		}

		if (isset($data['status'])) {
			$country->setStatus($data['status']);
		}

		$this->dm->flush();
	}

	public function deleteCountry($id) {
		$country = $this->dm->find('Country', $id);

		$this->dm->remove($country);
	}
}
?>