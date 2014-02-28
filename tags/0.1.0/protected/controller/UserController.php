<?php
Doo::loadModel('User');
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
		
		User::_addUser($_POST['inputLoginInscrip'],$_POST['inputPasswordInscrip'], $_POST['inputFirstNameInscrip'], $_POST['inputLastNameInscrip'], $_POST['inputBirthdayInscrip'], $_POST['inputEmailInscrip']);
	}
	
	/**
	 * Get the current user profile
	 */
	public function getUserProfile(){
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->_data["user"] = User::_getUserProfile();
		
		$full_date = explode(' ', $this->_data["user"]["birthday_date"]);
			
		$birthday_date = explode("-", $full_date[0]);
		$this->_data["user"]["birthday_date"] = $birthday_date[2].'/'.$birthday_date[1].'/'.$birthday_date[0];
		
		$this->renderView('profile');
	}
	
	/**
	 * Edit the current user profile
	 */
	public function editUserProfile(){
		$_SESSION["test"] = $_POST["inputFirstNameProfile"];
		User::_editUserProfile($_POST["inputFirstNameProfile"], $_POST["inputLastNameProfile"], $_POST["inputBirthdayProfile"], $_POST["inputEmailProfile"]);
		return $this->_data["baseurl"];
	}
}

