<?php
use Document\District;

Class ModelLocalisationDistrict extends Doctrine {
	public function addDistrict($name, $data = array(), $status = false) {
		$district = new District($name, $status);

		if (isset($data['streets']) && is_array($data['streets'])) {
			foreach ($data['streets'] as $street) {
				$street = $this->dm->find('Street', $street);

				if ($street) {
					$district->addStreet($street);
				}
			}
		}

		if (isset($data['wards']) && is_array($data['wards'])) {
			foreach ($data['wards'] as $ward) {
				$ward = $this->dm->find('Ward', $ward);

				if ($ward) {
					$district->addWard($ward);
				}
			}
		}

		$this->dm->persist($district);
		$this->dm->flush();
	}

	public function getDistrictById($id) {
		$district = $this->dm->find('District', $id);

		if ($district) {
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

			$result = array(
				'id' => $id,
				'name' => $district->getName(),
				'streets' => $streets,
				'wards' => $wards,
				'status' => $district->getStatus()
				);
		}else {
			$result = false;
		}

		return $result;
	}

	public function getDistricts($data = array()) {
		return;
	}

	public function editDistrict($id, $data = array()) {
		$district = $this->dm->find('District', $id);

		if (isset($data['name'])) {
			$district->setName($data['name']);
		}

		if (isset($data['wards']) && is_array($data['wards'])) {
			foreach ($data['wards'] as $ward) {
				$ward = $this->dm->find('Ward', $ward);

				if ($ward) {
					$district->addWard($ward);
				}
			}
		}

		if (isset($data['streets']) && is_array($data['streets'])) {
			foreach ($data['streets'] as $street) {
				$street = $this->dm->find('Street', $street);

				if ($street) {
					$district->addStreet($street);
				}
			}
		}

		if (isset($data['status'])) {
			$district->setStatus($data['status']);
		}

		$this->dm->flush();
	}

	public function deleteDistrict($id) {
		$district = $this->dm->find('District', $id);

		$this->dm->remove($district);
	}
}