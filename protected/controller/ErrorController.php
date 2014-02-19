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
    	
    	$this->_data["session_id"] = $_SESSION["mpa_user_id"];
    	$this->_data["session_login"] = $_SESSION["mpa_user_login"];
    	
    	$this->renderView('error');
    }
	
}
?>