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
<!-- BODY -->
<!-- NAVBAR -->

<!-- REGISTER form --> <!-- login to modify personal lists-->
<form id ="centered" action="register.php" method="post">
<input type="text" id="loginTextBox" name="name" placeholder="name"/> <br>
<input type="text" id="loginTextBox" name="username" placeholder="username"/> <br>
<input type="password" id="loginTextBox" name="password" placeholder="password"/> <br>
<input type="submit" value ="Register" name="standardRegisterButton"/>
</form>
<br>
<a href="home.php" style="color:black;"> Home page </a>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
