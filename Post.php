<?php
include_once dirname(__FILE__)."/Mysql.php";
class Post {
	private $pdo;
	
	function __construct() {
		$this->pdo = Mysql::connect();
	}
	
	public function getPostList() {
		$query = "SELECT * FROM post INNER JOIN user ON post.user_id = user.id";
		return $this->pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function savePost($data, $files) {
		$time = time();
		$now = date('Y-m-d H:i:s', $time);
		$fileName = array();
		$i = 1;
		foreach ($files as $file) {
			$fileName[] = "img/" . $time . "_" . $data['user_id'] . "_" . $i;
			move_uploaded_file($file['tmp_name'], $fileName);
			chmod($fileName, 0755);
		}
		$file = json_encode($fileName);
		
		$query = "INSERT INTO post (`content`, `image_url`, `post_time`, `user_id`) VALUES ('{$data['content']}','$file','$now',{$data['user_id']})";
		return $this->pdo->query($query);
	}
	
}
