<?php
Doo::loadModel('base/NoteBase');

class Note extends NoteBase{
	
	/**
	 * Get a note with its id
	 * @param $idNote
	 */
	public static function _getNote($idNote) {
		
		$options = array(
				'asArray' => true,
				'limit' => 1
		);
		
		$note = new Note();
		$note->note_id = $idNote;
		
		$note = $note->find($options);
		
		if(empty($note)) return null;
		
		$note["title"] = stripslashes(htmlspecialchars($note["title"], ENT_QUOTES));
			
		return $note;
	}
	
	/**
	 * Insert notes into database
	 * @param $title
	 * @param $content
	 */
	public static function _addNote($title, $content) {
		
		$note = new Note();
		$note->title = $title;
		$note->full_content = $content;
		$note->user_id = $_SESSION["mpa_user_id"];
		
		$note->insert();
	}
	
	/**
	 * Edit a note
	 * @param $id
	 * @param $title
	 * @param $content
	 */
	public static function _updateNote($id, $title, $content) {
		
		$options['limit'] = 1;
		
		$note = new Note();
		$note->note_id = $id;
		
		$note = $note->find($options);
		
		$note->title = $title;
		$note->full_content = $content;
		
		$note->update();
		
	}
	
	/**
	 * Delete a note
	 * @param $idNote
	 */
	public static function _deleteNote($idNote) {
		
		$note = new Note();
		$note->note_id = $idNote;
		$note->delete();
	}
	
	/**
	 * Get all application's notes
	 */
	public static function _getNotes() {
		
		$option = array(
				'asArray' 	=> true,
				'where' => 'user_id=' .$_SESSION["mpa_user_id"]
		);
		
		$notes = new Note();
		$notes = $notes->find($option);
			
		if(empty($notes)) return null;
		
		//End line managment
		foreach ($notes as &$note) {
			$note["full_content"] = nl2br(htmlentities($note["full_content"]));
		}
		
		return $notes;
	}
}