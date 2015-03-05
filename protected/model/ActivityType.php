<?php
Doo::loadModel('base/ActivityTypeBase');

class ActivityType extends ActivityTypeBase{
	
	/**
	 * Get all types of activity
	 * return $types : Activity Type List
	 */
	public static function _getActivityTypes() {
		
		$option = array(
				'asArray' 	=> true
		);
		
		$types = new ActivityType();
		$types->user_id = $_SESSION['user']['user_id'];
		$types = $types->find($option);
		
		if(empty($types)) return null;
		
		return $types;
		
	}
	
	/**
	 * Add an activity type and return it's id
	 */
	public static function _addActivityType($name, $description) {
		
		$type = new ActivityType();
		$type->activity_type_name = $name;
		$type->activity_type_description = $description;
		$type->user_id = $_SESSION['user']['user_id'];
		
		return $type->insert();
	}
	
	/**
	 * Update an activity type and return it's id
	 */
	public static function _updateActivityType($activityTypeInfos) {
		
		$options['limit'] = 1;
		$type = new ActivityType();
		$type->activity_type_id = $activityTypeInfos['activity_type_id'];
		$type = $type->find($options);
		
		if (isset($activityTypeInfos['activity_type_name'])) {
			$type->activity_type_name = $activityTypeInfos['activity_type_name'];
		} else {
			$type->activity_type_description = $activityTypeInfos['activity_type_description'];
		}
		$type->update();
		
		return $activityTypeInfos['activity_type_id'];
	}
	
	/**
	 * Delete an activity type with it's id
	 */
	public static function _deleteActivityType($id) {
		
		$type = new ActivityType();
		$type->activity_type_id = $id;
		$type->delete();
	}
}