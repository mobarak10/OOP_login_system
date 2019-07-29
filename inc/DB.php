<?php
namespace login_system_oop;

class DB {

	public $server_name = "localhost";
	public $user_name   = "root";
	public $password    = "";
	public $db_name     = "oop_login_system";
	public $conn;

	public function connect(){
		$this->conn = new \mysqli($this->server_name, $this->user_name, $this->password, $this->db_name);
	}
}


?>  


		