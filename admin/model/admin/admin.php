<?php
use Document\Admin\Admin;

class ModelAdminAdmin extends Doctrine {
	/**
	 * Create new Admin
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: 
	 * 	array Data{
	 * 		string Email
	 * 		string Password
	 * 		int Group ID
	 * 		string Firstname
	 * 		string Lastname
	 * 	}
	 * @return: boolean
	 */
	public function addAdmin( $data = array() ) {
		// Email is required
		if ( !isset($data['admin']['emails']) || count($data['admin']['emails']) < 0 ){
			return false;
		}
		
		// Password is required
		if ( !isset($data['admin']['password']) || empty($data['admin']['password']) ){
			return false;
		}
		
		// Group is required
		if ( !isset($data['admin']['group']) ){
			return false;
		}
		$group = $this->dm->getRepository('Document\Admin\Group')->find( $data['admin']['group'] );
		if ( !$group ){
			return false;
		}
		
		// Firstname is required
		if ( !isset($data['admin']['meta']['firstname']) || empty($data['admin']['meta']['firstname']) ){
			return false;
		}
		
		// Lastname is required
		if ( !isset($data['admin']['meta']['lastname']) || empty($data['admin']['meta']['lastname']) ){
			return false;
		}
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( $data['admin']['meta']['firstname'] );
		$meta->setLastname( $data['admin']['meta']['lastname'] );
		$this->dm->persist( $meta );
		
		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $this->request->post['admin']['emails'] as $data ){
			if ( $data['primary'] == 'true' ){
				$primary_email = strtolower($data['email']);
			}
		}
		// Get list email 
		$emails = array();
		$email = new Email();
		$email->setEmail( $primary_email );
		$email->setPrimary( true );
		$emails[] = $email;
		foreach ( $this->request->post['admin']['emails'] as $data ){
			if ( strtolower($data['email']) === $primary_email ){
				continue;
			}
			$email = new Email();
			$email->setEmail( $data['email'] );
			$email->setPrimary( false );
			$emails[] = $email;
		}
		
		// Create Admin
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$admin = new Admin();
		$admin->setEmails( $emails );
		$admin->setPassword( sha1($salt . sha1($salt . sha1($data['admin']['password']))) );
		$admin->setGroupAdmin( $group );
		$admin->setMeta( $meta );
		
		// Add status
		if ( isset($data['admin']['status']) ){
			$admin->setStatus( $data['admin']['status'] );
		}
		
		// Save to DB
		$this->dm->persist( $admin );
		$this->dm->flush();
		
		return true;
	}

	/**
	 * Edit Admin
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	Admin ID 
	 * 	array Data{
	 * 		string Email
	 * 		string Password
	 * 		int Group ID
	 * 		string Firstname
	 * 		string Lastname
	 * 	}
	 * @return: boolean
	 */
	public function editAdmin( $id, $data = array() ) {
		// Email is required
		if ( !isset($data['admin']['emails']) || count($data['admin']['emails']) < 0 ){
			return false;
		}
		
		// Password is required
		if ( !isset($data['admin']['password']) || empty($data['admin']['password']) ){
			return false;
		}
		
		// Group is required
		if ( !isset($data['admin']['group']) || empty($data['admin']['group']) ){
			return false;
		}
		
		// Firstname is required
		if ( !isset($data['admin']['meta']['firstname']) || empty($data['admin']['meta']['firstname']) ){
			return false;
		}
		
		// Lastname is required
		if ( !isset($data['admin']['meta']['lastname']) || empty($data['admin']['meta']['lastname']) ){
			return false;
		}
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( $data['admin']['meta']['firstname'] );
		$meta->setLastname( $data['admin']['meta']['lastname'] );
		$this->dm->persist( $meta );

		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $this->request->post['admin']['emails'] as $data ){
			if ( $data['primary'] == 'true' ){
				$primary_email = strtolower($data['email']);
			}
		}
		// Get list email 
		$emails = array();
		$email = new Email();
		$email->setEmail( $primary_email );
		$email->setPrimary( true );
		$emails[] = $email;
		foreach ( $this->request->post['admin']['emails'] as $data ){
			if ( strtolower($data['email']) === $primary_email ){
				continue;
			}
			$email = new Email();
			$email->setEmail( $data['email'] );
			$email->setPrimary( false );
			$emails[] = $email;
		}
		
		// Update Admin
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$admin = $this->dm->getRepository('Document\Admin\Admin')->find( $id );
		$admin->setEmails( $emails );
		$admin->setPassword( sha1($salt . sha1($salt . sha1($data['admin']['password']))) );
		$admin->setMeta( $meta );
		
		
		// Set Group
		if ( $admin->getGroupAdmin() && $admin->getGroupAdmin()->getId() != $data['group'] ){
			$group = $this->dm->getRepository('Document\Admin\Group')->find( $data['admin']['group'] );
			if ( !$group ){
				return false;
			}
			$admin->setGroupAdmin( $group );
		} 
		
		// Set Status
		if ( isset($data['admin']['status']) ){
			$admin->setstatus( $data['admin']['status'] );
		}

		$this->dm->flush();
	}

	/**
	 * Delete Admin
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	array Data{
	 * 		int Admin ID
	 * 	}
	 * @return: void
	 */
	public function deleteAdmin( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$admin = $this->dm->getRepository( 'Document\Admin\Admin' )->find( $id );
				$this->dm->remove($admin);
			}
		}
		$this->dm->flush();
	}
	
	/**
	 * Get One Admin
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: Admin ID 
	 * @return: Object Admin
	 */
	public function getAdmin( $data = array() ) {
		$admin_repository = $this->dm->getRepository( 'Document\Admin\Admin' );
		
		if ( isset( $data['admin_id']) ){
			return $admin_repository->find( $data['admin_id'] );
		}
		
		if ( isset( $data['email']) ){
			return $admin_repository->findOneBy( array('emails.email' => $data['email']) );
		}
		
		return null;
	}

	/**
	 * Edit List Admins
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	array Data{
	 * 		int Limit
	 * 		int Start
	 * 		int Group ID
	 * 	}
	 * @return: array Object Admins
	 */
	public function getAdmins( $data = array() ) {
		if ( isset($data['group_id']) ){
			return $this->dm->getRepository( 'Document\Admin\Admin' )->findBy( array('group.id' => $data['group_id']) );
		}
		
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\Admin\Admin' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	/**
	 * Count Total Admins
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: empty
	 * @return: int Total Admin
	 */
	public function getTotalAdmins() {
		$admins = $this->dm->getRepository( 'Document\Admin\Admin' )->findAll();
		return count($admins);
	}
	
	/**
	 * Check Exist Email
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Email
	 * @return: boolean
	 */
	public function isExistEmail( $curr_Admin_id, $email ) {
		$admins = $this->dm->getRepository( 'Document\Admin\Admin' )->findAll();
		
		foreach ( $admins as $admin ) {
			if ( $admin->getId() == $curr_Admin_id ){
				continue;
			}
			
			if ( $admin->isExistEmail( $email ) ){
				return true;
			}
		}
		
		return false;
	}
}
?>