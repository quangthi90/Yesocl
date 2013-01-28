<?php
use Document\User\User;
use Document\User\Meta;
use Document\User\Email;

class ModelUserUser extends Doctrine {
	/**
	 * Create new User
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
	public function addUser( $data = array() ) {
		// Email is required
		if ( !isset($data['user']['emails']) || count($data['user']['emails']) < 0 ){
			return false;
		}
		
		// Password is required
		if ( !isset($data['user']['password']) || empty($data['user']['password']) ){
			return false;
		}
		
		// Group is required
		if ( !isset($data['user']['group']) ){
			return false;
		}
		$group = $this->dm->getRepository('Document\User\Group')->find( $data['user']['group'] );
		if ( !$group ){
			return false;
		}
		
		// Firstname is required
		if ( !isset($data['user']['meta']['firstname']) || empty($data['user']['meta']['firstname']) ){
			return false;
		}
		
		// Lastname is required
		if ( !isset($data['user']['meta']['lastname']) || empty($data['user']['meta']['lastname']) ){
			return false;
		}
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( $data['user']['meta']['firstname'] );
		$meta->setLastname( $data['user']['meta']['lastname'] );
		$this->dm->persist( $meta );
		
		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $this->request->post['user']['emails'] as $data ){
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
		foreach ( $this->request->post['user']['emails'] as $data ){
			if ( strtolower($data['email']) === $primary_email ){
				continue;
			}
			$email = new Email();
			$email->setEmail( $data['email'] );
			$email->setPrimary( false );
			$emails[] = $email;
		}
		
		// Create User
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user = new User();
		$user->setEmails( $emails );
		$user->setPassword( sha1($salt . sha1($salt . sha1($data['user']['password']))) );
		$user->setGroupUser( $group );
		$user->setMeta( $meta );
		
		// Add status
		if ( isset($data['user']['status']) ){
			$user->setStatus( $data['user']['status'] );
		}
		
		// Save to DB
		$this->dm->persist( $user );
		$this->dm->flush();
		
		return true;
	}

	/**
	 * Edit User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	User ID 
	 * 	array Data{
	 * 		string Email
	 * 		string Password
	 * 		int Group ID
	 * 		string Firstname
	 * 		string Lastname
	 * 	}
	 * @return: boolean
	 */
	public function editUser( $id, $data = array() ) {
		// Email is required
		if ( !isset($data['user']['emails']) || count($data['user']['emails']) < 0 ){
			return false;
		}
		
		// Password is required
		if ( !isset($data['user']['password']) || empty($data['user']['password']) ){
			return false;
		}
		
		// Group is required
		if ( !isset($data['user']['group']) || empty($data['user']['group']) ){
			return false;
		}
		
		// Firstname is required
		if ( !isset($data['user']['meta']['firstname']) || empty($data['user']['meta']['firstname']) ){
			return false;
		}
		
		// Lastname is required
		if ( !isset($data['user']['meta']['lastname']) || empty($data['user']['meta']['lastname']) ){
			return false;
		}
		
		// Create Meta
		$meta = new Meta();
		$meta->setFirstname( $data['user']['meta']['firstname'] );
		$meta->setLastname( $data['user']['meta']['lastname'] );
		$this->dm->persist( $meta );

		// Check email
		// Get primary email
		$primary_email = '';
		foreach ( $this->request->post['user']['emails'] as $data ){
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
		foreach ( $this->request->post['user']['emails'] as $data ){
			if ( strtolower($data['email']) === $primary_email ){
				continue;
			}
			$email = new Email();
			$email->setEmail( $data['email'] );
			$email->setPrimary( false );
			$emails[] = $email;
		}
		
		// Update User
		$salt = substr(md5(uniqid(rand(), true)), 0, 9);
		$user = $this->dm->getRepository('Document\User\User')->find( $id );
		$user->setEmails( $emails );
		$user->setPassword( sha1($salt . sha1($salt . sha1($data['user']['password']))) );
		$user->setMeta( $meta );
		
		
		// Set Group
		if ( $user->getGroupUser() && $user->getGroupUser()->getId() != $data['group'] ){
			$group = $this->dm->getRepository('Document\User\Group')->find( $data['user']['group'] );
			if ( !$group ){
				return false;
			}
			$user->setGroupUser( $group );
		} 
		
		// Set Status
		if ( isset($data['user']['status']) ){
			$user->setstatus( $data['user']['status'] );
		}

		$this->dm->flush();
	}

	/**
	 * Delete User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	array Data{
	 * 		int User ID
	 * 	}
	 * @return: void
	 */
	public function deleteUser( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$user = $this->dm->getRepository( 'Document\User\User' )->find( $id );
				$this->dm->remove($user);
			}
		}
		$this->dm->flush();
	}
	
	/**
	 * Get One User
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: User ID 
	 * @return: Object User
	 */
	public function getUser( $data = array() ) {
		$user_repository = $this->dm->getRepository( 'Document\User\User' );
		
		if ( isset( $data['user_id']) ){
			return $user_repository->find( $data['user_id'] );
		}
		
		if ( isset( $data['email']) ){
			return $user_repository->findOneBy( array('emails.email' => $data['email']) );
		}
		
		return null;
	}

	/**
	 * Edit List Users
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param:
	 * 	array Data{
	 * 		int Limit
	 * 		int Start
	 * 		int Group ID
	 * 	}
	 * @return: array Object Users
	 */
	public function getUsers( $data = array() ) {
		if ( isset($data['group_id']) ){
			return $this->dm->getRepository( 'Document\User\User' )->findBy( array('group.id' => $data['group_id']) );
		}
		
		if (!isset($data['limit']) || ((int)$data['limit'] < 0)) {
			$data['limit'] = 10;
		}
		
		if (!isset($data['start']) || ((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		return $this->dm->getRepository( 'Document\User\User' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );
	}
	
	/**
	 * Count Total Users
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: empty
	 * @return: int Total User
	 */
	public function getTotalUsers() {
		$users = $this->dm->getRepository( 'Document\User\User' )->findAll();
		return count($users);
	}
	
	/**
	 * Check Exist Email
	 * @author: Bommer <lqthi.khtn@gmail.com>
	 * @param: string Email
	 * @return: boolean
	 */
	public function isExistEmail( $curr_user_id, $email ) {
		$users = $this->dm->getRepository( 'Document\User\User' )->findAll();
		
		foreach ( $users as $user ) {
			if ( $user->getId() == $curr_user_id ){
				continue;
			}
			
			if ( $user->isExistEmail( $email ) ){
				return true;
			}
		}
		
		return false;
	}
}
?>