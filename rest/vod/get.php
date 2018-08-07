<?php

    include '../../database.php';
    include '../../classes/vod.php';
    $TABLE_NAME = "VOD";
    $database = new Database();
    $db = $database->getConnection();
    
    $query = "SELECT * FROM ".$TABLE_NAME;

    $stmt = $db->prepare($query);
    $result = $stmt->execute();
    $result_list=array();
    $i = 0;
    // get retrieved row
    foreach($db->query($query) as $row){
        $vod = new Vod($db);
        $vod->timeInSecond = $row['timeInSeconds'];
        $vod->authorLogin = $row['loginAuthor'];
        $vod->title = $row['title'];
        $vod->idVod = $row['idVod'];

        $result_list[$i] = $vod;
        $i = $i+1;
    }
    print_r(json_encode($result_list));
