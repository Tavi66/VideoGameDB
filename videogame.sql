#GET videogame table
SELECT * FROM videogame;
#GET table with specific attribute in videogame
SELECT * FROM videogame WHERE Price = 59.99;
#GET genre table
SELECT * FROM genre;
#GET table with specific genre
SELECT * FROM genre WHERE Genre = 'RPG';

#DROP genre and videogame tables
DROP TABLE genre;
DROP TABLE videogame;
#PROJECTION
#DIVISION 
#cuts out duplicates that have a match(es) 
#DIVISION useful for genres
#JOIN video game title and genre(s) relation
#INNER JOIN genre and videogame 
SELECT videogame.ReleaseDate, videogame.Title, videogame.Rating, genre.Genre
FROM genre INNER JOIN videogame 
WHERE videogame.Title=genre.videoGameTitle AND genre.Genre = 'RPG';

#DELETE videogame
#if removing video game, must delete from genre, retailers, etc. tables before deleting from videogame table
DELETE FROM genre WHERE videogameTitle='Persona 5'; 
DELETE FROM videogame WHERE Title='Persona 5';

#INSERT videogame info. (+genre, region, retailer, etc.)
INSERT INTO videogame (Title,ReleaseDate,Rating,Price,Series)
VALUES ('Persona 5', '2016-09-15', 'Mature +17',59.99,'Persona');
INSERT INTO genre (videoGameTitle, Genre)
VALUES ('Persona 5', 'RPG');
INSERT INTO genre (videoGameTitle, Genre)
VALUES ('Persona 5', 'Social Simulation');
#INSERT
INSERT INTO videogame (Title,ReleaseDate,Price,Series)
VALUES ('The Liar Princess and the Blind Prince', '2019-02-12',39.99, 'N/A');
INSERT INTO genre (videoGameTitle, Genre)
VALUES ('The Liar Princess and the Blind Prince', 'Action');
INSERT INTO genre (videoGameTitle, Genre)
VALUES ('The Liar Princess and the Blind Prince', 'Adventure');
INSERT INTO genre (videoGameTitle, Genre)
VALUES ('The Liar Princess and the Blind Prince', 'RPG');
#INSERT
INSERT INTO videogame (Title,ReleaseDate,Price,Series)
VALUES ('Super Smash Bros. Ultimate', '2018-12-07',59.99, 'Super Smash Bros.');
#UPDATE
#UPDATE game cover
UPDATE videogame
SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'
WHERE Title = 'Persona 5';
UPDATE videogame
SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg'
WHERE Title = 'The Liar Princess and the Blind Prince';
#AGGREGATE total video game entries
SELECT COUNT(*)
FROM videogame;