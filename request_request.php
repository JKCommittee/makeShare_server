<?php
include_once dirname(__FILE__)."/Request.php";

$requestDao = new Request();

if ($_POST['func'] === 'request') {
	$data = $_POST;
	unset($data['func']);
	echo json_encode(array('result' => $requestDao->saveRequest($data)));
}