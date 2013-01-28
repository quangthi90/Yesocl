<?php
use Document\Street;

Class ModelLocalisationStreet extends Doctrine {
	public function addStreet($name, $status = false) {
		$street = new Street($name, $status);

		$this->dm->persist($street);
		$this->dm->flush();
	}

	public function getStreetById($id) {
		$street = $this->dm->find('Street', $id);
		
		if ($street) {
			$result = array(
				'id' => $id,
				'name' => $street->getName(),
				'status' => $street->getStatus()
			);
		}else {
			$result = false;
		}

		return $result;
	}

	public function getStreets($data = array()) {
		return;
	}

	public function editStreet($id, $data = array()) {
		$street = $this->dm->find('Street', $id);

		if (isset($data['name'])) {
			$street->setName($data['name']);
		}

		if (isset($data['status'])) {
			$street->setStatus($data['status']);
		}

		$this->dm->flush();
	}

	public function deleteStreet($id) {
		$street = $this->dm->find('Street', $id);

		$this->dm->remove($street);
	}
}