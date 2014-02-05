<?php
Doo::loadModel("Activity");
Doo::loadModel('ActivityType');
Doo::loadController('BaseController');
Doo::loadController('UserController');

class ActivityController extends BaseController {
	
	public function getActivityCreationPage() {
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->_data["activitytypes"] = ActivityType::_getActivityTypes();
		
		$this->renderView('activity');
	}
	
	public function saveActivity() {
		Activity::_addActivity($_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityDone"], $_POST["activityCommentary"]);
		return $this->_data["baseurl"];
	}
	
	
	
	
	
	
	
	
}