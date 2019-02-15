SELECT * FROM videogame;

SELECT * FROM genre;
#GET table with specific genre
SELECT * FROM genre WHERE Genre = 'Adventure';
#DROP TABLE genre;

#JOIN video game title and genre(s) relation
SELECT videogame.ReleaseDate, videogame.Title, genre.Genre
FROM genre INNER JOIN videogame 
WHERE videogame.Title=genre.videoGameTitle;

#DELETE videogame
#if removing video game, must delete from genre, retailers, etc. tables before deleting from videogame table
DELETE FROM genre WHERE videogameTitle='Persona 5'; 
DELETE FROM videogame WHERE Title='Persona 5';

#INSERT videogame info. (+genre, region, retailer, etc.)
INSERT INTO videogame (Title,ReleaseDate,Rating,Price,Series)
VALUES ('Persona 5', '2016-09-15', 'M',59.99,'Persona');
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
#UPDATE
#UPDATE game cover
UPDATE videogame
SET  LinkToCoverImage = 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'
WHERE Title = 'Persona 5';