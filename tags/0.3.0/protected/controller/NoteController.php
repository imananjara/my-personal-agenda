<?php
Doo::loadModel('Note');
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
		
		if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
		{
			return $this->_data['baseurl'] .'login';
		}
		
		if (isset($this->params["note_id"]))
		{
			$this->_data["note"] = Note::_getNote($this->params["note_id"]);
		}
		
		$this->_data["session_id"] = $_SESSION["mpa_user_id"];
		$this->_data["session_login"] = $_SESSION["mpa_user_login"];
		
		if (isset($_SESSION["mpa_user_is_admin"]) && $_SESSION["mpa_user_is_admin"]) {
			$this->_data["display_access_admin_page_btn"] = 1;
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