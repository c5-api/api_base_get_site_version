<?php defined('C5_EXECUTE') or die('Access Denied');

class GetSiteVersionApiRouteController extends ApiRouteController {

	public function run() {
		switch (API_REQUEST_METHOD) {
			case 'GET':
				return Config::get('SITE_APP_VERSION');
			
			default: //METHOD NOT ALLOWED
				$this->setCode(405);
				$this->respond(arraY('error' => 'Method Not Allowed'));
		}
	}
}