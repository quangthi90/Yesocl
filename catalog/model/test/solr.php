<?php
use Document\Post;

Class ModelTestSolr extends Model {
	public function getPosts( $data = array() ) {
		return $this->dm->getRepository( 'Document\Post' )->findAll();
	}
	
	public function addPost( $data = array() ) {
		if (isset($data['author']) && isset($data['content'])) {
			$post = new Post();
			$post->setAuthor( $data['author'] );
			$post->setContent( $data['content'] );
			$post->setCreate(new \DateTime() );
			
			$this->dm->persist( $post );
			$this->dm->flush();
			
			//$query = $this->client->createUpdate();
			//$query->addDocuments( array($post) );
			//$this->client->execute($query);
		}
	}
	
	public function deletePost( $data = array() ) {
		if (isset($data['id'])) {
			$post = $this->dm->getRepository('Document\Post')->find( $data['id'] );
			
			if ($post) {
				$this->dm->remove( $post );
				$this->dm->flush();
			}
		}
	}
	
	public function searchPosts( $query_data = null ) {
		$query = $this->client->createSelect(
			array(
				'mappedDocument' => 'Document\Post',
				)
			);
			
		if( $query_data == null ) {
			
		}elseif(is_array($query_data)) {
			$document = new Post();
			if (isset($query_data['content'])) {
				$document->setContent($query_data['content']);
			}
			if (isset($query_data['author'])) {
				$document->setAuthor($query_data['author']);
			}
			$query->setQueryByDocument( $document );
		}else {
			$query->setQuery( $query_data );
		}
		return $this->client->execute($query);
	}
	
	public function test() {
		$document = new Post();
		$document->setAuthor('tester');
		
		//$query = $this->client->createSelect();
		$query = $this->client->createSelect(
			array(
				'mappedDocument' => 'Document\Post',
				)
			);
		//$query->setQueryByDocument( $document );
		//echo '<pre>';var_dump( $query );echo '</pre>';
		//$query->addField( 'author_t' );
		//$query->setQuery( 'author_t: test' );
		$resultset = $this->client->execute($query);
		foreach ($resultset as $document) {
			echo '<pre>';var_dump( $document );echo '</pre>';
		}
	}
	
	public function testupdate() {
		$post = $this->dm->getRepository('Document\Post')->find('512642a5913db4e80e000036');
		$post->setAuthor('testupdate');
		$this->dm->flush();
	}
	
	public function editPost( $post_id, $data = array() ) {
		if ( isset($post_id) ) {
			$post = $this->dm->getRepository('Document\Post')->find( $data['id'] );
			
			if ($post) {
				if (isset( $data['author'] )) {
					$post->setAuthor( $data['author'] );
				}
				
				if (isset( $data['content'] )) {
					$post->setContent( $data['content'] );
				}
				
				$this->dm->flush();
				//$this->solr->deleteById( $post_id );
				
				//$solrDoc = new SolrInputDocument();
				//$solrDoc->addField( 'id', $post->getId() );
				//$solrDoc->addField( 'author_t', $post->getAuthor() );
				//$solrDoc->addField( 'content_t', $post->getContent() );
				//$this->solr->addDocument( $solrDoc );
				//$this->solr->commit();
			}
		}
	}
}