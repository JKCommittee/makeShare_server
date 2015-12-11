<?php
include_once dirname(__FILE__)."/Mysql.php";
class User {
	private $pdo;
	
	function __construct() {
		$this->pdo = Mysql::connect();
	}
	
	public function getProfile($id) {
		$query = "SELECT * FROM user WHERE id = $id";
		return $this->pdo->query($query)->fetch(PDO::FETCH_ASSOC);
	}
	
	public function getRelation($id) {
		$follow = "SELECT * FROM user_relation INNER JOIN user ON user_relation.relation_id = user.id WHERE user_relation.user_id = $id";
		$follower = "SELECT * FROM user_relation INNER JOIN user ON user_relation.user_id = user.id WHERE user_relation.relation_id = $id";
		return array(
			'follows' => $this->pdo->query($follow)->fetchAll(PDO::FETCH_ASSOC),
			'followers' => $this->pdo->query($follower)->fetchAll(PDO::FETCH_ASSOC)
		);
	}
}
