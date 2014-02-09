<?php
Doo::loadModel("Activity");
Doo::loadModel('ActivityType');
Doo::loadController('BaseController');
Doo::loadController('UserController');

class ActivityController extends BaseController {
	
	public function getActivityEditionPage() {
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		if (isset($this->params["activity_id"]))
		{
			$this->_data["activity"] = Activity::_getActivity($this->params["activity_id"]);
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->_data["activitytypes"] = ActivityType::_getActivityTypes();
		
		$this->renderView('activity');
	}
	
	public function saveActivity() {
		
		if (isset($_POST["idActivity"])) {
			Activity::_updateActivity($_POST["idActivity"], $_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityDone"], $_POST["activityCommentary"]);
		}
		else {
			Activity::_addActivity($_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityDone"], $_POST["activityCommentary"]);
		}
		
		return $this->_data["baseurl"];
	}
	
	public function deleteActivity() {
		
		if (isset($this->params["activity_id"]))
		{
			Activity::_deleteActivity($this->params["activity_id"]);
		}
		return $this->_data["baseurl"]; 
	}
	
	
	
	
	
	
	
	
}