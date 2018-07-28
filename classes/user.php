<?php
class User{
	public $name;
	public $surname;
	public $login;
	public $email;
	public $password;
	public $provided;
	
	// database connection and table name
    private $conn;
    private $table_name = "USER";
	
	
	// constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    
    // create product
	function create(){
	 
		// query to insert record
		$query = "INSERT INTO
		            " . $this->table_name . "
		        SET login=:login, password=:password, name=:name, surname=:surname,
		        	email=:email";
	 
		// prepare query
		$stmt = $this->conn->prepare($query);
	 
		// sanitize
		$this->login=htmlspecialchars(strip_tags($this->login));
		$this->password=htmlspecialchars(strip_tags($this->password));
		$this->name=htmlspecialchars(strip_tags($this->name));
		$this->surname=htmlspecialchars(strip_tags($this->surname));
		$this->email=htmlspecialchars(strip_tags($this->email));
	 
		// bind values
		$stmt->bindParam(":login", $this->login);
		$stmt->bindParam(":password", $this->password);
		$stmt->bindParam(":name", $this->name);
		$stmt->bindParam(":surname", $this->surname);
		$stmt->bindParam(":email", $this->email);
	 
		// execute query
		if($stmt->execute()){
		    return true;
		}
	 
		return false;
		 
	}
	
	// get by login
	function getData(){
		// query to read single record
    $query = "SELECT
                login,password,name,surname,email
            FROM
                " . $this->table_name . " 
            WHERE
                login = ?";
 	if(isset($this->password)){
 		$query = $query . " AND password = ?";
 	}
 	
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->login);

    if(isset($this->password)){
 		$stmt->bindParam(2, $this->password);
 	}
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->name = $row['name'];
    $this->surname = $row['surname'];
    $this->email = $row['email'];
    $this->password = $row['password'];
    $this->login = $row['login'];
	}
}
?>