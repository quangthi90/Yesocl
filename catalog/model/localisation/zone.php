<?php
use Document\Zone;

class ModelLocalisationZone extends Model {
	public function addZone($name, $data = array(), $status = false) {
		$zone = new Zone($name, $status);

		if (isset($data['code'])) {
			$zone->setCode($data['code']);
		}

		$this->dm->persist($zone);
		$this->dm->flush();
	}

	public function getZoneById($id) {
		$zone = $this->dm->find('Zone', $id);

		if ($zone) {
			$result = array(
				'id' => $id,
				'name' => $zone->getName(),
				'code' => $zone->getCode(),
				'country' => $zone->getCountry()->getId(),
				'status' => $zone->getStatus()
				);
		}else {
			$result = false;
		}

		return $result;
	}

	public function getZones($data = array()) {
		return;
	}

	public function editZone($id, $data = array()) {
		$zone = $this->dm->find('Zone', $id);

		if (isset($data['name'])) {
			$zone->setName('name');
		}

		if (isset($data['code'])) {
			$zone->setCode($data['code']);
		}

		if (isset($data['country'])) {
			$zone->setCountry($data['country']);
		}

		if (isset($data['status'])) {
			$zone->setStatus($data['status']);
		}

		$this->dm->flush();
	}

	public function deleteZone($id) {
		$zone = $this->dm->find('Zone', $id);

		$this->dm->remove($zone);
	}
}
?>