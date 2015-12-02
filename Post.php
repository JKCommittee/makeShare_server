<?php
include_once dirname(__FILE__)."/Mysql.php";
class Post {
	private $pdo;
	
	function __construct() {
		$this->pdo = Mysql::connect();
	}
	
	public function getPostList() {
		$query = "SELECT * FROM post";
		return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function savePost($data) {
		$time = time();
		$now = date('Y-m-d H:i:s', $time);
		$fileName = "img/" . $time . "_" . $data['user_id'];
		
		move_uploaded_file($data['file']['tmp_name'], $fileName);
		chmod($fileName, 0755);
		$file = json_encode(array($fileName));
		
		$query = "INSERT INTO post (`content`, `image_url`, `post_time`, `user_id`) VALUES ('{$data['content']}','$file','$now',{$data['user_id']})";
		return $this->pdo->query($query);
	}
	
}
