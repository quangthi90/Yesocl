<?php
class ControllerApiBranch extends Controller {
	private $limit = 5;

	/*public function getAllStocks() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deny!'
	        )));
		}

		$this->load->model('stock/stock');

		$lStocks = $this->model_stock_stock->getAllStocks();

		$aStocks = array();
		foreach ( $lStocks as $oStock ) {
			if ( !$oStock->getLastExchange() || !$oStock->getPreLastExchange() )
				continue;
			$aStocks[] = $oStock->formatToCache();
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'stocks' => $aStocks
        )));
	}

	public function addStocksToWatchList() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deny!'
	        )));
		}

		if ( empty($this->request->post['stock_ids']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Stock ID is empty!'
	        )));
		}

		$this->load->model('user/setting');

		$result = $this->model_user_setting->addStocksToWatchList( $this->customer->getId(), $this->request->post['stock_ids'] );

		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Add Stock to Watch List have error'
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	public function removeStockFromWatchList() {
		if ( !$this->customer->isLogged() ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'permission deny!'
	        )));
		}

		if ( empty($this->request->get['stock_id']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Stock ID is empty!'
	        )));
		}

		$this->load->model('user/setting');
		$result = $this->model_user_setting->removeStockFromWatchList( $this->customer->getId(), $this->request->get['stock_id'] );

		if ( !$result ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Remove Stock have error!'
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok'
        )));
	}

	public function getStockExchanges() {
		if ( empty($this->request->get['stock_id']) ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Stock ID is empty!'
	        )));
		}

		$this->load->model('stock/exchange');

		$oStockExchanges = $this->model_stock_exchange->getExchange(array(
			'stock_id' => $this->request->get['stock_id']
		));

		if ( !$oStockExchanges ){
			return $this->response->setOutput(json_encode(array(
	            'success' => 'not ok',
	            'error' => 'Exchanges of this Stock is empty!'
	        )));
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'exchanges' => $oStockExchanges->getExchanges()
        )));
	}

	public function getIdeas() {
		if ( empty($this->request->get['stock_code']) ){
            return $this->response->setOutput(json_encode(array(
                'success' => 'not ok',
                'error' => gettext('stock code is empty')
            )));
        }

		if ( !empty($this->request->post['limit']) ){
			$limit = $this->request->post['limit'];
		}else{
			$limit = $this->limit;
		}

		if ( !empty($this->request->get['page']) ){
			$page = $this->request->get['page'];
		}else{
			$page = 1;
		}

		$this->load->model('stock/post');
		$this->load->model('tool/object');

		$aPosts = array();
		$lPosts = $this->model_stock_post->getPosts(array(
			'stock_code' => $this->request->get['stock_code'],
			'limit' => $limit,
			'start' => ($page - 1) * $limit,
		));

		$bCanLoadMore = false;
		if ( $lPosts ){
			$aPosts = $this->model_tool_object->formatPosts( $lPosts, false );
			if ( ($page - 1) * $limit + $limit < $lPosts->count() ){
				$bCanLoadMore = true;
			}
		}

		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'posts' => $aPosts,
            'canLoadMore' => $bCanLoadMore
        )));
	}*/

    public function getMembers(){
    	if ( empty($this->request->get['branch_slug']) ){
    		return $this->response->setOutput(json_encode(array(
    		'success' => 'not ok',
    		'users' => array()
    		)));
    	}

    	$sBranchSlug = $this->request->get['branch_slug'];
    	$oLoggedUser = $this->customer->getUser();
    	$oBranch = $oLoggedUser->getBranchBySlug( $sBranchSlug );

		// Member of Branch
    	$aUsers = array();
    	if ( $oBranch ){
    		$this->load->model('tool/image');
    		$this->load->model('friend/friend');
    		$this->load->model('friend/follower');

    		$lUser = $oBranch->getMembers();
    		foreach ( $lUser as $oUser ) {
    			$aUser = $oUser->formatToCache();
    			$aUser['fr_status'] = $this->model_friend_friend->checkStatus( $this->customer->getId(), $oUser->getId() );
    			$aUser['fl_status'] = $this->model_friend_follower->checkStatus( $this->customer->getId(), $oUser->getId() );
    			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
    			$aUsers[$aUser['id']] = $aUser;
    		}
    	}

    	return $this->response->setOutput(json_encode(array(
    		'success' => 'ok',
    		'users' => $aUsers
    		)));
    }

	public function getNews() {
		if ( !empty($this->request->post['limit']) ){
			$limit = $this->request->post['limit'];
		}else{
			$limit = $this->limit;
		}

		if ( !empty($this->request->get['page']) ){
			$page = $this->request->get['page'];
		}else{
			$page = 1;
		}

		if ( empty($this->request->get['branch_slug']) ){
			return $this->response->setOutput(json_encode(array(
				'success' => 'not ok',
				'posts' => array(),
				'canLoadMore' => false,
				)));
		}

		$sBranchSlug = $this->request->get['branch_slug'];
		$oLoggedUser = $this->customer->getUser();
		$oBranch = $oLoggedUser->getBranchBySlug( $sBranchSlug );

		if ( !$oBranch ){
			return $this->response->setOutput(json_encode(array(
				'success' => 'not ok',
				'posts' => array(),
				'canLoadMore' => false,
				)));
		}

		$this->load->model('branch/post');
		$this->load->model('friend/friend');
		$this->load->model('friend/follower');
		$this->load->model('tool/image');
		$this->load->model('tool/object');

		$aUsers = array();
		$aPosts = array();
		$lPosts = $this->model_branch_post->getPosts( array(
			'branch_id' => $oBranch->getId(),
			'limit' => $limit,
			'start' => ($page - 1) * $limit,
			) );

		$bCanLoadMore = false;
		if ( $lPosts ){
			$aPosts = $this->model_tool_object->formatPosts( $lPosts, false );
			if ( ($page - 1) * $limit + $limit < $lPosts->count() ){
				$bCanLoadMore = true;
			}
		}

		return $this->response->setOutput(json_encode(array(
			'success' => 'ok',
			'posts' => $aPosts,
			'canLoadMore' => $bCanLoadMore
			)));
	}
}
?>