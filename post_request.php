<?php
include_once dirname(__FILE__)."/Post.php";

$postDao = new Post();

if ($_POST['func'] === 'post') {
	$data = $_POST;
	unset($data['func']);
	$data['file'] = $_FILES['file'];
	echo json_encode(array('result' => $postDao->savePost($data)));
}

