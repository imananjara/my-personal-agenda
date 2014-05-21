<?php
Doo::loadModel('User');
Doo::loadController('BaseController');

/**
 * Authentification controller.php 
 * Concerns the authentification's system
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class AuthentificationController extends BaseController{
	
	/**
	 * Get the login page
	 * @return The login page
	 */
	public function getLoginPage() {
		
		if (isset($_SESSION["mpa_user_id"]) && isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'];
		}
		
		$this->renderView('login');
	}
	
	/**
	 * Get a session for an application and send a response to the AJAX request
	 */
	public function getSession() {
		
		if (isset($_POST['admin_page_access'])) {
			$admin_checkbox = "checked";
		} else {
			$admin_checkbox = "unchecked";
		}

		echo User::_getSession($_POST['inputLoginAuth'],$_POST['inputPasswordAuth'], $admin_checkbox);
	}
	
	/**
	 * Destroy the user's session
	 * @return The login page
	 */
	public function toLogout(){
	
		session_destroy();
		return $this->_data['baseurl'] .'login';
	
	}
	
	/**
	 * Add a user into database. Reference the user's subscription
	 */
	public function adduser(){
		
		User::_addUser($_POST['inputLoginInscrip'],$_POST['inputPasswordInscrip'], $_POST['inputFirstNameInscrip'], $_POST['inputLastNameInscrip'], $_POST['inputEmailInscrip']);
	}
}

