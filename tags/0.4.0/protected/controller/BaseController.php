<?php

/**
 * BaseController
 * Basic methods used into the project
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class BaseController extends DooController{
	
	/**
	 * Initialize the base url and globalurl
	 */
	public function __construct() {
		$this->_data['baseurl'] = Doo::conf()->APP_URL;
		$this->_data['globalurl'] = $this->_data['baseurl'].'global/';
	}
	
	/**
	 * Call one of html page
	 * @param unknown $page
	 */
	protected function renderView($page) {
		$this->render($page, $this->_data);
	}
}