<?php
Doo::loadModel('Activity');
Doo::loadModel('User');
Doo::loadModel('Note');
Doo::loadModel('Notification');
Doo::loadController('BaseController');
Doo::loadController('UserController');
/**
 * Main Page controller
 */

class MainPageController extends BaseController{
	
	/**
	 * Get 'My personal agenda' main page
	 * @return the main page
	 */
	public function getMainPage() {
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		//get activities (for the user)
		$this->_data["activities"] = Activity::_getActivities();
		
		//get notification linked with the current user
		$this->_data['notification'] = Notification::_getUserNotification();
		
		//get notes (for the user)
		$this->_data["notes"] = Note::_getNotes();
		
		$this->renderView('main');
	}
	
}

