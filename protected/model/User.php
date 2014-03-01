<?php
Doo::loadModel('base/UserBase');

class User extends UserBase{
	
	/**
	 * Create a session, if the user exists 
	 * @param $login
	 * @param $password
	 * @return boolean
	 */
	public static function _getSession($login, $password)
	{
		$isConnected = false;
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
			$isConnected = true;
			$_SESSION["mpa_user_id"] = $user["user_id"];
			$_SESSION["mpa_user_login"] = $user["login"];
		}
		
		return $isConnected;
	}
	
	/**
	 * Add a user into database
	 * @param $login
	 * @param $password
	 * @param $firstname
	 * @param $lastname
	 * @param $birthday
	 * @param $email
	 */
	public static function _addUser($login, $password, $firstname, $lastname, $birthday, $email)
	{
		//birthday to SQL mode
		$date = explode('/', $birthday);
		$birthday = $date[2].'-'.$date[1].'-'.$date[0];
		
		$user = new User();
		$user->login = $login;
		$user->password = md5($password);
		$user->firstname = $firstname;
		$user->lastname = $lastname;
		$user->email = $email;
		$user->birthday_date = $birthday;
		
		$user->insert();
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
	public static function _editUserProfile($firstName, $lastName, $birthday, $email) {
		
		$options['limit'] = 1;
		
		//birthday to SQL mode
		$date = explode('/', $birthday);
		$birthday = $date[2].'-'.$date[1].'-'.$date[0];
		
		$user = new User();
		$user->user_id = $_SESSION["mpa_user_id"];
		$user = $user->find($options);
		
		$user->firstname = $firstName;
		$user->lastname = $lastName;
		$user->birthday_date = $birthday;
		$user->email = $email;

		$user->update();
		
	}
}