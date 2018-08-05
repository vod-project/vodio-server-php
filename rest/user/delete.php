<?php 
	include '../../database.php';
	include '../../classes/user.php';
	
	$database = new Database();
	$db = $database->getConnection();
	
	$user = new User($db);
	// get posted data
	$user->login = $_GET['login'];
        
        $result = "";
        if($user->delete()){
            $result = 0;
        }else{
            $result = 1;
        }
        
        $response_arr = array(
            "result" => $result
        );
        
        print_r(json_encore($response_arr));
        
?>
