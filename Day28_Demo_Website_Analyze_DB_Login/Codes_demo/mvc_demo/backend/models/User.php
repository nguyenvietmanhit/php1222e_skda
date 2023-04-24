<?php
//models/User.php
require_once 'models/Model.php';
class User extends Model {

	public function registerUser($username, $password_hash) {
		// B1:
		$sql_insert = "INSERT INTO users(username,password)
        VALUES(:username,:password)";
		// B2:
		$obj_insert = $this->connection->prepare($sql_insert);
		// B3:
		$inserts = [
			':username' => $username,
			':password' => $password_hash
		];
		// B4:
		return $obj_insert->execute($inserts);
	}
}
