<?php
require_once('db-connect.php');
session_start();
    //for standard user registration
if(isset($_POST['register-submit']))
	require 'index.php';
{
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = $_POST['pwd'];
    
	/*An error handler for dealing
	  dealing with empty parameters
	  or invalid cases
	*/
	//check if the fields are empty it will take back to the page
	if(empty($username) || empty($name)|| empty($password)){
		header("Location:http://localhost/local%20VideoGameDB/VideoGameDB/www/index.php?error=emptyfields&username=".$username."&name=".$name);
		exit();
	}
	//filter variables that does not meet the requirements
	else if (!filter_var(!preg_match("/^[a-zA-Z0-9]*$/",$uername)){
		header("Location:http://localhost/local%20VideoGameDB/VideoGameDB/www/index.php?error=emptyusername=".$username."&name=".$name);
		exit();
	}
	//Search pattern to check for valid username
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$uername)) {
		header("Location:http://localhost/local%20VideoGameDB/VideoGameDB/www/index.php?error=username=".$username);
		exit();
	}
	//sql server check and statement to initialize
	else {
		$sql= "SELECT Username from users WHERE Username=?";
		$stmt= mysqli_stmt_init($conn);
		
		if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:http://localhost/local%20VideoGameDB/VideoGameDB/www/index.php?error=sqlerror");
		exit();
		}
	}
	
	
    $conn = db_connect();
    //(name,username,password, privilege)
    $sql = "INSERT INTO users
    VALUES ('$name','$user','$pwd')";
    //$result = mysqli_query($conn,$sql);
    if(mysqli_query($conn, $sql)){
        // Set session variables
        echo "User created successfully!\n";
        echo $user . " is logged in.";
        $sql = "SELECT username,name,privilege FROM user WHERE username = '" . $user. "';";
        $result = $conn->query($sql);
    
            while ($row = $result->fetch_assoc()) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["privilege"] = $row["privilege"];
            }     

        switch($_SESSION["privilege"])
        {
            //standard user
            case 0: header("location: home.php");
            break;
            case 1: header("location: admin.php");
        }
        
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
}
?>