<!DOCTYPE HTML>

<?php
include_once('db-connect.php');
session_start();
//uncomment db_create and table_create
//if no current videogamedb or videogame table exists respectively
//db_create();
//table_create();
?>

<html>
<head>
<!-- -->
<title> Home </title>
<link href="index.css" rel="stylesheet"  type="text/css">
</head>
<!-- -->
<body>
<!-- BODY -->
<!-- NAVBAR -->

<br>
<!-- REGISTER form -->
<!-- <form action="login.php"  method="post">
<input type="submit" name="logoutButton" value = "LOGOUT"/>
</form>  -->
<?php 
if(isset($_SESSION["username"]))

{
    echo "WELCOME, " . $_SESSION["name"] . "!\n";
    echo $_SESSION["username"] . " is logged in.\n";
    echo "
    <form action='login.php'  method='post'>
<input type='submit' name='logoutButton' value = 'LOGOUT'/>
</form> 
    ";
}
?>
<!-- INSERT video game row -->
<form id="insertVideoGameRow" action="addVideoGameEntry.php" method="post">
	<h3> Add Video Game </h3>
	Title: <input type="text" name="title"/> <br>
    Release Date: <input type="date" name="date"> <br>
    Rating: <select id="gameAgeRating" name="rating">
			<option value="NULL"> </option>			
            <option value="Everyone"> Everyone </option>
			<option value="Everyone 10+"> Everyone 10+ </option>
			<option value="Teen"> Teen </option>
			<option value="Mature 17+"> Mature 17+ </option>
			<option value="Adults Only 18+"> Adults Only 18+ </option>
</select> <br> 
    Price: <input type="number" name="price" step="0.01"> <br>
	Series: <input type="text" name="series"/> <br> 
    Cover Art: <input type="text" name="linkToCoverArt" placeholder="Link"/><br> 
	<input type="submit" value ="Add" id="addButton"/>
	<br> <br>
</form>
<!-- CONNECT to VIDEOGAMEDB-->
<?php
 $conn = db_connect();
 //DELETE, UPDATE MANUALLY ADDED (TESTING)

 //$sql = "DELETE FROM videogame WHERE Title='Digimon World DS'";

 //  $sql = "UPDATE videogame
// SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg'
// WHERE Title = 'The Liar Princess and the Blind Prince'";
//  $sql = "UPDATE videogame
//  SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'
//  WHERE Title = 'Persona 5'";
// $sql = "INSERT INTO user (name,username,password, privilege)
// VALUES ('AAA','reyner','Beta', 0)";
//  $result = $conn->query($sql);
//  if($result) {
//      //echo "New entry created successfully!<br>";
//  } else {
//      echo "Error: " . $sql . "<br>" . $conn->error;
//  }
//SELECT
 $sql = "SELECT Title, ReleaseDate,Price,Series, LinkToCoverImage FROM videogame";
 $result = $conn->query($sql);
if($result->num_rows > 0) {
    //display data per row
    while ($row = $result->fetch_assoc()) {
        //display cover art if any, else display blank cover
        echo "<img style='width: 90px; height: 120px; float:left; padding-right: 5px;' src='" . $row["LinkToCoverImage"] . "' alt='cover'> <br>";
        echo "Release Date: " . $row["ReleaseDate"] . "<br>" 
        . "Title: " . $row["Title"] . "<br>"
        . "Price: $" . $row["Price"] . "<br>"
        . "Series: " . $row["Series"] . "<br> <br>";
    }
} else {
    echo "0 results";
}
 $conn -> close();
?>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
