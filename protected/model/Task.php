<?php
Doo::loadModel('base/TaskBase');

class Task extends TaskBase{
	
	/**
	 * Get all tasks linked with the chosen activity
	 * @param $activity_id : The id of the chosen activity
	 * @return tasks
	 */
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
	
	/**
	 * Insert a task
	 * @param $taskInfos
	 * @return New inserted task id
	 */
	public static function _addTask($taskInfos) {
		
		$task = new Task();
		$task->activity_id = $taskInfos['activity_id'];
		$task->title = $taskInfos['task_title'];
		$task->percent_done = $taskInfos['task_percent_done'];
		
		return $task->insert();
	}
	
	/**
	 * Update a task and return its id
	 * @param $taskInfos
	 * @return task's id
	 */
	public static function _updateTask($taskInfos) {
		
		$options['limit'] = 1;
		
		$task = new Task();
		$task->task_id = $taskInfos["task_id"];
		$task = $task->find($options);
		
		if (isset($taskInfos['task_title'])) {
			$task->title = $taskInfos['task_title'];
		} else {
			$task->percent_done = $taskInfos['task_percent_done'];
		}
		
		$task->update();
		
		return $taskInfos["task_id"];
	}
}