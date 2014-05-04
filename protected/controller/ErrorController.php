<?php
Doo::loadController('BaseController');
/**
 * ErrorController
 * Feel free to change this and customize your own error message
 *
 * @author imananjara <ivan.mananjara@gmail.com>
 * @author darkredz
 */
class ErrorController extends BaseController{

    public function index(){
    	
    	if (!isset($_SESSION["mpa_user_id"]) || !isset($_SESSION["mpa_user_login"]))
    	{
    		return $this->_data['baseurl'] .'login';
    	}
    	
    	$this->_data["session_id"] = $_SESSION["mpa_user_id"];
    	$this->_data["session_login"] = $_SESSION["mpa_user_login"];
    	
    	if (isset($_SESSION["mpa_user_is_admin"]) && $_SESSION["mpa_user_is_admin"]) {
    		$this->_data["display_access_admin_page_btn"] = 1;
    	}
    	
    	$this->renderView('error');
    }
	
}
?>