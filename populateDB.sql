#populate database for screenshots
#with series
#need to populate series first
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

#TABLE DROPs
DROP TABLE `videogamedb`.`played`;
DROP TABLE `videogamedb`.`favorites`;
DROP TABLE `videogamedb`.`videogame`;
DROP TABLE `videogamedb`.`reviews`;
DROP TABLE videogame;
DROP TABLE user;
SELECT * FROM user;
SELECT series.*, company.*
FROM series_company INNER JOIN series INNER JOIN company 
WHERE series.Series=series_company.Series AND company.Company=series_company.Company;

INSERT INTO series_company VALUES ('Persona', 'Atlus', 'Publisher and Developer');
SELECT * FROM series;
SELECT * FROM company;
SELECT * FROM series_company;
