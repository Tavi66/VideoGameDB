#populate database for screenshots
#with series
#need to populate series first
INSERT INTO retailer
VALUES ('Amazon', '', 'Online'),
('Target', 'https://www.target.com/','Online and In-Store'),
('GameStop', 'https://www.gamestop.com/','Online and In-Store'),
('Steam', 'https://store.steampowered.com/', 'Online'),
('Nintendo', 'https://www.nintendo.com/games', 'Online'),
('PlayStation', 'https://store.playstation.com/en-us/home/games', 'Online');
#INSERT INTO videogame table
INSERT INTO videogame (Title, ReleaseDate, Price, Rating, Series, LinkToCoverImage) VALUES
('Digimon Story: Cyber Sleuth', '2016-02-02', 59.99, 'Teen', 'Digimon', 'https://upload.wikimedia.org/wikipedia/en/b/b1/Digimon_Story%2C_Cyber_Sleuth.jpeg'),
('Digimon World DS', '2006-11-07', 29.99, 'Everyone 10+', 'Digimon', 'https://upload.wikimedia.org/wikipedia/en/5/54/Digimon_World_DS_Coverart.jpg'),
('Disgaea 1 Complete', '2018-10-18', 49.99, 'Teen', 'Disgaea', 'https://upload.wikimedia.org/wikipedia/en/d/d2/Disgaea_Hour_of_Darkness.jpg'),
('Disgaea D2: A Brighter Darkness', '2013-03-20', 39.99, 'Teen', 'Disgaea', 'https://upload.wikimedia.org/wikipedia/en/4/41/Disgaea_D2_cover.jpg'),
('Disgaea: Hour Of Darkness', '2003-08-27', 39.99, 'Teen', 'Disgaea', 'https://upload.wikimedia.org/wikipedia/en/d/d2/Disgaea_Hour_of_Darkness.jpg'),
('Persona 5', '2016-09-15', 59.99, 'Mature 17+', 'Persona', 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'),
('Persona Q2', '2019-06-04', 69.99, 'Mature 17+', 'Persona', 'https://upload.wikimedia.org/wikipedia/en/7/71/PersonaQ2newcinemalabyrinth.jpg'),
('Super Smash Bros. Ultimate', '2018-12-07', 59.99, 'Everyone 10+', 'Super Smash Bros.', 'https://upload.wikimedia.org/wikipedia/en/5/50/Super_Smash_Bros._Ultimate.jpg'),
('The Liar Princess and the Blind Prince', '2019-02-12', 39.99, 'Everyone 10+', 'N/A', 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg');
#
INSERT INTO `region` (`Title`, `Region`) VALUES
('Persona 5', 'WW'),
('The Liar Princess and the Blind Prince', 'JP'),
('The Liar Princess and the Blind Prince', 'NA');
#
#no series in table
#INSERT INTO videogame VALUES
#('Digimon Story: Cyber Sleuth', '2016-02-02', 59.99, 'Teen', 'https://upload.wikimedia.org/wikipedia/en/b/b1/Digimon_Story%2C_Cyber_Sleuth.jpeg'),
#('Digimon World DS', '2006-11-07', 29.99, 'Everyone 10+', 'https://upload.wikimedia.org/wikipedia/en/5/54/Digimon_World_DS_Coverart.jpg'),
#('Disgaea 1 Complete', '2018-10-18', 49.99, 'Teen', 'https://upload.wikimedia.org/wikipedia/en/d/d2/Disgaea_Hour_of_Darkness.jpg'),
#('Disgaea D2: A Brighter Darkness', '2013-03-20', 39.99, 'Teen', 'https://upload.wikimedia.org/wikipedia/en/4/41/Disgaea_D2_cover.jpg'),
#('Disgaea: Hour Of Darkness', '2003-08-27', 39.99, 'Teen', 'https://upload.wikimedia.org/wikipedia/en/d/d2/Disgaea_Hour_of_Darkness.jpg'),
#('Persona 5', '2016-09-15', 59.99, 'Mature 17+', 'https://upload.wikimedia.org/wikipedia/en/b/b0/Persona_5_cover_art.jpg'),
#('Persona Q2', '2019-06-04', 69.99, 'Mature 17+', 'https://upload.wikimedia.org/wikipedia/en/7/71/PersonaQ2newcinemalabyrinth.jpg'),('Super Smash Bros. Ultimate', '2018-12-07', 59.99, 'Everyone 10+', 'https://upload.wikimedia.org/wikipedia/en/5/50/Super_Smash_Bros._Ultimate.jpg'),
#('The Liar Princess and the Blind Prince', '2019-02-12', 39.99, 'Everyone 10+', 'https://upload.wikimedia.org/wikipedia/en/f/fb/Liar_Princess_and_the_Blind_Prince_Box_Art.jpg');
#
SELECT * FROM series;
INSERT INTO series (Series) VALUES ('N/A');
INSERT INTO series VALUES ('Disgaea','2003-01-30','Ongoing');
#, ('Persona','1996-09-20','Ongoing'), ('Digimon','1998-09-23','Ongoing'),('Super Smash Bros.','1999-01-21','Ongoing');
INSERT INTO series (Series) VALUES ('Pokemon') , ('Digimon');
DELETE FROM series WHERE  series = 'Digimon';
UPDATE series
SET  status = 'Complete'
WHERE series = 'Persona';
INSERT INTO company VALUES ('Square Enix','https://www.square-enix.com/','Publisher and Developer');
INSERT INTO company VALUES ('Atlus','https://www.atlus.com/','Publisher and Developer');

SELECT COUNT(*) AS seriesTotal
FROM series;
SELECT videogame.Title, series.*
FROM videogame INNER JOIN series
WHERE videogame.Series = 'Disgaea' AND videogame.Series = series.Series;
#TABLE DROPs
DROP TABLE `videogamedb`.`played`;
DROP TABLE `videogamedb`.`favorites`;
DROP TABLE `videogamedb`.`videogame`;
DROP TABLE `videogamedb`.`reviews`;
DROP TABLE videogame;
DROP TABLE user;
#DROP genre and videogame tables
DROP TABLE genre;
DROP TABLE region;
DROP TABLE platform;
DROP TABLE series;
DROP TABLE company;
DROP TABLE videogame;

SELECT * FROM videogame_retailer;
INSERT INTO videogame_retailer VALUES
('Persona 5', 'Amazon'),
('Persona 5', 'PlayStation'),
('The Liar Princess and the Blind Prince', 'PlayStation'),
('The Liar Princess and the Blind Prince', 'Amazon'),
('The Liar Princess and the Blind Prince', 'Nintendo'),
('Persona 5', 'Nintendo'),
('Persona Q2', 'Amazon');

SELECT videogame.*, retailer.* 
FROM videogame_retailer  INNER JOIN videogame INNER JOIN retailer
WHERE videogame_retailer.Retailer =  'Amazon' AND videogame_retailer.Title = videogame.Title AND videogame_retailer.Retailer = retailer.Retailer;


SELECT 
SUM(CASE WHEN Retailer =  'Amazon' then 1 else 0 end) AS TotalSoldByAmazon,
SUM(CASE WHEN Retailer =  'GameStop' then 1 else 0 end) AS TotalSoldByGameStop,
SUM(CASE WHEN Retailer =  'Nintendo' then 1 else 0 end) AS TotalSoldByNintendo,
SUM(CASE WHEN Retailer =  'PlayStation' then 1 else 0 end) AS TotalSoldByPlayStation
FROM videogame_retailer;
UPDATE videogame_retailer
SET Retailer = 'GameStop'
WHERE Title = 'The Liar Princess and the Blind Prince' AND Retailer =  'PlayStation';
DELETE FROM videogame_retailer
WHERE Title = 'Persona 5' AND Retailer = 'Nintendo';
INSERT INTO videogame_retailer VALUES
('Digimon Story: Cyber Sleuth', 'PlayStation');
SELECT series.*, company.*
FROM series_company INNER JOIN series INNER JOIN company 
WHERE series.Series=series_company.Series AND company.Company=series_company.Company;

INSERT INTO series_company VALUES ('Persona', 'Atlus', 'Publisher and Developer');
SELECT * FROM series;
SELECT * FROM company;
SELECT * FROM series_company;
SELECT series.*, series_company.Company 
FROM series INNER JOIN series_company
WHERE series_company.Series = series.Series AND series_company.Company = 'Nintendo';
DROP TABLE series_company;
INSERT INTO series_company VALUES ('Pokemon', 'Nintendo');
INSERT INTO series_company VALUES ('Super Smash Bros.', 'Nintendo');
INSERT INTO series_company VALUES ('Persona', 'Square Enix');
UPDATE series_company 
SET Company = 'Atlus'
WHERE Company = 'Square Enix' AND Series = 'Persona';
DELETE FROM series_company 
WHERE Series = 'Persona' AND Company = 'Nintendo';

SELECT COUNT(*) AS Total_Series_Nintendo
FROM series_company
WHERE Company =  'Nintendo';