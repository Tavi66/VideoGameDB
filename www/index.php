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
<body style="margin:10%;">
<!-- BODY -->
<!-- NAVBAR -->

<!-- LOGIN form --> <!-- login to modify personal lists-->
<div style="text-align: center;">
<form class ="centered" action="login.php" method="post">
<input type="text" id="loginTextBox" name="username" placeholder="username"/> <br>
<input type="password" id="loginTextBox" name="password" placeholder="password"/> <br>
<input type="submit" value ="Login" name="loginButton"/> <br>

<input type="submit" value ="Register" name="registerStandardUserButton"/>
</form>
</div>
<br>
<a href="home.php" style="color:black;"> Home page </a>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
