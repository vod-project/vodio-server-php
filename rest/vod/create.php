<?php
    include '../../database.php';
    include '../../classes/vod.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $vod = new Vod($db);
    
    //get posted data 
    $vod->timeInSecond=$_GET['timeInSecond'];
    $vod->authorLogin=$_GET['authorLogin'];
    $vod->title=$_GET['title'];
        
    $result = "";
    if($vod->create()){
        $result = 0;
    }else{
        $result = 1;
    }
    
    $response_arr = array(
        "result" => $result
    );
	
    print_r(json_encode($response_arr));

?>