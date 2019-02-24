<?php
require_once('db-connect.php');
    //for standard user registration
if(isset($_POST['adminRegisterButton']))
{
    $user = $_POST['username'];
    $name = $_POST['name'];
    $pwd = $_POST['password'];
    $privilege = $_POST['adminCheck'];
    $conn = db_connect();
    //(name,username,password, privilege)
    if($privilege == 1)
    {
        $sql = "INSERT INTO user
    VALUES ('$name','$user','$pwd','$privilege')";
    }
    else
    {$sql = "INSERT INTO user (name,username,password)
    VALUES ('$name','$user','$pwd')";}
    //$result = mysqli_query($conn,$sql);
    if(mysqli_query($conn, $sql)){
        // Set session variables
        echo "User created successfully!\n";
        echo $user . " created with privilege: " . $privilege;
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn -> close();
}
?>