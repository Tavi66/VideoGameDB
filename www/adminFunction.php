<?php
require_once('db-connect.php');
    $conn = db_connect();
    //for standard user registration
if(isset($_POST['adminRegisterButton']))
{
    $user = $_POST['username'];
    $name = $_POST['name'];
    $pwd = $_POST['password'];
    $privilege = $_POST['adminCheck'];
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
}

if(isset($_POST['deleteUserButton']))
{
    $box = $_POST['check'];
    for($i=0; $i<count($box); $i++)
    {
        $username = $box[$i];
        $sql = "DELETE FROM user WHERE username='$username'";
        $result = mysqli_query($conn,$sql);
    }
   if($result)
    {
		echo "Record(s) deleted successfully.";
		header('Location: admin.php');
    }else{
        echo('alert(No record selected!)');
    }
}
if(isset($_POST['adminUpdateUserButton']))
{
    $box = $_POST['check'];
    $boxP = $_POST['privilege'];
    $count = 0;
    echo "Count of privileges: " . count($boxP) . "<br>";
    for($i=0; $i<count($box); $i++)
    {
        $username_EDITTING =$box[$i];
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn,$sql);
        while ($row = $result->fetch_assoc())
        {
            
            echo "<br> Beginning of loop \$count: " . $count . "<br>";
            $username = $row["username"];
            echo "<br> Username Editting: " . $username_EDITTING;
            echo "<br> Username: " . $username;
            if($username_EDITTING == $username)
            {
                echo "<br> Privilege (in DB): " . $row["privilege"];
                echo "<br> Privilege selected: " . $boxP[$count] . "<br>";    
                if($row["privilege"] != $boxP[$count])
                {
                    $sql = "UPDATE user SET privilege = $boxP[$count] WHERE username='$username_EDITTING'";
                    echo $sql . "<br>";
                    $count = 0;
                    $result = mysqli_query($conn,$sql);
                    if($result)
             {
                 echo "Record(s) updated successfully. <br>";
                 header('Location: admin.php');
             }else{
                 echo "Error: " . $sql . "<br>" . $conn->error;
                 //header('Location: localhost/admin.php?error=noCheckedEntries');

             }  
                }
                break; 
            } else {
                if($count < count($boxP))
                $count++;
                else $count = 0;
            }
            echo "<br> End of loop \$count: " . $count . "<br>";
    }
    }
}
$conn -> close();

function countStandardUser(){
    $conn = db_connect();
    $sql = "SELECT COUNT(*)
    FROM user WHERE user.privilege = 0";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_fetch_row($result);
    $conn->close();
    //echo "Standard Users: " . $count[0];
    return $count[0];
}
function countAdminUser(){
    $conn = db_connect();
    $sql = "SELECT COUNT(*)
    FROM user WHERE user.privilege = 1";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_fetch_row($result);
    $conn->close();
    //echo "Standard Users: " . $count[0];
    return $count[0];
}    

?>