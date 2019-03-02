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
    foreach($box as $box_num => $box_val)
    for($i=0; $i<count($box); $i++)
    {
        $username_EDITTING =$box[$i];
        $sql = "SELECT * FROM user WHERE username='$username_EDITTING'";
        $result = mysqli_query($conn,$sql);
        while ($row = $result->fetch_assoc())
        {
            $privilege_EDITTING =$row['privilege'];
                foreach($boxP as $option_num => $option_val)
                {
                    $username = $box_val;
                    echo $option_num." ".$option_val."<br>";
                    //if checkbox is clicked, the privilege for
                    //selected user will be switched.
                    //standard user will gain admin privileges
                    //admin user loses admin privileges
                    if($username_EDITTING == $username)
                    $privilege =$option_val;

            if((isset($box[$box_num]) && $privilege_EDITTING != $privilege))
            {
                    //$privilege = $option_val;
            echo "<br> Privilege in DB: " . $privilege_EDITTING;
            echo "<br> Privilege selected: " . $privilege;
             echo "<br> privileges don't match. Updating...";
             $sql = "UPDATE user SET privilege=";
             $sql .= $privilege; 
             $sql .= " WHERE username='$username_EDITTING'";
             $result1 = mysqli_query($conn,$sql);
             if($result1)
             {
                 echo "Record(s) updated successfully. <br>";
                 header('Location: admin.php');
             }else{
                 echo "Error: " . $sql . "<br>" . $conn->error;
                 header('Location: localhost/admin.php?error=noCheckedEntries');

             }            //    echo "<br> A MATCH. Exit loop...<br>";
				//break;
            } 
            else
			{			
				echo "<br> NOT A MATCH. Continue loop...<br>";
			}
        }
        // if($privilege_EDITTING != $privilege)
        // {
        //     echo "<br> Privilege in DB: " . $privilege_EDITTING;
        //     echo "<br> Privilege selected: " . $privilege;
        //     //if($privilege_EDITTING==1) $privilege = 0;
        //     //else if($privilege_EDITTING==0) $privilege = 1;

        // } else {
        //     echo "<br> Privilege in DB: " . $privilege_EDITTING;
        //     echo "<br> Privilege selected: " . $privilege;
        //     echo "<br> privileges match. Continuing...";
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