<?php
require_once('db-connect.php');
session_start();
if(isset($_POST['registerStandardUserButton']))
{
    header("location: standardRegisterUser.php");
}

if(isset($_POST['logoutButton']))
{
    session_unset();
    session_destroy();
    echo("User logged out.");
    header("location: index.php");
    //exit();
}

if(isset($_POST['loginButton']))
{
    $user = $_POST['username'];
    $pwd = $_POST['password'];
    $conn = db_connect();
    if(empty($user) || empty($pwd))
    {
        echo "Invalid username or password.";
    }
    else
{
    $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pwd' ";
    //$result = mysqli_query($conn,$sql);
    if(mysqli_query($conn, $sql)){
        //session_register($user);
        //$_SESSION['login_user'] = $user;
        // Set session variables
        $sql = "SELECT username,name,privilege FROM user WHERE username = '$user'";
        $result = $conn->query($sql);
    
            while ($row = $result->fetch_assoc()) {
                if($user == $row["username"] && $pwd == $row["password"])
              {
                echo "Login success!";
                $_SESSION['username'] = $row["username"];
                $_SESSION['name'] = $row["name"];
                $_SESSION['privilege'] = $row["privilege"]; 
              }  else
              {
                  echo "Invalid username or password.";
                  //break;
              }
            }

            // echo $_SESSION['username']  . " is logged in.";
            // echo $_SESSION['name'];
            // echo $_SESSION['privilege'];

        // switch($_SESSION["privilege"])
        // {
        //     //standard user
        //     case 0: header("location: home.php");
        //     break;
        //     case 1: header("location: admin.php");
        //     break;
        // }
        
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
    $conn -> close();
}
?>