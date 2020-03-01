<?php namespace Config;

define( "APPPATH",FCPATH . "../app/");

class Paths
{
	
	public $systemDirectory = FCPATH . '../system';

	
	public $appDirectory = FCPATH;

	
	public $writableDirectory = FCPATH . 'writable';

	
	public $testsDirectory = FCPATH . 'tests';

	public $viewDirectory = FCPATH . 'templates';
}
