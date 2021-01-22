
<?php

class Database {

	public $conn;
	private $host = 'localhost';
	private $username = 'root';
	private $password = '';
	private $db = 'php';

	public function getConnection(){

		$this->conn = null;

		try{
			$this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->username, $this->password);			

		}catch(PDOException $e){
			echo "Connecton Failed: ".$e->getMessage();
		}

		return $this->conn;
	}

    //Create Data
	public function create($user_id, $user_pass, $email){
      
		$sql = "insert into users(user_id, user_pass, email) values('".$user_id."', '".$user_pass."', '".$email."')";
		$stmt = $this->conn->prepare($sql);
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}		

	}

	//Read Data
    public function read(){
    	$data = array();

      	$sql = 'select *from users';
    	$stmt = $this->conn->prepare($sql);
    	$stmt->execute();
    	while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    		$data[] = $result;
    	}
        
        return $data;
    }
    public function update(){

    }
    public function delete(){

    }
	
}
?>