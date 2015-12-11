<?php
include_once dirname(__FILE__)."/User.php";

$userDao = new User();

if ($_POST['func'] === 'user') {
	$data = $_POST;
	unset($data['func']);
	echo json_encode($userDao->getProfile($data['id']) + $userDao->getRelation($data['id']));
}