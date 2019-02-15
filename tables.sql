#Create VideoGameDB database
CREATE SCHEMA VideoGameDB;
DROP TABLE user;
#create 'user' table
CREATE TABLE user (
name VARCHAR(20) NOT NULL,
username VARCHAR(20),
password VARCHAR(30) NOT NULL,
privilege INT default 0,
PRIMARY KEY (username)
);

CREATE TABLE videogame(
Title  VARCHAR(50),
ReleaseDate DATE,
#Genre VARCHAR(30), #join w/ 'genre' table
Price DOUBLE(5,2),
#Platform VARCHAR(25), #join w/ 'platforms' table
Rating VARCHAR(15),
#Region VARCHAR(4),
Series VARCHAR(50),
LinkToCoverImage VARCHAR(256) DEFAULT 'blankCover.png', 
#Retailer VARCHAR(20); #join with 'retailer' table
PRIMARY KEY (Title)
);

CREATE TABLE genre(
videoGameTitle VARCHAR(50),
Genre VARCHAR(30),
CONSTRAINT FOREIGN KEY (videoGameTitle) REFERENCES videogame(Title)
);
#username (PK)
#password not null
#default value for privilege = 0 (standard user)
#privilege = 1 (admin)