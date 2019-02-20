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

<!-- LOGIN form --> <!-- login to modify personal lists-->
<form id ="loginForm" action="login.php" method="post">
<input type="text" name="username" placeholder="username"/> <br>
<input type="password" name="password" placeholder="password"/> <br>
<!-- <input type="submit" value ="Register" name="registerButton"/> -->
<input type="submit" value ="Login" name="loginButton"/>
</form>
<br>
<!-- END OF BODY -->
</body>
<!-- SCRIPT -->
<script>

</script>
</html>
