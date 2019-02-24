<?php
require_once('db-connect.php');
$conn = db_connect();
if($conn -> connect_error)
{
   die("Connection failed:". $conn-> connect_error);
}
//Add video game entry
if(isset($_POST['addVideoGameButton']))
{
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
header('Location: admin.php');
} else{
    echo "Error: " . $sql . "<br>" . $conn->error;}
}
//Delete video game entry
if(isset($_POST['deleteVideoGameButton']))
{
    $box = $_POST['check'];
    for($i=0; $i<count($box); $i++)
    {
        $TITLE = $box[$i];
        $sql = "DELETE FROM videogame WHERE Title='$TITLE'";
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
//Update video game entry
if(isset($_POST['updateVideoGameButton']))
{
	$titleTemp = $_POST['title'];
	$dateTemp = $_POST['date'];
	$seriesTemp = $_POST['series'];
    $priceTemp = $_POST['price'];
    $ratingTemp = $_POST['rating'];
    $linkTemp = $_POST['link'];//insert link to cover image, if cover art link provided
	$box = $_POST['check'];
	echo "Number of boxes checked: " . count($box);
	echo "Number of titles: " . count($titleTemp);
		{	$counter = 0;
//for($n=0; $n<count($titleTemp); $n++)
for($i=0; $i<count($box); $i++)
{
	$TITLE_EDITTING = $box[$i];
	
	$sql = "SELECT * FROM videogame WHERE Title='$TITLE_EDITTING'";
	$result = mysqli_query($conn,$sql);
	while ($row = $result->fetch_assoc()) {
			$TITLE = $titleTemp[0];
		$title = $row["Title"];
		$index = 0;
		if($TITLE_EDITTING != $title)
		for($e = 1; $e<count($titleTemp); $e++)
		{
		$TITLE = $titleTemp[$e];
			if($TITLE_EDITTING == $title)
			{
				$index = $e;
				echo "TITLE_EDITTING: " . $TITLE_EDITTING;
				echo " TITLE: " . $TITLE;
				echo "<br> A MATCH. Exit loop...<br>";
				break;
			} else
			{			
				echo "TITLE_EDITTING: " . $TITLE_EDITTING;
				echo " TITLE: " . $TITLE;
				echo "<br> NOT A MATCH. Continue loop...<br>";
			}

		}	
		$RELEASEDATE = $dateTemp[$index]; 
		$SERIES = $seriesTemp[$index];
		$PRICE = $priceTemp[$index];
		$RATING = $ratingTemp[$index];
		$LINK = $linkTemp[$index];
		$rating = $row["Rating"];
		$releaseDate = $row["ReleaseDate"];
		$price = $row["Price"];
		$link = $row["LinkToCoverImage"];
		$series = $row["Series"];
		if($TITLE_EDITTING == $title)
		{
			$sql = "UPDATE videogame SET ";
if($title != $TITLE)
{
	$sql = $sql . " Title='$TITLE' ";
	$counter++;
}
if($rating != $RATING)
{
	if($counter > 0) $sql .= ",";
	$sql = $sql . " Rating='$RATING' ";
	$counter++;
}
if($releaseDate != $RELEASEDATE)
{
	if($counter > 0) $sql = $sql . ",";
	$sql = $sql . " ReleaseDate='$RELEASEDATE' ";
	$counter++;
}
if($price != $PRICE)
{
	if($counter > 0) $sql = $sql . ",";
	$sql = $sql . " Price=$PRICE ";
	$counter++;
}
if($series != $SERIES)
{
if($counter > 0) $sql = $sql . ",";
	$sql = $sql . " Series='$SERIES' ";
	$counter++;
}
if($link != $LINK)
{
	if($counter > 0) $sql = $sql . ",";
	$sql = $sql . " LinkToCoverImage='$LINK' ";
	$counter++;
} else
{

}
$sql .= " WHERE Title='$TITLE_EDITTING' ";
$result1 = mysqli_query($conn,$sql);	
if($result1){
	echo $sql . "<br>";
	echo "Record Updated Successfully. <br>"; 
}
else{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//  	 echo "<br>" . $sql . "<br>";
	$sql = ""; 
	$counter = 0;
} 
}
// {$sql = "UPDATE videogame SET ReleaseDate='$RELEASEDATE',Series='$SERIES',Price='$PRICE',Rating='$RATING',LinkToCoverImage='$LINK' WHERE Title='$TITLE_EDITTING'";
// echo "<br>" . $sql . "<br>";}
//     //Return to home index PHP
//header('Location: admin.php');
}

}
}
$conn -> close();
?>