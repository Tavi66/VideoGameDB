#Create VideoGameDB database
CREATE SCHEMA VideoGameDB;
DROP TABLE user;
#create 'user' table
CREATE TABLE user (
name VARCHAR(20) NOT NULL,
username VARCHAR(20),
password VARCHAR(30) NOT NULL,
privilege BIT NOT NULL DEFAULT 0,
#privilege INT default 0,
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
CONSTRAINT FOREIGN KEY (Series) REFERENCES series(Series),
PRIMARY KEY (Title)
);
#videogame-series table
#Don't think need this for now
CREATE TABLE videogame_series(
Series VARCHAR(50),
Title VARCHAR(50),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
CONSTRAINT FOREIGN KEY (Series) REFERENCES series(Series),
PRIMARY KEY(Title, Series)
);
#create 'series' table
CREATE TABLE series(
Series VARCHAR(50),
DateCreated DATE,
Status VARCHAR(15),
PRIMARY KEY(Series)
);
#relation table series-publisher-developer
#???
CREATE TABLE series_company(
Series VARCHAR(50), #FK
Company VARCHAR(30), #FK
CompanyType VARCHAR(30), #publisher, developer, publisher and developer
CONSTRAINT FOREIGN KEY (Series) REFERENCES series(Series),
FOREIGN KEY (Company, CompanyType) REFERENCES company(Company, CompanyType), 
PRIMARY KEY (Series, Company)
 );
#create 'company' table
CREATE TABLE company(
Company VARCHAR(30),
LinkToWebsite VARCHAR(256),
CompanyType VARCHAR(30), #publisher, developer, publisher and developer
PRIMARY KEY(Company, CompanyType)
);

#create 'retailer' table
CREATE TABLE retailer(
Retailer VARCHAR(30),
LinkToWebsite VARCHAR(256),
Type VARCHAR(30), #In-store, online, or online/in-store
PRIMARY KEY(Retailer)
);
#create 'genre' table
CREATE TABLE genre(
Title VARCHAR(50),
Genre VARCHAR(30),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
PRIMARY KEY( Title, Genre)
);

CREATE TABLE region(
Title VARCHAR(50),
Region VARCHAR(10),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
PRIMARY KEY(Title, Region)
);

CREATE TABLE platform(
Title VARCHAR(50),
Platform VARCHAR(30),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
PRIMARY KEY(Title, Platform)
);
#review
CREATE TABLE reviews(
Title VARCHAR(50),
Rating INT, # Overall rating: 1- 10?
Review VARCHAR(256),
Date DATE,
UserRatedBy VARCHAR(20),
CONSTRAINT FOREIGN KEY (UserRatedBy) REFERENCES user(username),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
PRIMARY KEY(Title, UserRatedBy)
);
#personal lists
#private, hide record if marked private
CREATE TABLE favorites(
Title VARCHAR(50),
Private BOOL,
UserRatedBy VARCHAR(20),
CONSTRAINT FOREIGN KEY (UserRatedBy) REFERENCES user(username),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
PRIMARY KEY(Title, UserRatedBy)
);
CREATE TABLE played(
Title VARCHAR(50),
Private BOOL,
UserRatedBy VARCHAR(20),
CONSTRAINT FOREIGN KEY (UserRatedBy) REFERENCES user(username),
CONSTRAINT FOREIGN KEY (Title) REFERENCES videogame(Title),
PRIMARY KEY(Title, UserRatedBy)
);
#username (PK)
#password not null
#default value for privilege = 0 (standard user)
#privilege = 1 (admin)