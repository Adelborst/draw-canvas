<?php

define('BASEPATH', '/Users/apple/Documents/Mamp/htdocs/test/draw');
require_once BASEPATH.'/app/draw.php';

class MyTest extends PHPUnit_Framework_TestCase
{

	public function test1()
	{
		$draw = new Draw();

		//$draw->imgList();
	}

	public function test2()
	{
		
	}

}