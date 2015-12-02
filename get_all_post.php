<?php
include_once dirname(__FILE__)."/Post.php";

$postDao = new Post();
echo json_encode($postDao->getPostList());