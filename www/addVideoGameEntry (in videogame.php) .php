<?php
require_once('db-connect.php');
 $conn = db_connect();
 if($conn -> connect_error)
{
	die("Connection failed:". $conn-> connect_error);
}

$RELEASEDATE = $_POST['date'];
$TITLE = $_POST['title'];
$SERIES = $_POST['series'];
$PRICE = $_POST['price'];
$RATING = $_POST['rating'];
$LINK = $_POST['linkToCoverArt'];
//insert link to cover image, if cover art link provided
if(!empty($LINK))
$sql = "INSERT INTO videogame (Title,ReleaseDate,Price,Series, Rating, LinkToCoverImage)
VALUES ('$TITLE','$RELEASEDATE','$PRICE','$SERIES','$RATING','$LINK')";
else //   
$sql = "INSERT INTO videogame (Title,ReleaseDate,Price,Series, Rating)
VALUES ('$TITLE','$RELEASEDATE','$PRICE','$SERIES','$RATING')";

if(mysqli_query($conn, $sql)){
    echo "New record added successfully.";
    //Return to home index PHP
header('Location: index.php');
} else{
    echo "Error: " . $sql . "<br>" . $conn->error;}
$conn -> close();
?>