<?php
Doo::loadModel('base/TaskBase');

class Task extends TaskBase{
	
	public static function _getTasks($activity_id) {
		
		$option = array(
				'asArray' 	=> true
		);
		
		$task = new Task();
		$task->activity_id = $activity_id;
		$tasks = $task->find($option);
		
		if (empty($tasks)) return null;
		
		return $tasks;
	}
}