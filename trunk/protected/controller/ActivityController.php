<?php
Doo::loadModel("Activity");
Doo::loadModel('ActivityType');
Doo::loadController('BaseController');
Doo::loadController('UserController');

/**
 * ActivityController
 * This class is used for managing users activities
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class ActivityController extends BaseController {
	
	/**
	 * Get activity edition page (to create or update activity)
	 * @return activity page
	 */
	public function getActivityEditionPage() {
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		if (isset($this->params["activity_id"]))
		{
			$this->_data["activity"] = Activity::_getActivity($this->params["activity_id"]);
			
			//SQL mode to human mode
			$full_date = explode(' ', $this->_data["activity"]["end_date"]);
			
			$end_date = explode("-", $full_date[0]);
			$this->_data["activity"]["end_date"] = $end_date[2].'/'.$end_date[1].'/'.$end_date[0];
			
			$end_hour = explode(":", $full_date[1]);
			$this->_data["activity"]["end_hour"] = $end_hour[0] .":". $end_hour[1];
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->_data["activitytypes"] = ActivityType::_getActivityTypes();
		
		if (isset($_SESSION["mpa_user_is_admin"]) && $_SESSION["mpa_user_is_admin"]) {
			$this->_data["display_access_admin_page_btn"] = 1;
		}
		
		$this->renderView('activity');
	}
	
	/**
	 * Get administration's activity types management page
	 */
	public function getAdministratorActivityTypesPage() {
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		if (!$_SESSION["mpa_user_is_admin"]) {
			return $this->_data['baseurl'];
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->_data["admin_activitytypes_table"] = ActivityType::_getActivityTypes();
		
		$this->renderView('administrator/administrator_activitytypes');
	}
	
	/**
	 * Create or update an activity
	 * @return the main page (redirection)
	 */
	public function saveActivity() {
		
		if (isset($_POST["idActivity"])) {
			Activity::_updateActivity($_POST["idActivity"], $_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityEndHour"], $_POST["activityDone"], $_POST["activityCommentary"]);
		}
		else {
			Activity::_addActivity($_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityEndHour"], $_POST["activityDone"], $_POST["activityCommentary"]);
		}
		
		return $this->_data["baseurl"];
	}
	
	/**
	 * Delete an activity
	 * @return the main page (redirection)
	 */
	public function deleteActivity() {
		
		if (isset($this->params["activity_id"]))
		{
			Activity::_deleteActivity($this->params["activity_id"]);
		}
		return $this->_data["baseurl"]; 
	}
	
	/**
	 * Load a calendar and put activities into this
	 * @return calendar page
	 */
	public function getCalendarOfActivity() {
		//Load all activities and format arrayList to JSON
		$this->_data["activities"] = Activity::_getActivities();
		
		$activitiesArray = array();
		foreach ($this->_data["activities"] as $activity)
		{
			$activitiesArray[] = array(
				'id' => (int)$activity["activity_id"],
				'title' => $activity["title"],
				'url' => $this->_data["baseurl"] ."activity/". $activity["activity_id"],
				'class' => "event-info",
				'start' => (int)strtotime($activity["end_date"]) * 1000,
				'end' => (int)strtotime($activity["end_date"]) * 1000
			);
		}
			
		$this->_data["activitiesJson"] = json_encode($activitiesArray);
		
		//Write JSON into events.json.txt
		file_put_contents("global/utils/events.json.txt", json_encode(array('success' => 1, 'result' => $activitiesArray)));
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		$this->renderView('calendar');
	}
	
	
	
	
	
	
	
	
}