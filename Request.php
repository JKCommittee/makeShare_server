<?php
include_once dirname(__FILE__)."/Mysql.php";
class Request {
	private $pdo;
	
	function __construct() {
		$this->pdo = Mysql::connect();
	}
	
	public function saveRequest($data) {
		$query = "INSERT INTO `request`(`comment`, `post_id`, `send_user`, `receive_user`) VALUES ('{$data['comment']}',{$data['post_id']}, {$data['send_user']}, {$data['receive_user']})";
		return $this->pdo->query($query);
	}
}