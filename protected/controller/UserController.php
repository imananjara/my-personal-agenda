<?php
Doo::loadModel('User');
Doo::loadController('BaseController');
/**
 * User controller
 */

class UserController extends BaseController{
	
	public function index() {
		
	if (isset($_SESSION["mpa_user_id"]) && isset($_SESSION["mpa_user_email"]))
		$this->renderView('main');
	else
		$this->renderView('login');	
		
	}
	
	public function getLoginPage() {
		
		$this->renderView('login');
	}
}

