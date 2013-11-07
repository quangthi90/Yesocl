<?php
use Document\User\User;
use Document\User\Meta;
use Document\User\Meta\Email;
use Document\User\Post;
use Document\AbsObject\Comment;

Class ModelTestTest extends Model {
	public function getMongoDBSpeed( $start = 0) {
		// $posts = array();
		// for ($i=0; $i < 50; $i++) { 
		// 	$comments = array();
		// 	for ($j=0; $j < 10; $j++) { 
		// 		$comment = new Comment();
		// 		$comment->setContent( 'content ' . $j );
		// 		$comments[] = $comment;
		// 	}
		// 	$post = new Post();
		// 	$post->setContent( 'content' . $i );
		// 	$post->setComments( $comments );
		// 	$posts[] = $post;
		// }

		print(date('d/m/Y - h:i:s', time())) . '<br>';

		for ($i=$start; $i < ($start + 10000); $i++) {
			$email = new Email();
			$email->setEmail( 'user' . $i . '@test.com' );
			$email->setPrimary( true );

			$meta = new Meta();
			$meta->setFirstName('user');
			$meta->setLastName( $i );

			$user = new User();
			$user->setMeta( $meta );
			$user->addEmail( $email );
			$user->setUsername( 'user_' . $i );

			// $user->setPosts( $posts );

			$this->dm->persist( $user );
		}
		$this->dm->flush();
		print(date('d/m/Y - h:i:s', time())) . '<br>';
	}

	public function getUserByUserName( $username ){
		print(date('d/m/Y - h:i:s', time())) . '<br>';
		$user = $this->dm->getRepository('Document\User\User')->findOneByUsername( $username );
		if ( $user != null ){
			print $user->getUsername() . '<br>';
		}
		print(date('d/m/Y - h:i:s', time())) . '<br>';
	}
}