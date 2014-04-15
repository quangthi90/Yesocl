<?php
class ModelUserSetting extends Model {
	/**
	 * Get Setting by User
	 * 2014/04/15
	 * @author: Bommer <bommer@bommerdesign.com>
	 * @param: 
	 *	- string User ID
	 * @return: Object User Setting
	 */
	public function getSettingByUser( $idUser ) {
		return $this->dm->getRepository('Document\User\Setting')->findOneBy(array(
			'user.id' => $idUser
		));
	}
}
?>