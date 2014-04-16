<?php
use Document\Friend\Friend,
	Document\User\Notification;
use Document\User\User,
	Document\User\Meta,
	Document\User\Meta\Email,
	Document\User\Meta\Education,
	Document\User\Meta\Experience,
	Document\User\Meta\Location,
	Document\User\Meta\Phone,
	Document\User\Meta\Skill;

class ModelUserUser extends Model {
	public function addUser($aData, $bIsSocial = false) {
		if ( empty( $aData['email'] ) ) {
			return false;
		}

		$aUserConfig = $this->config->get('user');
		
		$oUserGroup = $this->dm->getRepository('Document\User\Group')->findOneByName( $aUserConfig['default']['group_name']);
		
		$sSalt = substr(md5(uniqid(rand(), true)), 0, 9);
		
		$oMeta = new Meta();
		if ( !empty( $aData['firstname'] ) ) {
			$oMeta->setFirstname( $aData['firstname'] );
		}
		if ( !empty( $aData['lastname'] ) ) {
			$oMeta->setLastname( $aData['lastname'] );
		}
		if ( !empty( $aData['month'] ) && !empty( $aData['day'] ) && !empty( $aData['year'] ) ) {
			$oMeta->setBirthday( new \Datetime($aData['month'] . '/' . $aData['day'] . '/' . $aData['year']) );
		}
		if ( !empty( $aData['sex'] ) ) {
			$oMeta->setSex( $aData['sex'] );
		}

		if ( !empty($aData['location']) ){
			$oLocation = new Location();
			$oLocation->setLocation( $aData['location'] );
			$oMeta->setLocation( $oLocation );
		}
		
		$oEmail = new Email();
		$oEmail->setEmail( $aData['email'] );
		$oEmail->setPrimary( true );

		// Slug
		$sSlug = $this->url->create_slug( $aData['firstname'] . ' ' . $aData['lastname'] );
		
		$lUsers = $this->dm->getRepository( 'Document\User\User' )->findBySlug( new MongoRegex("/^$sSlug/i") );

		$aSlugs = array_map(function($oUser){
			return $oUser->getSlug();
		}, $lUsers->toArray());

		$this->load->model( 'tool/slug' );
		$this->load->model( 'tool/mail' );

		$sSlug = $this->model_tool_slug->getSlug( $sSlug, $aSlugs );

      	$oUser = new User();
      	$oUser->setSlug( $sSlug );
      	$oUser->setMeta( $oMeta );
      	$oUser->addEmail( $oEmail );
      	$oUser->setSalt( $sSalt );
      	$oUser->setStatus( true );
      	$oUser->setGroupUser( $oUserGroup );
      	if ( !$bIsSocial ) {
      		$oUser->setPassword( sha1($sSalt . sha1($sSalt . sha1($aData['password']))) );
      	}
      	$oUser->setIsSocial( $bIsSocial );

      	$this->dm->persist( $oUser );
		$this->dm->flush();

		if ( !empty($aData['avatar']) ){
      		$this->load->model('tool/image');
			$sFolderLink = $this->config->get('user')['default']['image_link'];
			$sAvatarName = $this->config->get('post')['default']['avatar_name'];
			$sPath = $sFolderLink . $oUser->getId() . '/' . $sAvatarName . '.jpg';
			
			$this->model_tool_image->moveFile( $aData['avatar'], DIR_IMAGE . $sPath );
			$oUser->setAvatar( $sPath );
		}

		$sToken = md5( time() );
		$oUser->setToken( $sToken );

		$this->dm->flush();
		$this->language->load('mail/user');

		$sSubject = sprintf($this->language->get('text_subject'), $this->config->get('config_name'));		
		$sMessage = sprintf($this->language->get('text_welcome'), $this->config->get('config_name')) . "\n\n";
		$sMessage .= $this->language->get('text_approval') . "\n" ;
		$sMessage .= $this->extension->path('ActiveAccount', array('token' => $sToken)) . "\n\n";
		$sMessage .= $this->language->get('text_services') . "\n\n";
		$sMessage .= $this->language->get('text_thanks') . "\n";
		$sMessage .= $this->config->get('config_name');
		
		$this->model_tool_mail->sendMail( $aData['email'], $sSubject, $sMessage );

		return $oUser;
	}

	public function editUser( $sUserSlug, $aData = array() ){
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserSlug );

		if ( !$oUser ){
			return false;
		}

		if ( !empty($aData['request_friend']) ){
			$aRequests = $oUser->getFriendRequests();

			$iIndex = array_search( $aData['request_friend'], $aRequests );

			if ( !$aRequests || $iIndex === false ){
				$oUser->addFriendRequest( $aData['request_friend'] );
			}else{
				unset($aRequests[$iIndex]);
				$oUser->setFriendRequests( $aRequests );
			}
		}

		if ( !empty($aData['avatar']) && !empty($aData['avatar']['image_link']) && !empty($aData['avatar']['extension']) && is_file($aData['avatar']['image_link']) ){
			$this->load->model('tool/image');

			$sFolderLink = $this->config->get('user')['default']['image_link'];
			$sAvatarName = $this->config->get('post')['default']['avatar_name'];
			$sPath = $sFolderLink . $oUser->getId() . '/' . $sAvatarName . '.' . $aData['avatar']['extension'];
			$dest = DIR_IMAGE . $sPath;
			if ( $this->model_tool_image->moveFile($aData['avatar']['image_link'], $dest) ){
				$oImage = new Image( $dest );
				$iHolderW = $aData['avatar']['holderW'];
				$iHolderH = $aData['avatar']['holderH'];
				if($iHolderW > 0 && $iHolderH > 0){
					$oImage->resize($iHolderW, $iHolderH);
				}
				$oImage->crop( $aData['avatar']['x'], $aData['avatar']['y'], $aData['avatar']['x'] + $aData['avatar']['width'], $aData['avatar']['y'] + $aData['avatar']['width'], true );
				$oImage->save( $dest );
				$oUser->setAvatar( $sPath );
			}
		}

		$this->dm->flush();

		return true;
	}

	public function getUser( $sUserSlug ){
		$this->load->model('tool/cache');
		$sUserType = $this->config->get('common')['type']['user'];

		$aUser = $this->model_tool_cache->getObject( $sUserSlug, $sUserType );

		if ( !$aUser ){
			$oUser = $this->dm->getRepository('Document\User\User')->findOneBySlug( $sUserSlug );
			
			if ( !$oUser ){
				return null;
			}

			$this->model_tool_cache->setObject( $oUser, $sUserType );

			$aUser = $oUser->formatToCache();
		}

		return $aUser;
	}

	public function getUserFull( $aData = array() ){
		if ( !empty($aData['user_id']) ){
			return $this->dm->getRepository('Document\User\User')->find( $aData['user_id'] );
		}

		if ( !empty($aData['user_slug']) ){
			return $this->dm->getRepository('Document\User\User')->findOneBySlug( $aData['user_slug'] );
		}

		if ( !empty($aData['email']) ){
			return $this->dm->getRepository('Document\User\User')->findOneBy( array(
				'emails.email' => $aData['email']
			));
		}

		return null;
	}

	public function getUsers( $aData = array() ){
		if ( !empty($aData['user_ids']) ){
			return $this->dm->getRepository('Document\User\User')->findBy(array(
				'id' => array('$in' => $aData['user_ids'])
			));
		}

		if ( !empty($aData['email']))

		return null;
	}

	public function isExistEmail( $oEmail, $idUser = '' ) {
		$lUsers = $this->dm->getRepository( 'Document\User\User' )->findBy( array( 'emails.email' => $oEmail ) );
		
		foreach ( $lUsers as $oUser ) {
			if ( $oUser->getId() == $idUser ){
				continue;
			}else {
				return true;
			}
		}
		
		return false;
	}

	public function editPassword($oEmail, $sPassword) {
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'emails.email' => $oEmail
		));

		if ( !$oUser || $oUser->getIsSocial() == true ){
			return null;
		}

		$sSalt = $oUser->getSalt();
		$sPasswordInput = substr(md5(mt_rand()), 0, 10);
		$sPassword = sha1($sSalt . sha1($sSalt . sha1($sPasswordInput)));
		
		$oUser->setForgotten( $sPassword );

		$this->dm->flush();

		return $sPasswordInput;
	}

	public function getTotalCustomersByEmail($oEmail) {
		$query = $this->dm->getRepository('Document\User\User')->findBy(array(
			'emails.email' => $oEmail
		));

		return $query->count();
	}

	public function active( $sToken ){
		$oUser = $this->dm->getRepository('Document\User\User')->findOneBy(array(
			'token' => $sToken
		));

		if ( !$oUser ){
			return null;
		}

		$oUser->setToken('');

		$this->dm->flush();

		return $oUser;
	}
}
?>