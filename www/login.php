<?php
require_once('db-connect.php');
session_start();
if(isset($_POST['logoutButton']))
{
    //session_unset();
    session_destroy();
    echo("User logged out.");
    header("location: index.php");
    //exit();
}

if(isset($_POST['loginButton']))
{
    $user = $_POST["username"];
    $pwd = $_POST["password"];
    $conn = db_connect();
    $sql = "SELECT * FROM user WHERE username = '" . $user. "' AND password = '" . $pwd. "';";
    //$result = mysqli_query($conn,$sql);
    if(mysqli_query($conn, $sql)){
        //session_register($user);
        //$_SESSION['login_user'] = $user;
        // Set session variables
        echo "Login success!\n";
        echo $user . " is logged in.";
        $sql = "SELECT username,name,privilege FROM user WHERE username = '" . $user. "';";
        $result = $conn->query($sql);
    
            while ($row = $result->fetch_assoc()) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["name"] = $row["name"];
                $_SESSION["privilege"] = $row["privilege"];
            }
        
        
        //admin user
        echo $_SESSION["privilege"];

        switch($_SESSION["privilege"])
        {
            //standard user
            case 0: //header("location: home.php");
            break;
            case 1: header("location: home.php");
        }
        
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
}
?>