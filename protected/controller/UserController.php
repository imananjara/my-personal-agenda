<?php
Doo::loadModel('User');
Doo::loadModel('Notification');
Doo::loadController('BaseController');

/**
 * User controller : Manage the application's user
 */
class UserController extends BaseController{
	
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
	
	/**
	 * Get the current user profile
	 */
	public function getUserProfile(){
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->_data["user"] = User::_getUserProfile();
		
		//get notification linked with the current user
		$this->_data['notification'] = Notification::_getUserNotification();
		
		$this->renderView('profile');
	}
	
	/**
	 * Edit the current user profile
	 */
	public function editUserProfile(){
		User::_editUserProfile($_POST["inputFirstNameProfile"], $_POST["inputLastNameProfile"], $_POST["inputEmailProfile"]);
	}
	
	/**
	 * Edit the user notification
	 */
	public function  editUserNotification(){
		Notification::_updateUserNotification($_POST['notification_id'], $_POST['simple_alert_msg'], $_POST['simple_alert_tl'], $_POST['critical_alert_msg'], $_POST['critical_alert_tl'], $_POST['end_activity_msg']);
	}
}

