<?php
class ControllerCommonYahoocnt extends Controller {
	public function getContactsList() {
		// test config
		$consumer_key = 'dj0yJmk9NnF6eDZTWTFhc1J3JmQ9WVdrOU4zQlJZMUYyTjJrbWNHbzlNakUwTlRnd01qWTJNZy0tJnM9Y29uc3VtZXJzZWNyZXQmeD0zNg--';
		$consumer_secret = 'bbdf9e8e72766b9d02a2b8d1fda7c1cea30baf0e';
		$app_id = '7pQcQv7i';

		// required yahoo php sdk
		require_once(DIR_SYSTEM . 'library/yahoo/Yahoo.inc');

		// defined limit & start
		if (!isset($this->request->get['page'])) {
			$page = 1;
		}else {
			$page = (int) $this->request->get['page'];
		}

		$limit = 10;
		$start = ($page - 1)*$limit;

		// start section
		$session = YahooSession::requireSession($consumer_key,$consumer_secret,$app_id);
		
		// get current user
		if (!empty($session)) {
			$user = $session->getSessionedUser();
		}

		$result = array();
		$result['success'] = 'not ok';
		$result['contacts'] = array();
		$result['type'] = 'yahoo';

		// get list contacts
		if (!empty($user)) {
			$result['success'] = 'ok';
			$yql = 'SELECT * FROM social.contacts(' . $start . ',' . $limit . ') WHERE guid="me"';  
			$response = $session->query($yql); 
			foreach ($response->query->results->contact as $contact) {
				foreach ($contact->fields as $field) {
					if ($field->type == "yahooid") {
						$result['contacts'][] = $field->value;
					}
				}
			}
		}

		// for testing
		$result = array();
		$result['success'] = 'ok';
		$result['contacts'] = array(
			"adriano_juve01",
			"anhmongemquayve92001",
			"nhung_1303",
			"kietlun_123",
			"duc_trai_dep83",
			"vicnguyen007",
			"xuongrongbien3dx",
			"visaotronglonganh_09h",
			"zzz_saotinhyeu_zzz",
			"hanhle1232000",
			);
		$result['type'] = 'yahoo';
		
		$response = '<html><head><title>Test</title></head><body ';
		$response .= 'onunload="window.opener.getFriendList(';
		$response .= str_replace("\"","'",json_encode($result));
		$response .= ');">';
		$response .= '</body></html>';

		// render
		$this->response->setOutput($response);
	}
}
?>