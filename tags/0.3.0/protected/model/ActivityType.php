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
		$types->user_id = $_SESSION["mpa_user_id"];
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
		$type->user_id = $_SESSION["mpa_user_id"];
		
		return $type->insert();
	}
	
	/**
	 * Update an activity type and return it's id
	 */
	public static function _updateActivityType($id, $name, $description) {
		
		$options['limit'] = 1;
		$type = new ActivityType();
		$type->activity_type_id = $id;
		$type = $type->find($options);
		
		$type->activity_type_name = $name;
		$type->activity_type_description = $description;
		$type->update();
		
		return $id;
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