<?php
Doo::loadModel("Activity");
Doo::loadModel('ActivityType');
Doo::loadModel('Task');
Doo::loadModel('User');
Doo::loadController('BaseController');
Doo::loadController('UserController');

/**
 * ActivityController
 * This class is used for managing users activities
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class ActivityController extends BaseController {
	
	/**
	 * Constructor for ActivityController class
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Get activity edition page (to create or update activity)
	 * @return activity page
	 */
	public function getActivityEditionPage() {
		
		if (isset($this->params["activity_id"]))
		{
			$this->_data["activity"] = Activity::_getActivity($this->params["activity_id"]);
			
			//SQL mode to human mode
			Doo::loadModel('Date');
			$full_date = explode(' ', $this->_data["activity"]["end_date"]);
			$this->_data["activity"]["end_date"] = Date::_dateSQLToHuman($full_date[0]);
			$this->_data["activity"]["end_hour"] = Date::_hourSQLToHuman($full_date[1]);
			
			$this->_data['tasks'] = Task::_getTasks($this->params["activity_id"]);
		}
		
		$this->_data["activitytypes"] = ActivityType::_getActivityTypes();
		
		$this->renderView('activity');
	}
	
	/**
	 * Create or update an activity
	 * @return the main page (redirection)
	 */
	public function saveActivity() {
		
		if (isset($_POST["idActivity"])) {
			echo Activity::_updateActivity($_POST["idActivity"], $_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityEndHour"], $_POST["activityDone"], $_POST["activityCommentary"]);
		}
		else {
			echo Activity::_addActivity($_POST["activityTitle"], $_POST["activityTypes"], $_POST["activityDescription"], $_POST["activityEndDate"], $_POST["activityEndHour"], $_POST["activityDone"], $_POST["activityCommentary"]);
		}
		
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
	 * Get all activities linked with the chosen activity type
	 */
	public function getActivitiesByActivityType() {
		echo json_encode(Activity::_getActivitiesByActivityType($this->params['activity_type_id']));
	}
	
	/**
	 * Reassign activities
	 */
	public function reassignActivities() {
		Activity::_reassignActivity($_POST);
	}
	
	/**
	 * Save (create or update) an activity type and return its id
	 */
	public function saveActivityType() {
		
		if (isset($_POST['activity_type_id'])) {
			echo ActivityType::_updateActivityType($_POST);
		} else {
			echo ActivityType::_addActivityType($_POST["activity_type_name"], $_POST["activity_type_description"]);
		}
	}
	
	/**
	 * Delete an activity_type
	 */
	public function deleteActivityType() {
		ActivityType::_deleteActivityType($this->params['activity_type_id']);
	}
	
	/**
	 * Save (create or update) a task and return its id
	 */
	public function saveTask() {
		if (isset($_POST['task_id'])) {
			echo Task::_updateTask($_POST);
		} else {
			echo Task::_addTask($_POST);
		}
	}
	
	/**
	 * Delete the task chosen by the user
	 */
	public function deleteTask() {
		Task::_deleteTask($this->params['task_id']);
	}
	
	/**
	 * Set option which determines whether the percent done is automatically calculated
	 * or not. If auto-percent == 1, we calculate automatically activity's percent_done
	 */
	public function setAutoPercentDone() {
		
		$options = array(
				'limit' => 1
		);
		
		Doo::loadClass('Activity');
		$activity = new Activity();
		$activity->activity_id = $this->params['activity_id'];
		$activity = $activity->find($options);
		
		$activity->auto_percent_done = $this->params['auto'];
		$activity->update();
	}
	
	/**
	 * Update only activity percent done.
	 */
	public function updatePercentDoneAuto() {
		$options = array(
				'limit' => 1
		);
		
		Doo::loadClass('Activity');
		$activity = new Activity();
		$activity->activity_id = $this->params['activity_id'];
		$activity = $activity->find($options);
		
		$activity->percent_done = $this->params['percent'];
		$activity->update();
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
		
		$this->renderView('calendar');
	}
		
}