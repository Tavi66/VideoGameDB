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

function populateDB(){
	$conn = db_connect();
	$sql = "
	INSERT INTO series (Series) VALUES ('N/A');
INSERT INTO series VALUES ('Disgaea','2003-01-30','Ongoing'), ('Persona','1996-09-20','Ongoing'), ('Digimon','1998-09-23','Ongoing'),('Super Smash Bros.','1999-01-21','Ongoing');

	INSERT INTO `videogame` (`Title`, `ReleaseDate`, `Price`, `Rating`, `Series`, `LinkToCoverImage`) VALUES
('Digimon Story: Cyber Sleuth', '2016-02-02', 59.99, 'Teen', 'Digimon', 'https://upload.wikimedia.org/wikipedia/en/b/b1/Digimon_Story%2C_Cyber_Sleuth.jpeg'),
('Digimon World DS', '2006-11-07', 29.99, 'Everyone 10+', 'Digimon', 'https://upload.wikimedia.org/wikipedia/en/5/54/Digimon_World_DS_Coverart.jpg'),
('Disgaea 1 Complete', '2018-10-18', 49.99, 'Teen', 'Disgaea', 'https://upload.wikimedia.org/wikipedia/en/d/d2/Disgaea_Hour_of_Darkness.jpg'),
('Disgaea D2: A Brighter Darkness', '2013-03-20', 39.99, 'Teen', 'Disgaea', 'https://upload.wikimedia.org/wikipedia/en/4/41/Disgaea_D2_cover.jpg'),
('Disgaea: Hour Of Darkness', '2003-08-27', 39.99, 'Teen', 'Disgaea', 'https://upload.wikimedia.org/wikipedia/en/d/d2/Disgaea_Hour_of_Darkness.jpg'),
('Persona 5', '2016-09-15', 59.99, 'Mature 17+', 'Persona', 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'),
('Persona Q2', '2019-06-04', 69.99, 'Mature 17+', 'Persona', 'https://upload.wikimedia.org/wikipedia/en/7/71/PersonaQ2newcinemalabyrinth.jpg'),
('Super Smash Bros. Ultimate', '2018-12-07', 59.99, 'Everyone 10+', 'Super Smash Bros.', 'https://upload.wikimedia.org/wikipedia/en/5/50/Super_Smash_Bros._Ultimate.jpg'),
('The Liar Princess and the Blind Prince', '2019-02-12', 39.99, 'Everyone 10+', 'N/A', 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg');

INSERT INTO `genre` (`Title`, `Genre`) VALUES
	('Disgaea 1 Complete', 'RPG'),
	('Disgaea: Hour Of Darkness', 'RPG'),
	('Persona 5', 'RPG'),
	('Persona 5', 'Simulation'),
	('The Liar Princess and the Blind Prince', 'Action-Adventure');
	INSERT INTO `platform` (`Title`, `Platform`) VALUES
('Disgaea 1 Complete', 'Nintendo Switch'),
('Persona 5', 'PS4'),
('The Liar Princess and the Blind Prince', 'Nintendo Switch'),
('The Liar Princess and the Blind Prince', 'PS4');
INSERT INTO `region` (`Title`, `Region`) VALUES
('Disgaea 1 Complete', 'WW'),
('Persona 5', 'WW'),
('The Liar Princess and the Blind Prince', 'JP'),
('The Liar Princess and the Blind Prince', 'NA');
	";
	
	$result = mysqli_multi_query($conn,$sql);
	if($result) {
	echo "Table(s) created successfully!";
} else {
	echo "Error: " . $conn->error;
}

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

//    $sql = "DROP TABLE genre; DROP TABLE region; DROP TABLE platform; DROP TABLE videogame; 
//    CREATE TABLE series(
// 	Series VARCHAR(50),
// 	DateCreated DATE,
// 	Status VARCHAR(15),
// 	PRIMARY KEY(Series)
// 	);

// 	CREATE TABLE videogame(
// 		Title  VARCHAR(50),
// 		ReleaseDate DATE,
// 		Price DOUBLE(5,2),
// 		Rating VARCHAR(15) DEFAULT 'Not Yet Rated',
// 		Series VARCHAR(50),
// 		LinkToCoverImage VARCHAR(256) DEFAULT 'blankCover.png',
// 		CONSTRAINT FOREIGN KEY (Series) REFERENCES series(Series),
// 		PRIMARY KEY (Title)
// 		);

//    CREATE TABLE genre(
// 	Title VARCHAR(50),
// 	Genre VARCHAR(30),
// 	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
// 	PRIMARY KEY( `Title`, `Genre`)
// 	);
	
// 	CREATE TABLE region(
// 	Title VARCHAR(50),
// 	Region VARCHAR(10),
// 	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
// 	PRIMARY KEY( `Title`, `Region`)
// 	);
	
// 	CREATE TABLE platform(
// 	Title VARCHAR(50),
// 	Platform VARCHAR(30),
// 	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
// 	PRIMARY KEY( `Title`, `Platform`)
// 	);
// 	";
$sql = "CREATE TABLE reviews(
	Title VARCHAR(50),
	Rating INT, 
	Review VARCHAR(256),
	Date DATE,
	UserRatedBy VARCHAR(20),
	CONSTRAINT FOREIGN KEY (UserRatedBy) REFERENCES user(username),
	CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
	PRIMARY KEY(Title, UserRatedBy)
	);";
	$result = mysqli_multi_query($conn,$sql);
	if($result) {
	echo "Table(s) created successfully!";
} else {
	echo "Error: " . $conn->error;
}
}
?>