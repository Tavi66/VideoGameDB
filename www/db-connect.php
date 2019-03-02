<?php
function db_create(){
$serverName = "localhost:3306";
$username = "root";
$password = "";

$conn = new mysqli($serverName, $username, $password);
if($conn -> connect_error)
{
	die("Connection failed:". $conn-> connect_error);
} 
#drop db
$sql = "DROP DATABASE videogamedb";
$result = mysqli_query($conn,$sql);
if($result){
	echo "Database dropped successfully!";
} else {
	echo "Error: " . $conn->error;
}
#create db
$sql = "CREATE DATABASE videogamedb";
$result = mysqli_query($conn,$sql);
if($result){
	echo "Database created successfully!";
} else {
	echo "Error: " . $conn->error;
}
#close connection
$conn -> close();
}

function db_connect(){
$serverName = "localhost:3306";
$username = "user1";
$password = "password";
$dbName = "videogamedb";
$conn = new mysqli($serverName, $username, $password, $dbName);
if($conn -> connect_error)
{
	die("Connection failed:". $conn-> connect_error);
} 
$conn->autocommit(TRUE);
return $conn;
}

function table_create(){
	#create tables
	$conn = db_connect();
	#$sql = "DROP TABLE videogame";

// if($conn->query($sql) === TRUE){
// 	echo "Table dropped successfully!";
// } else {
// 	echo "Error: " . $conn->error;
// }
//     $sql = "CREATE TABLE videogame(
// 	Title  VARCHAR(50),
// 	ReleaseDate DATE,
// 	Price DOUBLE(5,2),
// 	Rating VARCHAR(15),
// 	Series VARCHAR(50),
// 	LinkToCoverImage VARCHAR(256) DEFAULT 'blankCover.png', 
// 	PRIMARY KEY (Title)
// 	)";

// $sql = "CREATE TABLE user (
// 	name VARCHAR(20) NOT NULL,
// 	username VARCHAR(20),
// 	password VARCHAR(30) NOT NULL,
// 	privilege INT default 0,
// 	PRIMARY KEY (username)
// 	)";

   $sql = "CREATE TABLE genre(
	Title VARCHAR(50),
	Genre VARCHAR(30),
	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
	PRIMARY KEY( `Title`, `Genre`)
	);
	
	CREATE TABLE region(
	Title VARCHAR(50),
	Region VARCHAR(10),
	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
	PRIMARY KEY( `Title`, `Region`)
	);
	
	CREATE TABLE platform(
	Title VARCHAR(50),
	Platform VARCHAR(30),
	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
	PRIMARY KEY( `Title`, `Platform`)
	);";
	$result = mysqli_multi_query($conn,$sql);
	if($result) {
	echo "Table(s) created successfully!";
} else {
	echo "Error: " . $conn->error;
}
}
?>