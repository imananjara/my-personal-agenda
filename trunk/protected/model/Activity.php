<?php
Doo::loadModel('base/ActivityBase');

class Activity extends ActivityBase{
	
	public static function _addActivity($title, $activityType, $description, $endDate, $done, $commentary) {
		
		//end date to SQL mode
		$date = explode('/', $endDate);
		$endDate = $date[2].'-'.$date[1].'-'.$date[0];
		
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
}