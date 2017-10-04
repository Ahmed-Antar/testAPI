<?php

class Api extends Controller{

    private $data = null;

    function __construct(){

    }

    public function index(){

        echo 'Welcome to test API<br>';
        echo '--------------------------<br>';
        echo '* get user *<br>';
        echo 'api/user/{id}<br>';
        echo '--------------------------<br>';
        echo '* get all users *<br>';
        echo 'api/users<br>';
        echo '--------------------------<br>';
        echo '* delete user *<br>';
        echo 'api/delete_user/{id}<br>';
        echo '--------------------------<br>';
        echo '* get all Tasks *<br>';
        echo 'api/tasks<br>';
        echo '--------------------------<br>';
        echo '* get all Task *<br>';
        echo 'api/task/{id}<br>';
        echo '--------------------------<br>';
        echo '* delete task *<br>';
        echo 'api/delete_task/{id}<br>';
    }

    public function user($data){

        if(isset($data[0])){
            $this->data = $this->model('services')->getUser($data[0]);
        }
        echo json_encode($this->data);

    }

    public function users(){

        $this->data = $this->model('services')->getUsers();
        echo json_encode($this->data);

    }

    public function delete_user($data){

        if(isset($data[0])){
            $this->model('services')->delete_user($data[0]);
        }else{
            return false;
        }

    }

    public function add_user(){

        if(isset($_POST)){
            $this->data['post'] = $_POST;
            $this->model('services')->add_user($this->data['post']);
        }

    }

    public function task($data){

        if(isset($data[0])){
            $this->data = $this->model('services')->getTask($data[0]);
        }
        echo json_encode($this->data);

    }

    public function tasks(){

        $this->data = $this->model('services')->getTasks();
        echo json_encode($this->data);

    }

    public function taskUser($data){

        if(isset($data[0])){
            $this->data = $this->model('services')->getTasksByUser($data[0]);
        }
        echo json_encode($this->data);

    }

    public function add_task(){

        if(isset($_POST)){
            $this->data['post'] = $_POST;
            $this->model('services')->add_task($this->data['post']);
        }

    }

    public function delete_task($data){

        if(isset($data[0])){
            $this->model('services')->delete_task($data[0]);
        }else{
            return false;
        }

    }

}