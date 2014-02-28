<?php
Doo::loadModel('base/ActivityTypeBase');

class ActivityType extends ActivityTypeBase{
	
	/**
	 * Get all types of activity
	 * return $types : Activity Type List
	 */
	public static function _getActivityTypes() {
		
		$option = array(
				'asArray' 	=> true,
		);
		
		$types = new ActivityType();
		$types = $types->find($option);
		
		if(empty($types)) return null;
		
		return $types;
		
	}
}