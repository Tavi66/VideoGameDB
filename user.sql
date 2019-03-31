#GET user table
SELECT * FROM user;
SELECT username, name, privilege FROM user WHERE username = 'vi';
#DELETE a user with a username
DELETE FROM user WHERE username='reyner';
#INSERT into user table
#Administrator user. Admin privilege entered.
INSERT INTO user VALUES ('vi','vi','queen',1);
INSERT INTO user (name,username,password,privilege)
VALUES ('dzung','dzung','chronos',1);
#Standard user. default privilege used.
INSERT INTO user (name,username,password)
VALUES ('N','lily','Alpha');
INSERT INTO user (name,username,password, privilege)
VALUES ('AAA','reyner','Beta', 0);
INSERT INTO user (name,username,password, privilege)
VALUES ('X','K','SP', 0);

#UPDATE user table
#update name where username
UPDATE user
SET  name = 'wan'
WHERE username = 'vi';
#update password where username
UPDATE user
SET  password = 'noir'
WHERE username = 'dzung';
#update privilege where username (to admin)
UPDATE user
SET  privilege = 1
WHERE username = 'lily';
#update privilege where username (to standard)
UPDATE user
SET  privilege = 0
WHERE username = 'morganA';
#JOIN 
#standard user wishes to view users with public personal lists?
#

#AGGREGATE (how many users w/ privilege ...) #privilege = 0 standard user #privilege = 1 admin
SELECT COUNT(privilege) AS Total_Standard_Users
FROM user WHERE user.privilege = 0;
SELECT COUNT(privilege) AS Total_Administrators
FROM user WHERE user.privilege = 1;
