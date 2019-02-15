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
 //INSERT, DELETE MANUALLY ADDED (TESTING)
// $sql = "DELETE FROM videogame WHERE Title='Persona 5'";
 $sql = "INSERT INTO videogame (Title,ReleaseDate,Rating,Price,Series)
  VALUES ('Persona 5', '2016-09-15', 'M',59.99,'Persona')";
$result = $conn->query($sql);
 if($result) {
     echo "New entry created successfully!<br>";
 } else {
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
//SELECT
 $sql = "SELECT Title, ReleaseDate,Price,Series FROM videogame";
 $result = $conn->query($sql);
if($result->num_rows > 0) {
    //display data per row
    while ($row = $result->fetch_assoc()) {
        echo "Release Date: " . $row["ReleaseDate"] . "<br>" 
        . "Title: " . $row["Title"] . "<br>"
        . "Price: " . $row["Price"] . "<br>"
        . "Series: " . $row["Series"] . "<br>";
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
