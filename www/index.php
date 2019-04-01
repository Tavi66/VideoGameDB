<!DOCTYPE HTML>

<?php
include_once('db-connect.php');
//uncomment db_create and table_create
//if no current videogamedb or videogame table exists respectively
//db_create();
//UPDATE: platform, region, and genre created (with primary key)
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
<!-- <input type="submit" value ="Register" name="registerStandardUserButton"/> -->
</form>
<br>
<!-- REGISTER form --> <!-- login to modify personal lists-->
<form id ="centered" action="register.php" method="post">
<input type="text" id="loginTextBox" name="name" placeholder="name"/> <br>
<input type="text" id="loginTextBox" name="username" placeholder="username"/> <br>
<input type="password" id="loginTextBox" name="password" placeholder="password"/> <br>
<input type="submit" value ="Register" id="loginButton" name="standardRegisterButton"/>
</form>
</div>
<br>
<!-- home.php = default -->
<a href="admin.php" style="color:black;"> Home page </a>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
