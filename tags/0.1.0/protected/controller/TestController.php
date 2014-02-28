<?php
/**
 * Test controller
 */


class TestController extends DooController{
	
	public function simpleTest(){
		echo var_dump($_SESSION["test"]);
	}
	
}