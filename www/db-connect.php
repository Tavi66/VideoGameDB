<?php
function db_create(){
$serverName = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($serverName, $username, $password);
if($conn -> connect_error)
{
	die("Connection failed:". $conn-> connect_error);
} 
#drop db
$sql = "DROP DATABASE videogamedb";

if($conn->query($sql) === TRUE){
	echo "Database dropped successfully!";
} else {
	echo "Error: " . $conn->error;
}
#create db
$sql = "CREATE DATABASE videogamedb";

if($conn->query($sql) === TRUE){
	echo "Database created successfully!";
} else {
	echo "Error: " . $conn->error;
}
#close connection
$conn -> close();
}

function db_connect(){
$serverName = "localhost";
$username = "root";
$password = "";
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
    $sql = "CREATE TABLE videogame(
	Title  VARCHAR(50),
	ReleaseDate DATE,
	Price DOUBLE(5,2),
	Rating VARCHAR(5),
	Series VARCHAR(50),
	LinkToCoverImage VARCHAR(256), 
	PRIMARY KEY (Title)
	)";

if($conn->query($sql)) {
	echo "Table videogame created successfully!";
} else {
	echo "Error: " . $conn->error;
}
}
?>