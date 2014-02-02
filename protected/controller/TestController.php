<?php
/**
 * Test controller
 */


class TestController extends DooController{
	
	public function simpleTest(){
		echo $_SESSION["test"];
	}
	
}