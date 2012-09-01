<?php defined('C5_EXECUTE') or die("Access Denied.");

class ApiBaseGetSiteVersionPackage extends Package {

	protected $pkgHandle = 'api_base_get_site_version';
	protected $appVersionRequired = '5.6.0';
	protected $pkgVersion = '0.9';

	public function getPackageName() {
		return t("Api:Base:Get Site Version");
	}

	public function getPackageDescription() {
		return t("Get the site version from the API.");
	}

	public function install() {
		$installed = Package::getByHandle('api');
		if(!is_object($installed)) {
			throw new Exception(t('Please install the "API" package before installing %s', $this->getPackageName()));
		}

		parent::install();

		$pkg = Package::getByHandle($this->pkgHandle);
		ApiRoute::add('get_site_version', t('Get the installed version of concrete5'), $pkg);

	}
	
	public function uninstall() {
		ApiRouteList::removeByPackage($this->pkgHandle);//remove all the apis
		parent::uninstall();
	}

}