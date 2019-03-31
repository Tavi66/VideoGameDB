#CREATE DOMAIN ... Nevermind. Hassle, since already created tables
#DOMAINs take space in DB
#CASCADE force drop (even with dependents on objects)
#GET videogame table
SELECT COUNT(*) AS TLPatBP_Genres
FROM genre WHERE Title= 'The Liar Princess and the Blind Prince';
INSERT INTO genre VALUES ('Disgaea 1 Complete','RPG');
UPDATE videogame
SET Price = 79.99, Rating = 'Mature 17+', LinkToCoverImage = 'blankCover.png'
WHERE Title = 'Persona 5';
INSERT INTO region 
VALUES ('Disgaea 1 Complete','WW');
##############################################
#SELECTS
SELECT * FROM retailer;
SELECT * FROM genre;
SELECT * FROM region;
SELECT * FROM videogame;
SELECT * FROM platform;
#############################################
SELECT COUNT(*) AS Total_retailers
FROM retailer;
UPDATE retailer
SET LinkToWebsite = 'https://www.amazon.com/'
WHERE Retailer = 'Amazon';
SELECT COUNT(*) AS Total_Titles_Switch
FROM platform
WHERE Platform = 'Nintendo Switch';
DELETE FROM platform
WHERE Title = 'The Liar Princess and the Blind Prince' AND Platform =  'PS4';
UPDATE platform
SET Platform = 'PS4'
WHERE Title = 'The Liar Princess and the Blind Prince' AND Platform =  'Nintendo Switch';

INSERT INTO platform
VALUES ('Disgaea 1 Complete','Nintendo Switch');
SELECT COUNT(*) AS Total_Titles_Regions
FROM region;
DELETE FROM region
WHERE Title = 'The Liar Princess and the Blind Prince' AND Region =  'NA';
UPDATE region
SET Region = 'WW'
WHERE Title = 'The Liar Princess and the Blind Prince' AND Region =  'JP';

DELETE FROM videogame
WHERE Title = 'Super Smash Bros. Ultimate';
SELECT * FROM series;
INSERT INTO genre
VALUES ('Persona 5', 'Adventure');
DELETE FROM genre
WHERE Title = 'Persona 5' AND Genre =  'Adventure';
#GET table with specific attribute in videogame
SELECT * FROM videogame WHERE Price = 59.99;
UPDATE genre
SET genre = 'Action-Adventure'
WHERE Title = 'The Liar Princess and the Blind Prince' AND Genre = 'Action';
#
SELECT videogame.Title, genre.Genre, platform.Platform FROM videogame
INNER JOIN genre INNER JOIN platform 
where genre.Title = videogame.Title AND platform.Title = videogame.Title;
SELECT videogame.Title, genre.Genre, platform.Platform, region.Region FROM videogame
INNER JOIN genre INNER JOIN platform INNER JOIN region 
where genre.Title = videogame.Title AND platform.Title = videogame.Title AND region.Title = videogame.Title;
SELECT genre.Title, genre.Genre
FROM (SELECT DISTINCT Title FROM genre) AS g
JOIN genre AS GENRE
ON genre.Title = g.Title;
#JOIN Title;
#GET genre table
SELECT * FROM platform;
#GET table with specific genre
SELECT * FROM genre WHERE Genre = 'RPG';
SELECT * FROM platform WHERE Platform = 'PS4';

#PROJECTION
#DIVISION 
#cuts out duplicates that have a match(es) 
#DIVISION useful for genres
#JOIN video game title and genre(s) relation
#INNER JOIN genre and videogame 
SELECT videogame.ReleaseDate, videogame.Title, videogame.Rating, genre.Genre
FROM genre INNER JOIN videogame 
WHERE videogame.Title=genre.Title AND genre.Genre = 'RPG';
#
SELECT DISTINCT videogame.*, genre.Genre, platform.Platform
FROM videogame INNER JOIN genre INNER JOIN platform 
WHERE videogame.Title=genre.Title AND videogame.Title=platform.Title AND genre.Genre = 'RPG' AND platform.Platform = 'PS4';
#
SELECT platform.*, genre.Genre
FROM platform INNER JOIN genre
WHERE genre.Title=platform.Title AND platform.Platform = 'Nintendo Switch';
#Get title, platform, genre, and region
SELECT platform.*, genre.Genre, region.Region
FROM platform INNER JOIN genre INNER JOIN region
WHERE genre.Title=platform.Title AND platform.Title = region.Title;
#DELETE videogame
#if removing video game, must delete from genre, retailers, etc. tables before deleting from videogame table
DELETE FROM genre WHERE Title='Persona 5'; 
DELETE FROM videogame WHERE Title='Persona 5';
DELETE FROM videogame WHERE Series='Super Smash Bros.';
#INSERT videogame info. (+genre, region, retailer, etc.)
INSERT INTO videogame
VALUES ('Digimon World DS', '2006-11-07', 29.99, 'Everyone 10+', 'Digimon', 'https://upload.wikimedia.org/wikipedia/en/5/54/Digimon_World_DS_Coverart.jpg');
INSERT INTO videogame (Title,ReleaseDate,Rating,Price,Series)
VALUES ('Persona 5', '2016-09-15', 'Mature +17',59.99,'Persona');
INSERT INTO videogame (Title,ReleaseDate,Rating,Price,Series)
VALUES ('Persona 6', '2019-09-15', 'Mature +17',59.99,'Persona');
INSERT INTO genre (Title, Genre)
VALUES ('Persona 5', 'RPG');
INSERT INTO genre (Title, Genre)
VALUES ('Persona 5', 'Simulation');
INSERT INTO platform
VALUES ('Persona 5', 'PS4');
INSERT INTO region VALUES ('Persona 5','WW');
INSERT INTO genre (Title, Genre)
VALUES ('Persona 5', 'Social Simulation');
#INSERT
INSERT INTO videogame (Title,ReleaseDate,Price,Series)
VALUES ('The Liar Princess and the Blind Prince', '2019-02-12',39.99, 'N/A');
INSERT INTO genre (Title, Genre)
VALUES ('The Liar Princess and the Blind Prince', 'Action');
INSERT INTO genre (Title, Genre)
VALUES ('The Liar Princess and the Blind Prince', 'Adventure');
INSERT INTO genre (Title, Genre)
VALUES ('The Liar Princess and the Blind Prince', 'RPG');
INSERT INTO platform
VALUES ('The Liar Princess and the Blind Prince', 'Nintendo Switch'); #switch
#INSERT
INSERT INTO videogame (Title,ReleaseDate,Price,Series)
VALUES ('Super Smash Bros. Ultimate', '2018-12-07',59.99, 'Super Smash Bros.');
INSERT INTO platform
VALUES ('Super Smash Bros. Ultimate', 'Nintendo Switch');
INSERT INTO genre
VALUES ('Super Smash Bros. Ultimate', 'Fighting');
#UPDATE
#UPDATE game cover
UPDATE videogame
SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'
WHERE Title = 'Persona 5';
UPDATE videogame
SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg'
WHERE Title = 'The Liar Princess and the Blind Prince';
UPDATE videogame
SET  Title = '123'
WHERE Title = 'Persona 6';
#AGGREGATE total video game entries
SELECT COUNT(*)
FROM videogame;