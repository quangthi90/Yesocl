<?php
use Document\Ward;

Class ModelLocalisationWard extends Model {
	public function addWard($name, $status = false) {
		$ward = new Ward($name, $status);

		$this->dm->persist($ward);
		$this->dm->flush();
	}

	public function getWardById($id) {
		$ward = $this->dm->find('Ward', $id);

		if ($ward) {
			$result = array(
				'id' => $id,
				'name' => $ward->getName(),
				'status' => $ward->getStatus()
				);
		}else {
			$result = false;
		}

		return $result;
	}

	public function getWards($data = array()) {
		return;
	}

	public function editWard($id, $data = array()) {
		$ward = $this->dm->find('Ward', $id);

		if (isset($data['name'])) {
			$ward->setName($data['name']);
		}

		if (isset($data['status'])) {
			$ward->setStatus($data['status']);
		}

		$this->dm->flush();
	}

	public function deleteWard($id) {
		$ward = $this->dm->find('Ward', $id);

		$this->dm->remove($ward);
	}
}