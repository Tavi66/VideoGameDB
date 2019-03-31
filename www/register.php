<?php
require_once('db-connect.php');
session_start();
    //for standard user registration
if(isset($_POST['register-submit']))
{
	$name = $_POST['name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    
	/*
	Error handlers for dealing
	dealing with empty inputs
	or invalid cases
	*/
	
	//check if the fields are empty it will take back to the page
	if(empty($name) || empty($username)|| empty($password))
	{
		header("Location:http://localhost/VideoGameDB-master/www/standardRegisterUser.php?error=emptyfields&username=".$username."&name=".$name);
		exit();
	}
	
	//check if username is invalid
/* 	else if (!filter_var(!preg_match("/^[a-zA-Z0-9]*$/",$uername))){
		header("Location:http://localhost/local%20VideoGameDB/VideoGameDB/www/index.php?error=invalidusername=".$username."&name=".$name);
		exit();
	}
	 */
	//Search pattern to check for invalid username
	else if(!preg_match("/^[a-zA-Z0-9]*$/",$uername)){
//		header("Location:http://localhost/local%20VideoGameDB/VideoGameDB/www/index.php?error=invalidusername=".$username);
		header("Location:http://localhost/index.php?error=invalidusername=".$username);
		exit();
	}
	
		//sql server check and statement to initialize
	else{
 		$sql= "SELECT * FROM user WHERE name=? ,username=?, password=?";
		$stmt= mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
		header("Location:http://localhost/VideoGameDB-master/www/standardRegisterUser.php?error=sqlerror");
		header("Location:http://localhost/standardRegisterUser.php?error=sqlerror");
		exit();
		}
	
	//bind parameter that will grab the username and return if there is an existing username
	else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){ 
				//header("Location:http://localhost/VideoGameDB-master/www/standardRegisterUser.php?error=usertaken");
				header("Location:http://localhost/standardRegisterUser.php?error=usertaken");
				exit();
				}
		
		 //insert the username and password being put into register_users table
	else{	
		$sql= "INSERT INTO user(name,username,password) VALUES (?,?,?)";
		$stmt= mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt,$sql)){
				//header("Location:http://localhost/VideoGameDB-master/www/standardRegisterUser.php?error=sqlerror");
                header("Location:http://localhost/standardRegisterUser.php?error=sqlerror");				
                exit();
				}
					
			$hashPwd=password_hash($password, PASSWORD_DEFAULT);
			
			mysqli_stmt_bind_param($stmt, "ssss", $name, $username, $password, $hashPwd);
            mysqli_stmt_execute($stmt);
                /* $conn = db_connect();
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
} */
			//header("Location:http://localhost/VideoGameDB-master/www/standardRegisterUser.php?register=success");
			header("Location:http://localhost/standardRegisterUser.php?register=success");
		exit();
	}
	}
	}
}
?>	
	