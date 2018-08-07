<?php

class Vod{
    public $timeInSecond;
    public $authorLogin;
    public $title;
    public $tags;
    public $audioFilePath;
    public $idVod;
    	// database connection and table name
    private $conn;
    private $table_name = "VOD";
	
	// constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    function create(){
       
        $query = "INSERT INTO " . $this->table_name . " "
                . "SET timeInSeconds=:timeSecond, loginAuthor=:loginAuthor, title=:title";

        $stmt = $this->conn->prepare($query);
        // sanitize Attrs like for user 

        if(!($this->timeInSecond && $this->authorLogin && $this->title)){
            return false;
        }

        $stmt->bindParam(":timeSecond", $this->timeInSecond);
        $stmt->bindParam(":loginAuthor", $this->authorLogin);
        $stmt->bindParam(":title", $this->title);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    
    function get(){}
    
    function delete(){}
    
    function update(){}
    
}

?>