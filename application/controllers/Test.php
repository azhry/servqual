<?php 

class Test extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$hp 		= '08893952737';
		$text 		= 'Test gammu service with PHP';
		$basecmd 	= FCPATH . 'gammu/gammu -c ' . FCPATH . 'gammu/gammurc '; 
		var_dump(exec($basecmd . '--identify'));
		var_dump(exec($basecmd . 'sendsms TEXT ' . $hp . ' -text "' . $text . '"'));
	}
}