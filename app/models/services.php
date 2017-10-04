<?php

class Services extends Model{

	public function getUser($id){

	    $this->table = 'user';
	    return $this->findFirst(['conditions' => ['id' => $id]]);

    }

    public function getUsers(){

	    $this->table = 'user';
	    return $this->find([]);

    }

    public function delete_user($id){

        $this->deleteById('user', $id);

    }

    public function add_user($data){
        $this->insertedb('user', $data,false);
    }

    public function getTask($id){

        $this->table = 'task';
        return $this->findFirst(['conditions' => ['id' => $id]]);

    }

    public function getTasks(){

        $this->table = 'task';
        return $this->find([]);

    }

    public function getTasksByUser($id){

        $this->table = 'task';
        return $this->find(['conditions' => ['id_user' => $id]]);

    }

    public function delete_task($id){

        $this->deleteById('task', $id);

    }

    public function add_task($data){
        $this->insertedb('task', $data,false);
    }
}