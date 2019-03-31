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
<form action ="test.php" method="post">
<select name="videoGameTitle">
            <option value="NULL"> </option>
        <?php 
        $conn = db_connect();
        $sql = "SELECT * FROM videogame";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0) {	
           while ($row = $result->fetch_assoc()) {
               $title = $row["Title"];
               echo "<option value='$title'> $title </option>";
           }
       }
        ?>
        </select>

<select name= "username">
Username: <option value="NULL"> </option>
<?php
        $conn = db_connect();
        $sql = "SELECT * FROM user";
        $result = mysqli_query($conn,$sql);
        if($result->num_rows > 0) {	
           while ($row = $result->fetch_assoc()) {
               $username = $row["username"];
               echo "<option value='$username'> $username </option>";
           }
       }
?>
</select>
<input type="date" name="dateReviewed">
<select name="rating">
<?php
for ($i = 0; $i < 11; $i++)
echo "<option value='$i'> $i </option>";
?>
</select>
<textarea rows="4" cols="50" name="review"> </textarea>
<input type="submit" value ="Add" name="TESTaddReviewButton"/> 
</form>
<!-- CONNECT to VIDEOGAMEDB-->
<table  class="fit-width padding-table" id="videoGameTable">
<?php
{
 $conn = db_connect();
 $sql = "SELECT * FROM videogame";
 $result = $conn->query($sql);
if($result->num_rows > 0) {
    //display data per row
    echo "Video Games <br>";
    echo "
    <tr>
    <th> Cover Art </th>
    <th> Release Date </th>
    <th> Title </th>
    <th> Rating </th>
    <th> Price </th>
    <th> Series </th>
    </tr>";	
    while ($row = $result->fetch_assoc()) {
        //display cover art if any, else display blank cover
        // echo "<img style='width: 90px; height: 120px; float:left; padding-right: 5px;' src='" . $row["LinkToCoverImage"] . "' alt='cover'> <br>";
        // echo "Release Date: " . $row["ReleaseDate"] . "<br>" 
        // . "Title: " . $row["Title"] . "<br>"
        // . "Price: $" . $row["Price"] . "<br>"
        // . "Series: " . $row["Series"] . "<br> <br>";
        echo "<tr>";
        echo "<td> <img style='width: 90px; height: 120px; float:left; padding-right: 5px;' src='" . $row["LinkToCoverImage"] . "' alt='cover'> </td>";
        echo "<td>" . $row["ReleaseDate"] . "</td>"; 
        echo "<td>" . $row["Title"] . "</td>";
        echo "<td>" . $row["Rating"] . "</td>";        
        echo "<td> $" . $row["Price"] . "</td>";
        echo "<td>" . $row["Series"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}     $conn -> close();

}
?>
</table>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
