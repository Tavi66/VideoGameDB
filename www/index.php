<!DOCTYPE HTML>

<?php
include_once('db-connect.php');
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
<!-- include - once php files -->
<!-- CONNECT to VIDEOGAMEDB-->
<?php
 $conn = db_connect();
 //INSERT, DELETE, UPDATE MANUALLY ADDED (TESTING)
// $sql = "DELETE FROM videogame WHERE Title='Persona 5'";
//   $sql = "INSERT INTO videogame (Title,ReleaseDate,Rating,Price,Series)
//    VALUES ('Persona 5', '2016-09-15', 'M',59.99,'Persona')";
//   $sql = "INSERT INTO videogame (Title,ReleaseDate,Price,Series)
//  VALUES ('The Liar Princess and the Blind Prince', '2019-02-12',39.99, 'N/A')";
   $sql = "INSERT INTO videogame (Title,ReleaseDate,Price,Series)
VALUES ('Super Smash Bros. Ultimate', '2018-12-07',59.99, 'Super Smash Bros.')";

// $sql = "UPDATE videogame
// SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg'
// WHERE Title = 'The Liar Princess and the Blind Prince'";

 $result = $conn->query($sql);
 if($result) {
     echo "New entry created successfully!<br>";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }

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
        . "Price: " . $row["Price"] . "<br>"
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
