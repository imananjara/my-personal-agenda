<?php
Doo::loadModel('base/UserBase');

class User extends UserBase{
	
	/**
	 * Create a session, if the user exists 
	 * @param $login
	 * @param $password
	 * @return boolean
	 */
	public static function _getSession($login, $password, $admin_checkbox)
	{
		$options = array(
				'asArray' => true,
				'limit' => 1
		);
	
		$user = new User();
		$user->login = $login;
		$user->password = md5($password);
		
		$user = $user->find($options);
		
		if ($user != null)
		{
			if ($admin_checkbox == "checked" && !$user["is_admin"]) {
				return "false-admin_page_forbidden_access";
			}
			
			$_SESSION["mpa_user_id"] = $user["user_id"];
			$_SESSION["mpa_user_login"] = $user["login"];
			$_SESSION["mpa_user_is_admin"] = $user["is_admin"];
			
			return "true-authorized";
		}
		
		return "false-incorrect_credentials";
	
	}
	
	/**
	 * Add a user into database
	 * @param $login
	 * @param $password
	 * @param $firstname
	 * @param $lastname
	 * @param $email
	 */
	public static function _addUser($login, $password, $firstname, $lastname, $email)
	{
		$user = new User();
		$user->login = $login;
		$user->password = md5($password);
		$user->firstname = $firstname;
		$user->lastname = $lastname;
		$user->email = $email;
		$user->is_admin = false;
		
		$insertedUserId = $user->insert();
		
		//Insert a notification object into database
		Doo::loadModel('Notification');
		$notif = new Notification();
		$notif->user_id = $insertedUserId;
		$notif->simple_alert_msg = "Cette activité sera terminée dans moins de 1 jour.";
		$notif->simple_alert_tl = 86400;
		$notif->critical_alert_msg = "Attention, cette activité terminera dans moins de 12 heures.";
		$notif->critical_alert_tl = 43200;
		$notif->end_activity_msg = "Cette activité est terminée.";
		$notif->insert();
	}
	
	/**
	 * Get the user's informations
	 */
	public static function _getUserProfile() {
		
		$options = array(
				'asArray' => true,
				'limit' => 1
		);
		
		$user = new User();
		$user->user_id = $_SESSION["mpa_user_id"];
		
		$user = $user->find($options);
		
		if(empty($user)) return null;
		
		return  $user;
	}
	
	/**
	 * Edit the user's profile
	 * @param $firstName
	 * @param $lastName
	 * @param $birthday
	 * @param $email
	 */
	public static function _editUserProfile($firstName, $lastName, $email) {
		
		$options['limit'] = 1;
		
		$user = new User();
		$user->user_id = $_SESSION["mpa_user_id"];
		$user = $user->find($options);
		
		$user->firstname = $firstName;
		$user->lastname = $lastName;
		$user->email = $email;

		$user->update();
		
	}
	
	/**
	 * Get all application's users
	 */
	public static function _getApplicationUsers() {
		
		$options = array(
				'asArray' => true
		);
		
		$users = new User();
		$users = $users->find($options);
		
		if(empty($users)) return null;
		
		return $users;
	}
}