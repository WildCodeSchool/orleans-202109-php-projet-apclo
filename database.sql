-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET
  time_zone = "+00:00";
CREATE TABLE cat (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL,
    digital_chip CHAR(15),
    `description` TEXT,
    adoption_date DATE,
    birth_date DATE,
    color_id INT,
    gender_id INT,
    breed_id INT,
    furr_id INT,
    `image` CHAR(255)
  );
CREATE TABLE color (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    `name` VARCHAR(100)
  );
CREATE TABLE furr (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    `length` VARCHAR(100)
  );
CREATE TABLE breed (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    `name` VARCHAR(100)
  );
CREATE TABLE gender (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL
  );
INSERT INTO
  gender (`name`)
VALUES
  ('Mâle'),
  ('Femelle');
INSERT INTO
  furr (`length`)
VALUES
  ('court'),
  ('mi-long'),
  ('long');
INSERT INTO
  cat (
    `name`,
    digital_chip,
    `description`,
    adoption_date,
    birth_date,
    `image`,
    gender_id,
    furr_id
  )
VALUES
  (
    'Arthus',
    '250269590400705',
    "Arthus est apparu dans un quartier où une campagne de stérilisation a déjà été effectuée par l\'APCLO. 
    Son caractère sociable et sa grande gentillesse ont déterminé sa mise à l\'adoption. Un jardin est préférable. 
    Cohabitation possible avec de jeunes enfants, avec un autre chat à voir.",
    null,
    '2018-03-25',
    'Arthus.jpg',
    1,
    1
  ),
  (
    'Boris',
    '250268743981257',
    "Boris est arrivé dans un quartier de Saran où vit déjà une chatte libre. 
    Il s\'est montré agressif envers celle-ci ce qui a entrainé un comportement agressif de certains résidents. 
    C\'est un chat tranquille, très cool qui ne demande qu\'à se rapprocher de l\'humain. 
    Cohabitation avec de jeunes enfants possible. Un jardin est conseillé. 
    Boris est positif au virus de l\'immunodéficience féline (FIV) mais il est en très bonne santé et il peut vivre encore longtemps. 
    Le FIV NE PEUT PAS se transmettre aux êtres humains et aux autres espèces. 
    Il devra être le seul chat du foyer compte-tenu de sa positivité.",
    null,
    '2016-05-01',
    'Boris.jpg',
    1,
    1
  ),
  (
    'Bulle',
    '25026959040495',
    "Bulle errait impasse Emile Zola à Orléans. 
    C\'est une petite chatte pleine de vie qui recherche le contact des humains, très câline. 
    Elle peut vivre en appartement si celui-ci est spacieux, cohabitation possible avec de jeunes enfants, avec un autre animal à voir.",
    null,
    '2019-05-12',
    'Bulle.jpg',
    2,
    1
  ),
  (
    'Carlos',
    '250268743803076',
    "Carlos errait rue de Bourgogne à Orléans. 
    C\'est un chat certainement foncièrement gentil qui se laisse caresser mais qui reste très craintif et méfiant. 
    Ses adoptants devront faire preuve de patience pour qu\'il s'habitue à son nouveau foyer. 
    Compte-tenu de son caractère, un appartement est impératif. 
    La cohabitation avec de jeunes enfants ou un autre animal est déconseillée.",
    null,
    '2019-03-01',
    'Carlos.jpg',
    1,
    1
  ),
  (
    'Charlot',
    '250268743893107',
    "Chat errant très apprivoisé, nourri depuis l\'hiver dernier par l'adoptant d\'un chat de l\'APCLO. 
    Compte-tenu de la mésentente persistante entre les 2 chats et de son caractère sociable, il a été décidé de le proposer à l'adoption. 
    Charlot est un chat très sociable, sans aucun problème. 
    Un jardin est conseillé, cohabitation possible avec de jeunes enfants s\'ils sont calmes. 
    Charlot est positif au virus de l\'immunodéficience féline (FIV), mais il est en très bonne santé et il peut vivre encore longtemps. 
    Le FIV NE PEUT PAS se transmettre aux êtres humains et aux autres espèces. 
    Il devra être le seul chat du foyer compte-tenu de sa positivité.",
    null,
    '2016-05-01',
    'Charlot.jpg',
    1,
    1
  ),
  (
    'Pierrot',
    '250268743893112',
    "Pierrot a été abandonné et laissé à l\'association lors d'une collecte à Fleury les Aubrais. 
    C\'est un chaton dynamique et joueur qui aura besoin d'espace. 
    Un jardin est donc conseillé, cohabitation possible avec de jeunes enfants, avec un autre chat à éviter. 
    Pierrot est stérilisé.",
    '2021-09-28',
    '2021-04-10',
    'Pierrot.jpg',
    1,
    1
  ),
  (
    'Mireille',
    '250268743893036',
    "Mireille a été récupérée avec 5 chatons à Cléry St André.
    Atteinte de teigne elle a été mise à l\'isolement pour être soignée. 
    Enfin guérie, elle attend une famille qui voudra bien l\'accueillir pour lui offrir un foyer chaleureux. 
    Aime beaucoup les caresses mais encore vite effarouchée. 
    Ses adoptants devront la laisser venir vers eux et ne pas la brusquer. 
    Cohabitation avec de jeunes enfants déconseillée. 
    Vie en appartement possible.",
    '2021-10-21',
    '2018-05-01',
    'Mireille.jpg',
    2,
    1
  ),
  (
    'Nebraska',
    '250268743893015',
    "Nebraska fait partie d\'une fratrie de 4 chatons récupérés avec leur mère à Orléans la Source. 
    Adorable chatonne, très vive et très joueuse elle aime le contact avec les autres chats et le chien de la maison. 
    Elle serait très heureuse dans une famille habitant en maison avec jardin car elle a besoin d'espace et de contact. 
    Dernière de sa fratrie, elle attend de trouver, comme ses frères et soeur, une famille pour l\'accueillir.",
    '2021-07-10',
    '2021-04-28',
    'Nebraska.jpg',
    2,
    1
  ),
  (
    'Opium',
    '250268743803005',
    "Opium fait partie d\'une fratrie de 4 chatons qui s\'étaient installés dans le jardin de leur famille d\'accueil. 
    C\'est la plus petite de la fratrie, elle est très vive et très joueuse. 
    Elle continue d\'apprendre en observant son environnement. 
    Opium, sa soeur Opale et son frère Oscar recherchent leur famille pour la vie. 
    Leur frère Othello est déjà réservé.",
    '2021-07-15',
    '2021-04-25',
    'Nebraska.jpg',
    2,
    1
  );
ALTER TABLE
  cat
ADD
  CONSTRAINT fk_cat_color FOREIGN KEY (color_id) REFERENCES color(id),
  CONSTRAINT fk_cat_breed FOREIGN KEY (breed_id) REFERENCES breed(id),
  CONSTRAINT fk_cat_furr FOREIGN KEY (furr_id) REFERENCES furr(id),
  gender_id INT NOT NULL,
  CONSTRAINT fk_cat_gender FOREIGN KEY (gender_id) REFERENCES gender(id);