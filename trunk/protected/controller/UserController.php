<?php
Doo::loadModel('User');
Doo::loadController('BaseController');
/**
 * User controller
 */

class UserController extends BaseController{
		
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
	
	public function toLogout(){
	
		session_destroy();
		return $this->_data['baseurl'] .'login';
	
	}
	
	public function adduser(){
		
		User::_addUser($_POST['inputLoginInscrip'],$_POST['inputPasswordInscrip'], $_POST['inputFirstNameInscrip'], $_POST['inputLastNameInscrip'], $_POST['inputBirthdayInscrip'], $_POST['inputEmailInscrip']);
	}
}

