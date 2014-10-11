<?php
Doo::loadModel('Note');
Doo::loadModel('User');
Doo::loadController('BaseController');

/**
 * NoteController
 * Manage user's notes
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class NoteController extends BaseController{
	
	/**
	 * Constructor for NoteController class
	 */
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 * Get note edition page (to create or update note)
	 */
	public function getNoteEditionPage() {
		
		if (!User::_isConnected())
		{
			return $this->_data['baseurl'] .'login';
		}
		$this->_data['session'] = $_SESSION;
		
		if (isset($this->params["note_id"]))
		{
			$this->_data["note"] = Note::_getNote($this->params["note_id"]);
		}
		
		$this->renderView('note');
	}
	
	/**
	 * Create or update note
	 * @return the main page
	 */
	public function saveNote() {
		
		if (isset($_POST["idNote"])) {
			Note::_updateNote($_POST["idNote"], $_POST["noteTitle"], $_POST["noteContent"]);
		} else {
			Note::_addNote($_POST["noteTitle"], $_POST["noteContent"]);
		}
		
		return $this->_data["baseurl"];
	}
	
	/**
	 * Delete a note
	 * @return the main page
	 */
	public function deleteNote() {
		if (isset($this->params["note_id"]))
		{
			Note::_deleteNote($this->params["note_id"]);
		}
		return $this->_data["baseurl"];
	}
	
}