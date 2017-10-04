<?php

class Controller{
	
	function __construct(){
		
	}

	public function Model($model){

		require_once 'app/models/' . $model . '.php';
		return new $model();

 	}

	public function view($view = [], $data = []){

		foreach ($view as $key => $value) {
			if(file_exists ('app/views/' . $value . '.php')){
				require_once 'app/views/' . $value . '.php';
			}
		}

	}

}