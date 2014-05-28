<?php 
class ControllerApiSearch extends Controller {
	public function searchAll() {
		$this->load->model('tool/image');
		$this->load->model('tool/search');
		$this->load->model('tool/object');
		$this->load->model('user/user');
		$this->load->model('branch/post');

		$sKeyword = $this->request->get['keyword'];
		if ( empty($sKeyword) ){
			return false;
		}
		// Search with Solr
		$lSearchUsers = $this->model_tool_search->searchUserByKeyword( array('keyword' => $sKeyword) );
		$lSearchPosts = $this->model_tool_search->searchPostByKeyword( array('keyword' => $sKeyword) );
		$lSearchStocks = $this->model_tool_search->searchStockByKeyword( array('keyword' => $sKeyword) );

		// Get list Users
		$aUserIds = array();
		foreach ($lSearchUsers as $oSearchUser) {
			$aUserIds[$oSearchUser->getId()] = $oSearchUser->getId();
		}
		$lQueryUsers = $this->model_user_user->getUsers( array('user_ids' => $aUserIds) );
		$aUsers = array();
		foreach ( $lQueryUsers as $oQueryUser ) {
			if ( $oQueryUser->getId() == $this->customer->getId() ){
				continue;
			}
			$aUser = $oQueryUser->formatToCache();
			$aUser['avatar'] = $this->model_tool_image->getAvatarUser( $aUser['avatar'], $aUser['email'] );
			$aUser['metaInfo'] = '';
			if ( $oQueryUser->getMeta() && $oQueryUser->getMeta()->getLocation() ){
				$aUser['metaInfo'] = $oQueryUser->getMeta()->getLocation()->getLocation();
			}
			$aUsers[] = $aUser;
		}

		// Get list posts of branch
		$aBranchPostIds = array();
		foreach ( $lSearchPosts as $oPost ) {
			$aBranchPostIds[$oPost->getId()] = $oPost->getId();
		}
		$lBranchPosts = $this->model_branch_post->getPosts( array('post_ids' => $aBranchPostIds) );
		$aPosts = $this->model_tool_object->formatPosts( $lBranchPosts, false );

		// Get list stocks
		$aStocks = array();
		foreach ( $lSearchStocks as $oStock ) {
			$aStocks[$oStock->getCode()] = array(
				'code' => $oStock->getCode(),
				'name' => $oStock->getName()
			);
		}
		
		return $this->response->setOutput(json_encode(array(
            'success' => 'ok',
            'results' => array(
            	'users' => $aUsers,
            	'posts' => $aPosts,
            	'stocks' => array_values($aStocks)
            )
        )));
	}
}
?>