<?php
require_once('db-connect.php');
$conn = db_connect();
if($conn -> connect_error)
{
   die("Connection failed:". $conn-> connect_error);
}
//populate DB reviews and 
//for now can enter USER
if(isset($_POST['TESTaddReviewButton']))
{
    $user = $_POST['username'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];
    $title = $_POST['videoGameTitle'];    
    $dateCreated = $_POST['dateReviewed'];
    if($dateCreated == NULL)
    {
        $dateCreated = date("Y/m/d");
    }

    $sql = "INSERT INTO reviews VALUES ('$title','$rating','$review','$dateCreated','$user')";
    if(mysqli_query($conn, $sql)){
        echo "New record added successfully.";
        echo "<br>".$sql."<br>";
    } else{
        echo "Error: " . $sql . "<br>" . $conn->error;}
}
$conn -> close();

?>
