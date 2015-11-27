<?php
include_once dirname(__FILE__)."/Post.php";

$postDao = new Post();

if ($_POST['func'] === 'post') {
	$data = $_POST;
	unset($data['func']);
	$data['file'] = $_FILES['file'];
	echo json_encode(array('result' => $postDao->savePost($data)));
}

if ($_POST['func'] === 'answer') {
	$data = $_POST;
	unset($data['func']);
	echo json_encode(array('result' => $postDao->saveAnswer($data)));
}

if ($_POST['func'] === 'get_question') {
	echo json_encode($postDao->getPostList($_POST['event_id']));
}

if ($_POST['func'] === 'get_answer') {
	echo json_encode($postDao->getAnswerList(/*$_POST['post_id']*/1));
}