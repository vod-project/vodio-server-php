<?php 
	include '../../database.php';
	include '../../classes/user.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	$user = new User($db);
	// get posted data
	$user->login = $_GET['login']; 
	$user->password = $_GET['password'];
	$user->name = $_GET['name'];
	$user->surname = $_GET['surname'];
	$user->email = $_GET['email'];
	
	$result = "";
	if($user->create()){
		$result = 0;
	}else{
		$result = 1;
	}
	
	$response_arr = array(
		"result" => $result
	);
	
	print_r(json_encode($response_arr));
 
?>
