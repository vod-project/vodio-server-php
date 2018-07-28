<?php 
	include '../../database.php';
	include '../../classes/user.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	$user = new User($db);
	
	$user->login = $_GET['login'];

	if(isset($_GET['password'])){
		$user->password = $_GET['password'];
	}
	
	$user->getData();
	
	// create array
	$user_arr = array(
    "login" =>  $user->login,
    "name" => $user->name,
    "surname" => $user->surname,
    "email" => $user->email
	);
	
	
	// make it json format
	print_r(json_encode($user_arr));
?>
