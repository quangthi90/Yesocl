<?php
use Document\Customer\Customer;
use Document\Information\User\Meta;

class ModelCustomerCustomer extends Model {
	public function addCustomer( $customer = array() ) {
		// Email is require
		if ( !isset($customer['email']) || empty($customer['email']) ){
			return false;
		}
		
		// Password is require
		if ( !isset($customer['password']) || empty($customer['password']) ){
			return false;
		}
		
		$customer = new Customer();
		$customer->setName( $customer['email'] );
		$customer->setPassword( $customer['password'] );
		
		if ( isset($customer['status']) ){
			$customer->setStatus( $customer['status'] );
		}
		
		$meta = new Meta();
		
		if ( isset($customer['firstname']) ){
			$meta->setFirstname( $customer['firstname'] );
		}
		
		if ( isset($customer['lastname']) ){
			$meta->setLastname( $customer['lastname'] );
		}
		
		if ( isset($customer['birthday']) ){
			$meta->setBirthday( $customer['birthday'] );
		}
		
		$this->dm->persist( $meta );
		$this->dm->flush();

		$this->dm->persist( $customer );
		$this->dm->flush();
	}

	public function editCustomer( $id, $data = array() ) {
		// Name is require
		if ( !isset($data['name']) || empty($data['name']) ){
			return false;
		}
		
		$Customer = $this->dm->getRepository('Document\Customer\Customer')->find( $id );

		$Customer->setName( $data['name'] ); 

		if ( isset($data['status']) ){
			$status = $data['status'] === 1 ? true : false;
			
			$Customer->setStatus( $status );
		}

		$this->dm->flush();
	}

	public function deleteCustomer( $data = array() ) {
		if ( isset($data['id']) ) {
			foreach ( $data['id'] as $id ) {
				$Customer = $this->dm->getRepository( 'Document\Customer\Customer' )->find( $id );

				$this->dm->remove($Customer);
			}
		}
		
		$this->dm->flush();
	}
	
	public function getCustomer( $customer_id ) {
		$customer_group = $this->dm->getRepository( 'Document\Customer\Group' )->find( array('customers.id' => $customer_id) );
		
		foreach ( $customer_group->getCustomers() as $customer ) {
			if ( $customer_id == $customer->getId() ){
				return $customer;
			}
		}
		
		return null;
	}

	public function getCustomers( $data = array() ) {
		if (!isset($data['limit']) || !((int)$data['limit'] < 0)) {
			$data['limit'] = 15;
		}
		if (!isset($data['start']) || !((int)$data['start'] < 0)) {
			$data['start'] = 0;
		}

		$customers = $this->dm->getRepository( 'Document\Customer\Customer' )->findAll()->limit( $data['limit'] )->skip( $data['start'] );

		$results = array();
		foreach ($customers as $customer_id => $customer) {
			$results[] = array(
				'id' => $customer_id,
				'name' => $customer->getName(),
				'status' => $customer->getStatus()
			);
		}

		return $results;
	}
}
?>