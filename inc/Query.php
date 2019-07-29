<?php

namespace login_system_oop;
require_once "DB.php";

class Query extends DB{

	public function insert($table, $field){

		$sql  = "INSERT INTO ".$table;
		$sql .= " (".implode(",", array_keys($field)).") VALUES ";
		$sql .= "('".implode("','", array_values($field))."')";

		$query = mysqli_query($this->conn, $sql);

		if ($query) {
			return true;
		}
	}

	public function select($table, $where){
		
		foreach ($where as $key => $value) {
			$condition = $key. " = "."'".$value."'";
		}
		$sql = "SELECT * FROM ".$table." WHERE ".$condition; 
		$query = mysqli_query($this->conn, $sql);
		$row = mysqli_fetch_assoc($query);

		return $row;
	}

	public function update_pass($table, $field, $where){
		foreach ($field as $key => $value) {
			$condition = "`".$key."`". "="."'".$value."'";
		}

		foreach ($where as $key => $value) {
			$sql = "`".$key."`". "="."'".$value."'";
		}

		$sql   = "UPDATE ".$table." SET ".$condition." WHERE ".$sql;
		$query = mysqli_query($this->conn, $sql);

		return $query;
	}

	public function delete(){}
}

?>