<?php
Doo::loadModel('base/ActivityBase');

class Activity extends ActivityBase{
	
	/**
	 * Get an activity with its id
	 * @param $idActivity
	 * @return $activity
	 */
	public static function _getActivity($idActivity) {
		
		$options = array(
				'asArray' => true,
				'limit' => 1
		);
		
		$activity = new Activity();
		$activity->activity_id = $idActivity;
		
		$activity = $activity->find($options);
		
		if(empty($activity)) return null;
		
		$activity["title"] = stripslashes(htmlspecialchars($activity["title"], ENT_QUOTES));
		$activity["description"] = stripslashes(htmlspecialchars($activity["description"], ENT_QUOTES));
		
		return $activity;
	}
	
	/**
	 * Edit an activity
	 * @param $activity_id
	 * @param $title
	 * @param $activityType
	 * @param $description
	 * @param $endDate
	 * @param $done
	 * @param $commentary
	 */
	public static function _updateActivity($activity_id, $title, $activityType, $description, $endDate, $endHour, $done, $commentary) {
		
		$options['limit'] = 1;
		
		$activity = new Activity();
		$activity->activity_id = $activity_id;
		
		$activity = $activity->find($options);
		
		//end date to SQL mode
		Doo::loadModel('Date');
		$endDate = Date::_dateHumanToSQL($endDate);
		
		$activity->title = $title;
		$activity->activity_type_id = $activityType;
		$activity->description = $description;
		$activity->end_date = $endDate ." ". $endHour;
		$activity->percent_done = $done;
		$activity->commentary = $commentary;
		
		$activity->update();
		
		return $activity_id;
		
	}
	
	/**
	 * Delete an activity
	 * @param $activity_id
	 */
	public static function _deleteActivity($activity_id) {
		
		$activity = new Activity();
		$activity->activity_id = $activity_id;
		$activity->delete();
	}
	
	/**
	 * Insert activities into database
	 * @param $title
	 * @param $activityType
	 * @param $description
	 * @param $endDate
	 * @param $done
	 * @param $commentary
	 */
	public static function _addActivity($title, $activityType, $description, $endDate, $endHour, $done, $commentary) {
		
		//end date to SQL mode
		Doo::loadModel('Date');
		$endDate = Date::_dateHumanToSQL($endDate);
		
		$activity = new Activity();
		$activity->title = $title;
		$activity->activity_type_id = $activityType;
		$activity->user_id = $_SESSION['user']['user_id'];
		$activity->description = $description;
		$activity->end_date = $endDate ." ". $endHour;
		$activity->percent_done = $done;
		$activity->commentary = $commentary;
		
		return $activity->insert();
	}
	
	/**
	 * Get all activities and sort them
	 * @return $activities
	 */
	public static function _getActivities() {
		
		$option = array(
				'asArray' 	=> true,
				'where' => 'user_id=' .$_SESSION['user']['user_id']
		);
		
		$activityTypeOption = array(
				'asArray' 	=> true,
				'limit' => 1
		);
		
		$activities = new Activity();
		$activities = $activities->find($option);
		
		if(empty($activities)) return null;
		
		Doo::loadModel('ActivityType');
				
		//End line managment and add type
		foreach ($activities as &$activity) {
			$activity["commentary"] = html_entity_decode(nl2br(htmlentities($activity["commentary"])));
			
			$activityType = new ActivityType();
			$activityType->activity_type_id = $activity["activity_type_id"];
			$activity["activity_type"] = $activityType->find($activityTypeOption);
		}
		
		//Sort activities and add nbDaysLeft Column (used into main.html)
		return Activity::_sortActivitiesTable($activities);
	}
	
	/**
	 * Get all activities linked with the chosen activity type
	 * @param $idActivityType
	 * @return Activities
	 */
	public static function _getActivitiesByActivityType($idActivityType) {
		
		$option = array(
				'asArray' 	=> true,
		);
		
		$activities = new Activity();
		$activities->activity_type_id = $idActivityType;
		$activities = $activities->find($option);
		
		if(empty($activities)) return null;
		
		return $activities;
	}
	
	/**
	 * Reassign activities
	 * @param activities with associated activity-type
	 */
	public static function _reassignActivity($activityTab) {
		
		$option = array(
				'limit' => 1
		);
		
		foreach ($activityTab as $key => $value) {
	      $activity = new Activity();
		  $activity->activity_id = explode("-", $key)[2];
		  $activity = $activity->find($option);
		  $activity->activity_type_id = explode("-", $value)[2];
		  $activity->update();
	    }
    
	}
	
	/**
	 * Sort activities tab and add attributs "nb_days_left", "nb_hours_left", "nb_minutes_left" and "tmp_left"
	 * @param  $activities
	 * @return $activities
	 */
	public static function _sortActivitiesTable($activities) {
		
		for ($i = 0; $i < count($activities); $i++)
		{
			$now   = time();
			$endDate = strtotime($activities[$i]["end_date"]);
			
			$diff = $endDate - $now;
			
			//If the activity isn't finished
			if ($diff > 0) {
				
				//Get the seconds between now and the end date and store it into tmpLeft attribute
				$activities[$i]["tmpLeft"] = $diff;
				$tmp = $diff;
				$activities[$i]["nb_seconds_left"] = $tmp % 60;
				
				$tmp = floor( ($tmp - $activities[$i]["nb_seconds_left"]) /60 );
				$activities[$i]["nb_minutes_left"] = $tmp % 60;
				
				$tmp = floor( ($tmp - $activities[$i]["nb_minutes_left"])/60 );
				$activities[$i]["nb_hours_left"] = $tmp % 24;
				
				$tmp = floor( ($tmp - $activities[$i]["nb_hours_left"])  /24 );
				$activities[$i]["nb_days_left"] = $tmp;
			} else {
				$activities[$i]["tmpLeft"] = 0;
				$activities[$i]["nb_seconds_left"] = 0;
				$activities[$i]["nb_minutes_left"] = 0;
				$activities[$i]["nb_hours_left"] = 0;
				$activities[$i]["nb_days_left"] = 0;
			}
		}
		//Sort activities with the php function "usort"
		usort($activities, "Activity::_compareActivities");
		
		return $activities;
		
	}
	
	/**
	 * Sort comparator
	 */
	public static function _compareActivities($a, $b) {
		if ($a["tmpLeft"] == $b["tmpLeft"])
		{
			if ($a["percent_done"] == $b["percent_done"])
			{
				return 0;
			}
			return ($a["percent_done"] < $b["percent_done"]) ? -1 : 1;
		}
		return ($a["tmpLeft"] < $b["tmpLeft"]) ? -1 : 1;
	}
	
}