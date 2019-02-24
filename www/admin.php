<!DOCTYPE HTML>

<?php
include_once('db-connect.php');
session_start();
//uncomment db_create and table_create
//if no current videogamedb or videogame table exists respectively
//db_create();
//table_create();
$_SESSION["privilege"] = 1;
if(empty($_SESSION["privilege"]))
{
    echo "Access not allowed!";
    header("Location: index.php");
}
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
<?php 
if(isset($_SESSION["username"]))

{
    echo $_SESSION["username"] . " is logged in. <br> <br>"; 
    echo "Welcome, " . $_SESSION["name"] . "!";
    echo "
    <form action='login.php'  method='post'>
<input type='submit' name='logoutButton' value = 'LOGOUT'/>
</form> 
    ";
}
?>
<!-- INSERT video game row -->
<table id="addVideoGameTable" class="fit-width padding-table">
<form id="insertVideoGameRow" action="videogame.php" method="post">
        <!--  -->
        <tr>
 <th> Title </th>
 <th> Release Date </th>
 <th> Age Rating </th>
 <th> Price </th>
 <th> Series </th>
 <th> Cover Art </th> 
 <th></th>
 </tr>
 <td>   <input type="text" name="title"/> </td>
 <td> <input type="date" name="date"> </td>
 <td> <select id="gameAgeRating" name="rating">
			<option value="NULL"> </option>			
            <option value="Everyone"> Everyone </option>
			<option value="Everyone 10+"> Everyone 10+ </option>
			<option value="Teen"> Teen </option>
			<option value="Mature 17+"> Mature 17+ </option>
			<option value="Adults Only 18+"> Adults Only 18+ </option>
</select> </td> 
<td> <input type="number" name="price" step="0.01"> </td>
<td> <input type="text" name="series"/> </td> 
<td> <input type="text" name="linkToCoverArt" placeholder="Link"/></td> 
<td> <input type="submit" value ="Add" name="addVideoGameButton"/> </td>
</form>
<!--  -->
</table>
<!-- ADMIN add users -->
<table class="fit-width padding-table">
<tr>
<th> Name </th>
 <th> Username </th>
 <th> Password </th>
 <th> Standard User </th>
  <th> Administrator </th>
 </tr>
<form id ="insertUserRow" action="adminFunction.php" method="post">
<td> <input type="text" name="name" placeholder="name"/> </td>
<td> <input type="text" name="username" placeholder="username"/> </td>
<td> <input type="password" name="password" placeholder="password"/> </td>
<td> <input type="radio" id="standardPrivilegeBox" name="adminCheck" value="0"/> </td>
<td> <input type="radio" id="adminPrivilegeBox" name="adminCheck" value="1"/> </td>
</td>
<td> <input type="submit" value ="Add" name="adminRegisterButton"/> </td>
</form>
</table>
<!-- CONNECT to VIDEOGAMEDB-->
<table class="fit-width" id='userTable'>
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
// $sql = "DELETE FROM user WHERE username='user'";
// $result = mysqli_query($conn,$sql);
//  if($result) {
//      //echo "New entry created successfully!<br>";
//  } else {
//      echo "Error: " . $sql . "<br>" . $conn->error;
//  }
//SELECT
///////////////////////////////////////
$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
if($result -> num_rows > 0)
{
 echo "Users <br>";
 echo "
 <tr>
 <th></th>
 <th> Name </th>
 <th> Username </th>
 <th> Password </th>
 <th> Privilege </th>
 </tr>";	
while ($row = $result -> fetch_assoc())
{
    //display info.
     $userName = $row["username"];
    echo "<tr>";
     echo "<td> <input class='checkBox' type= 'checkbox' name='check[]' value='" . $userName . "'> </td>";
     echo "<td>". $row["name"] ."</td>";
     echo "<td>". $userName ."</td>";
     echo "<td>". $row["password"] ."</td>";
     echo "<td>". $row["privilege"] ."</td>";
     echo "</tr>";

}     
     echo "";
}
?> </table>
<form action="videogame.php" method="post">
<table class="fit-width padding-table modifyTable" id="videoGameTable">
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
    <th></th>
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
        $title = $row["Title"];
        $rating = $row["Rating"];
        echo "<tr>";
        echo "<td> <input class='checkBox' type= 'checkbox' name='check[]' value='" . $title . "'> </td>";
        // echo "<td> <img style='width: 90px; height: 120px; float:left; padding-right: 5px;' src='" . $row["LinkToCoverImage"] . "' alt='cover'> </td>";
        // echo "<td>" . $row["ReleaseDate"] . "<i class='material-icons'>edit</i>" "</td>"; 
        // echo "<td>" . $title . "</td>";
        // echo "<td>" . $row["Rating"] . "</td>";        
        // echo "<td> $" . $row["Price"] . "</td>";
        // echo "<td>" . $row["Series"] . "</td>";

        //need to switch this to edit button for each
        echo "<td> <input type='text' name='link[]' value='" . $row["LinkToCoverImage"] . "'> </td>";
        echo "<td> <input type='date' name='date[]' value='" . $row["ReleaseDate"] . "'> </td>"; 
        echo "<td> <input type='text' name='title[]' value='" . $title . "'> </td>";
        echo "<td> <select name='rating[]'>";
        echo"<option "; 
        if($rating == 'NULL') echo "selected";
        echo " value='NULL'> </option>";			
        echo "<option ";
        if($rating == 'Everyone') echo "selected";
        echo " value='Everyone'> Everyone </option>";
        echo "<option ";
        if($rating == 'Everyone 10+') echo "selected";
        echo " value='Everyone 10+'> Everyone 10+ </option>";
        echo "<option ";
        if($rating == 'Teen') echo "selected";
        echo " value='Teen'> Teen </option>";
        echo "<option ";
        if($rating == 'Mature 17+') echo "selected";
        echo " value='Mature 17+'> Mature 17+ </option>";
        echo "<option ";
        if($rating == 'Adults Only 18+') echo "selected";
        echo " value='Adults Only 18+'> Adults Only 18+ </option> </select> </td>";      
        echo "<td> <input type='number' step='0.01' name='price[]' value=" . $row["Price"] . "> </td>";
        echo "<td> <input type='text' name='series[]' value='" . $row["Series"] . "'> </td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}     $conn -> close();

}
?>
</table>
<input type='submit' value='Delete' name='deleteVideoGameButton' id='deleteButton'/>
<!-- <input type='submit' value='Edit' name='editVideoGameButton' id='deleteButton'/> -->
<input type='submit' value='Update' name='updateVideoGameButton' id='deleteButton'/>

</form>
<br>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
