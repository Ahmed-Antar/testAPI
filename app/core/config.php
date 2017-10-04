<?php



class Config{

	static $debug = 1;
	//Data base information!
	static $database = array(
		'type' => 'mysql',
		'host' => 'localhost',	
		'name' => 'testapi',
		'user' => 'root',
		'pass' => ''
		);
	
	//set a default language
	public static $language = 'fr';
	//optionall create a constant for the name of the site
	public static $siteTitle = 'TEST API';
	//web admin name
	public static $webAdmin = '';
	//web admin url
	public static $webAdminURL = '';
	//prefix
	public static $prefix = '';
	//Models 
	public static $models = '';


	public function __construct(){
		
	}

}