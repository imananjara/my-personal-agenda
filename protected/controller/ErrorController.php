<?php
Doo::loadController('BaseController');
Doo::loadModel('User');
/**
 * ErrorController
 * Feel free to change this and customize your own error message
 *
 * @author imananjara <ivan.mananjara@gmail.com>
 * @author darkredz
 */
class ErrorController extends BaseController{
	
	/**
	 * Constructor for ErrorController class
	 */
	public function __construct() {
		parent::__construct();
	}

    public function index(){
    	
    	$this->renderView('error');
    }
	
}
?>