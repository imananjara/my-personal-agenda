<?php
Doo::loadModel('base/ActivityBase');

class Activity extends ActivityBase{
	
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
	
	public static function _getActivities() {
		
		$option = array(
				'asArray' 	=> true,
				'where' => 'user_id=' .$_SESSION["mpa_user_id"]
		);
		
		$activities = new Activity();
		$activities = $activities->find($option);
		
		if(empty($activities)) return null;
		
		//Sort activities and add nbDaysLeft Column (used into main.html)
		for ($i = 0; $i < count($activities); $i++)
		{
			$end_date = new DateTime($activities[$i]["end_date"]);
			$today = new DateTime(date("Y-m-d"));
			$difference = $today->diff($end_date);
			$activities[$i]["nbDaysLeft"] = (int)$difference->format('%R%a');
		}
		
		return $activities;
	}
}