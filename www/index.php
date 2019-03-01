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
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="index.css" rel="stylesheet"  type="text/css">
</head>
<!-- -->
<body style="margin:10%;">
<!-- BODY -->
<!-- NAVBAR -->

<!-- LOGIN form --> <!-- login to modify personal lists-->
<div style="text-align: center;">
<form class ="centered" action="login.php" method="post">
<i class="material-icons">account_circle</i> <input type="text" id="loginTextBox" name="username" placeholder= "Username"/> <br>
<i class="material-icons">lock</i> <input type="password" id="loginTextBox" name="password" placeholder="Password"/> <br>
<input type="submit" value ="Login" id="loginButton" name="loginButton"/> <br>
</form>
</div>
<br>
<!-- Register form -->
<form id="registerForm" action="register.php" method="post">
<input type="text" name="username" placeholder="username"/> <br>
<input type="text" name="name" placeholder="name"/> <br>
<input type="password" name="pwd" placeholder="password"/> <br>
<button type="submit" name="register-submit">Register</button>
</form>
<br> 
<a href="home.php" style="color:black;"> Home page </a>


<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
