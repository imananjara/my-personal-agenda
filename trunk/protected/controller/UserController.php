<?php
Doo::loadModel('User');
Doo::loadController('BaseController');
/**
 * User controller
 */

class UserController extends BaseController{
	
	public function index() {
		
	if (isset($_SESSION["mpa_user_id"]) && isset($_SESSION["mpa_user_login"]))
		$this->renderView('main');
	else
		$this->renderView('login');	
		
	}
	
	public function getLoginPage() {
		
		$this->renderView('login');
	}
	
	public function getSession() {

		if(User::_getSession($_POST['inputLoginAuth'],$_POST['inputPasswordAuth']))
		{
			$isConnected = "true";
		}
		else
		{
			$isConnected = "false";
		}
		echo $isConnected;
	}
	
	public function adduser(){
		
		User::_addUser($_POST['inputLoginInscrip'],$_POST['inputPasswordInscrip'], $_POST['inputFirstNameInscrip'], $_POST['inputLastNameInscrip'], $_POST['inputBirthdayInscrip'], $_POST['inputEmailInscrip']);
	}
}

