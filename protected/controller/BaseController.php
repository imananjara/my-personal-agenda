<?php

/**
 * BaseController
 * Basic methods used into the project
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class BaseController extends DooController{
	
	/**
	 * Initialize the base url and globalurl
	 */
	public function __construct() {
		$this->_data['baseurl'] = Doo::conf()->APP_URL;
		$this->_data['globalurl'] = $this->_data['baseurl'].'global/';
	}
	
	/**
	 * Check if the user is authentified
	 * @see DooController::beforeRun()
	 */
	public function beforeRun($resource, $action){
	
		//if not login, group = anonymous
		$role = (User::_isConnected()) ? 'auth' : 'anonymous';

		if(!$this->acl()->isAllowed($role, $resource, $action)){
			if ($this->isAjax()) {
				header("HTTP/1.1 401 Unauthorized");
				exit;
			}
			return $this->_data['baseurl'] ."login";
		}
		
		if ($role == "auth") $this->_data['session'] = $_SESSION;
	}
	
	/**
	 * Call one of html page
	 * @param unknown $page
	 */
	protected function renderView($page) {
		$this->render($page, $this->_data);
	}
}