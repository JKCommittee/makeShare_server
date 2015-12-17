<?php
include_once dirname(__FILE__)."/User.php";

$userDao = new User();

if ($_GET['func'] === 'user') {
	$data = $_GET
	unset($data['func']);
	echo json_encode($userDao->getProfile($data['id']) + $userDao->getRelation($data['id']));
}