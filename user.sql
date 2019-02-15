#GET user table
SELECT * FROM user;

#DELETE a user with a username
DELETE FROM user WHERE username='lily';

#INSERT into user table
#All 4 entries inserted.
#Administrator user. Admin privilege entered.
INSERT INTO user (name,username,password,privilege)
VALUES ('vi','vi','queen',1);
INSERT INTO user (name,username,password,privilege)
VALUES ('dzung','dzung','chronos',1);
#3 entries entered. Standard user. default privilege used.
INSERT INTO user (name,username,password)
VALUES ('N','lily','Alpha');

#UPDATE user table

#JOIN