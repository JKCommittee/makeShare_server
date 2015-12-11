include_once dirname(__FILE__)."/Post.php";

$requestDao = new Request();

if ($_POST['func'] === 'request') {
	$data = $_POST;
	echo json_encode(array('result' => $requestDao->saveRequest($data,)));
}