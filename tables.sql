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
#create 'videogame' table
CREATE TABLE videogame(
Title  VARCHAR(50),
ReleaseDate DATE,
Price DOUBLE(5,2),
Rating VARCHAR(15) DEFAULT 'Not Yet Rated',
Series VARCHAR(50),
LinkToCoverImage VARCHAR(256) DEFAULT 'blankCover.png',
PRIMARY KEY (Title)
);
#create 'genre' table
CREATE TABLE genre(
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
);
#username (PK)
#password not null
#default value for privilege = 0 (standard user)
#privilege = 1 (admin)