<?php

class Home extends Controller{

	private $data;

	function __construct(){
		
	}

	public function index(){

        $this->view([
            '/layout/head',
            '/layout/header',
            '/index',
            '/layout/footer'], $this->data);

	}

	public function taskByUser($data = null){

	    if(isset($data[0])){

	        $this->data = $this->model('services')->getUser($data[0]);

	    }

	    if($this->data == null){
	        header('location:'.BASE.'/');
        }

        $this->view([
            '/layout/head',
            '/layout/header',
            '/taskByUser',
            '/layout/footer'], $this->data);

    }

}