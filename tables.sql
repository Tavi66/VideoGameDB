#Create VideoGameDB database
CREATE SCHEMA VideoGameDB;
DROP TABLE user;
#create 'user' table
CREATE TABLE user (
username VARCHAR(20),
name VARCHAR(20) NOT NULL,
password VARCHAR(30) NOT NULL,
privilege INT default 0,
PRIMARY KEY (username)
);

#username (PK)
#password not null
#default value for privilege = 0 (standard user)
#privilege = 1 (admin)