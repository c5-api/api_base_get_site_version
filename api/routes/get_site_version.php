<?php defined('C5_EXECUTE') or die('Access Denied');

class GetSiteVersionApiRouteController extends ApiRouteController {

	public function run() {
		switch (API_REQUEST_METHOD) {
			case 'GET':
				return Config::get('SITE_APP_VERSION');
			
			default: //BAD REQUEST
				$this->setCode(400);
				$this->respond();
		}
	}
}