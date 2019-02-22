<?php
require_once('db-connect.php');
session_start();
    //for standard user registration
if(isset($_POST['register-submit']))
{
    $user = $_POST['username'];
    $name = $_POST['name'];
    $pwd = $_POST['password'];
    
    $conn = db_connect();
    //(name,username,password, privilege)
    $sql = "INSERT INTO user
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