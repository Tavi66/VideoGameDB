<!DOCTYPE HTML>

<?php
include_once('db-connect.php');
include_once('adminFunction.php');
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
</tr>
<table>
    Genre
    <th> Title </th>
    <th> Genre </th>
    <th> Region </th>
    <th> Platform </th>
   <th> Retailer </th>
<tr>
    <td>
        <select name='videoGameTitle'>
            <option value='NULL'> </option>
        <?php 
        $conn = db_connect();
        $sql = "SELECT * FROM videogame";
        $result = $conn->query($sql);
       if($result->num_rows > 0) {	
           while ($row = $result->fetch_assoc()) {
               $title = $row["Title"];
               echo "<option value='$title'> $title </option>";
           }
       }
        ?>
        </select>
</td>
<!-- GENRE -->
 <td> <select id="genre" name="genre">
			<option value="NULL"> </option>			
            <option value="Action"> Action </option>
            <option value="Action-Adventure"> Action-Adventure </option>
            <option value="Adventure"> Adventure </option>
            <option value="MMO"> MMO </option>
            <option value="Puzzle"> Puzzle </option>
            <option value="RPG"> RPG </option>
            <option value="Simulation"> Simulation </option>
            <option value="Sports"> Sports </option>
            <option value="Strategy"> Strategy </option>
            <!-- <option value="Other"> Other </option> -->
            
</select> </td> 
<!-- REGION -->
<td> 
<select id="Region" name="region">
			<option value="NULL"> </option>			
            <option value="AU"> Australasia </option>
            <option value="EU"> Europe </option>
            <option value="JP"> Japan </option>
            <option value="NA"> North America </option>
            <option value="WW"> World-Wide </option>
            <option value="Other"> Other </option>           
</select> </td>
<!-- PLATFORM -->
<td> 
<select id="Platform" name="platform">
			<option value="NULL"> </option>			
            <option value="3DS"> 3DS </option>
            <option value="Nintendo Switch"> Nintendo Switch </option>
            <option value="PC"> PC </option>
            <option value="PS3"> PS3 </option>
            <option value="PS4"> PS4 </option>
            <option value="Wii U"> Wii U </option>
            <option value="Xbox 360"> Xbox 360 </option>
            <option value="Xbox One"> Xbox One </option>
            <option value="Other"> Other </option>           
</select> 
</td>
<td> </td>
<td> <input type="submit" value ="Add" name="addVideoGameInfoButton"/> </td>
<tr>
    </table>
</form>
<!--  -->
</table>
<!-- ADMIN add users -->
<table class="fit-width padding-table modifyTable">
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
<form action = "adminFunction.php" method="post">
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
 <th> Standard User </th>
 <th> Administrator </th>
 </tr>";	
 //<th> Privilege </th>
 $count = 0;
 $totalStandardUser = countStandardUser();
 $totalAdminUser = countAdminUser();
while ($row = $result -> fetch_assoc())
{
    //display info.
     $userName = $row["username"];
     $privilegeTemp = $row["privilege"];
    echo "<tr class='tableRow'>";
     echo "<td> <input class='checkBox' type= 'checkbox' name='check[]' value='" . $userName . "'> </td>";
     echo "<td>". $row["name"] ."</td>";
     echo "<td> <input name='username[]' type='hidden' value='" . $userName . "'>". $userName ."</input> </td>";
     echo "<td>". $row["password"] ."</td>";
    //  echo "<td> <select name='privilege[]'>";		
    //  echo "<option ";
    //  if($privilegeTemp == '0') echo "selected";
    //  echo " value='0'> Standard User </option>";      
    //  echo "<option ";
    //  if($privilegeTemp == '1') echo "selected";
    //  echo " value='1'> Administrator </option> </select> </td>";      

     echo "<td> <input type='radio' id='standardPrivilegeBox' name='privilege[".$count."]' value='0'";
     if($privilegeTemp=='0') echo "checked='checked'";
     echo "/> </td> <td> <input type='radio' id='adminPrivilegeBox' name='privilege[".$count."]' value='1'";
     if($privilegeTemp=='1') echo "checked='checked'";
     echo "/> </td>";
     echo "<td>". $privilegeTemp . " name='privilege[".$count."]' </td>";
     
     echo "</tr>";
    $count+=1;

}     
     echo "<td></td> <td></td> <td></td> <td></td>";
     echo "<td> Standard Users: " . $totalStandardUser . "</td> <td> Administrators: " . $totalAdminUser . " </td>";

}
?> 
</table>
<input type="submit" value ="Delete" name="deleteUserButton" id='deleteButton'/>
<input type='submit' value='Update' name="adminUpdateUserButton" />

</form>
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
        echo "<tr class='tableRow' id='tableRow[]' onclick='highlightRow()'>";
        echo "<td> <input class='checkBox' type= 'checkbox' name='check[]' style='width: 50px;' value='" . $title . "'> </td>";
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
function hightlightRow()
{
   // var checkedVal = null;
    var boxes = document.getElementsByClassName("checkBox");
    var rows = document.getElementsByClassName("tableRow");
    alert("box checked!");
    for(var i =0; i < boxes.length; ++i)
    {
        if(boxes[i].checked)
        {   
            //checkedVal = boxes[i].value;
            rows[i].classList.add("highlight");
            rows[i].style.backgroundaColor = gray;
            break;

        } else
        //rows[i].style.backgroundColor = rgba(255, 255, 255, 0.75);
        rows[i].classList.remove("highlight");
    }
}
function privilegeDisplay(){
    var privilege = document.getElementsByName("privilege");
    for(var i =0; i < privilege.length; ++i)
    {
        if(privilege[i] == 1)
        alert("privilege is 1");
    }

}
</script>
</html>
