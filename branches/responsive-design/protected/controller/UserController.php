<?php
Doo::loadModel('User');
Doo::loadModel('Notification');
Doo::loadModel("ActivityType");
Doo::loadController('BaseController');

/**
 * User controller 
 * Manage the application's user
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class UserController extends BaseController{
	
	/**
	 * Constructor for UserController class
	 */
	public function __construct() {
		parent::__construct();
	}
		
	/**
	 * Get administration's users management page
	 */
	public function getAdministratorUsersPage(){
		
		if (!User::_isAdmin()) {
			return $this->_data['baseurl'];
		}
		
		$this->_data["admin_users_table"] = User::_getApplicationUsers();
		
		$this->renderView('administrator/administrator_users');
		
	}
	
	/**
	 * Get the current user profile
	 */
	public function getUserProfile(){
		
		$this->_data["user"] = User::_getUserProfile();
		
		//get notification linked with the current user
		$this->_data['notification'] = Notification::_getUserNotification();
		
		//get activity types
		$this->_data['activity_types'] = ActivityType::_getActivityTypes();

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
