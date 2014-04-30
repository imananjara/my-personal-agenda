<?php

/**
 * TestController
 * Used for testing application's functions
 * @author imananjara <ivan.mananjara@gmail.com>
 */
class TestController extends DooController{
	
	public function simpleTest(){
		echo var_dump($_SESSION["test"]);
	}
	
}