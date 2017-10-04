<?php


class Model{

	/**
	* @var array Array of saved databases for reusing
	*/
	static $instances = array();

	public $table = null;

	protected $db;

	public function __construct(){

		//connect to PDO here.
		$config = Config::$database;
		// Group information
		$type = $config['type'];
		$host = $config['host'];
		$name = $config['name'];
		$user = $config['user'];
		$pass = $config['pass'];

		// ID for database based on the group information
		$id = "$name.$user";

		if(isset(self::$instances[$id])){
			$this->db = self::$instances[$id];
			/*im connected*/
			return true;
		}

		try{
			// I've run into problem where
			// SET NAMES "UTF8" not working on some hostings.
			// Specifiying charset in DSN fixes the charset problem perfectly!
			$instance = new PDO("$type:host=$host;dbname=$name;charset=utf8", $user, $pass);
			$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING); 
			
			self::$instances[$id] = $instance;
			$this->db = self::$instances[$id];
		
		}catch(PDOException $e){
			if(Config::$debug >= 1){
				die($e->getMessage());
			}else{
				die('Impossible de se connecter a la base de donnée');
			}
		}

	}

	public function help($help){

		require_once 'app/helpers/' . $help . '.php';
		return new $help;
	
	}

	public function find($req){

		$sql = 'SELECT * FROM `'.$this->table.'` as '.get_class($this).'';

		// Construction de le condition
		if(isset($req['conditions'])){
			$sql .= ' WHERE ';
			if(!is_array($req['conditions'])){
				$sql .= $req['conditions'];
			}else{
				$cond = array();
				
				foreach ($req['conditions'] as $k => $v){
					if(!is_numeric($v)){
						$v = '"'.$v.'"';
					}
					$cond[] = "$k = $v";
				}
				
				$sql .= implode(' AND ',$cond);
			}
		}
		
		if(isset($req['condInArray'])){
			if(isset($req['conditions'])){
				$sql .=' AND ';
			}else{
				$sql .= ' WHERE ';
			}
			if(!is_array($req['condInArray'])){
				$sql .= $req['condInArray'];
			}else{
				$cond = array();
				
				foreach ($req['condInArray'] as $k => $v){
					$cond[] = "$k in ($v)";
				}
				
				$sql .= implode(' OR ',$cond);
			}
			
		}

		if(isset($req['like'])){
			if(isset($req['conditions'])){
				$sql .= 'name LIKE '.$req['like'];
			}else{
				$sql .= ' WHERE name LIKE "%'.$req['like'].'%"';
			}
		}

		if(isset($req['groupe'])){
			$sql .= ' GROUP BY '.$req['groupe'];
		}

		if(isset($req['order'])){
			$sql .= ' order by '.$req['order'];
		}
		if(isset($req['limit'])){
			$req['limit'] = $req['limit'] * 30;
			$sql .= ' LIMIT '.$req['limit'].', 30 ';
		}

		$pre = $this->db->prepare($sql);
		$pre->execute();
		return $pre->fetchAll(PDO::FETCH_OBJ);
		
		
	}

	public function findFirst($req){
		
		return current($this->find($req));
	
	}

	public function deleteById($table, $id){

	    $del = $this->db->prepare('DELETE FROM `'.$table.'` WHERE `id` = :id');
        $del->execute(array(
            'id' => $id
        ));

	}

	public function insertedb($table,$data,$location=true){
		
		$fieldNames = implode(',', array_keys($data));
		$fieldValues = ':'.implode(', :', array_keys($data));
		
		$sql = 'INSERT INTO `'.$table.'` ('.$fieldNames.') VALUES ('.$fieldValues.')';
		$add = $this->db->prepare($sql);
		$params = array();

		foreach ($data as $key => $value) {
			$params[$key]=$value;
		}
		try {
			$add->execute($params);
			if($location==true){
				header('location:'.$_SERVER['REQUEST_URI']);
			}
		} catch (Exception $e) {}
	
	}
	
}

?>