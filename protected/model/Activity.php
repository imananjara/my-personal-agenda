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
	public static function _updateActivity($activity_id, $title, $activityType, $description, $endDate, $done, $commentary) {
		
		$options['limit'] = 1;
		
		$activity = new Activity();
		$activity->activity_id = $activity_id;
		
		$activity = $activity->find($options);
		
		//end date to SQL mode
		$date = explode('/', $endDate);
		$endDate = $date[2].'-'.$date[0].'-'.$date[1];
		
		$activity->title = $title;
		$activity->activity_type_id = $activityType;
		$activity->description = $description;
		$activity->end_date = $endDate;
		$activity->percent_done = $done;
		$activity->commentary = $commentary;
		
		$activity->update();
		
	}
	
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
	public static function _addActivity($title, $activityType, $description, $endDate, $done, $commentary) {
		
		//end date to SQL mode
		$date = explode('/', $endDate);
		$endDate = $date[2].'-'.$date[0].'-'.$date[1];
		
		$activity = new Activity();
		$activity->title = $title;
		$activity->activity_type_id = $activityType;
		$activity->user_id = $_SESSION["mpa_user_id"];
		$activity->description = $description;
		$activity->end_date = $endDate;
		$activity->percent_done = $done;
		$activity->commentary = $commentary;
		
		$activity->insert();
	}
	
	/**
	 * Get all activities and sort them
	 * @return $activities
	 */
	public static function _getActivities() {
		
		$option = array(
				'asArray' 	=> true,
				'where' => 'user_id=' .$_SESSION["mpa_user_id"]
		);
		
		$activities = new Activity();
		$activities = $activities->relate("ActivityType", $option);
		
		if(empty($activities)) return null;
		
		//Sort activities and add nbDaysLeft Column (used into main.html)
		return Activity::_sortActivitiesTable($activities);
	}
	
	/**
	 * Sort activities tab and add attribut "nbDaysLeft"
	 * @param  $activities
	 * @return $activities
	 */
	public static function _sortActivitiesTable($activities) {
		
		for ($i = 0; $i < count($activities); $i++)
		{
			$end_date = new DateTime($activities[$i]["end_date"]);
			$today = new DateTime(date("Y-m-d"));
			$difference = $today->diff($end_date);
			
			if ((int)$difference->format('%R%a') >= 0) {
				$activities[$i]["nbDaysLeft"] = (int)$difference->format('%R%a');
			} else {
				$activities[$i]["nbDaysLeft"] = (int)$difference->format('%R%a');
			}
		}
		
		return $activities;
		
	}
	
}