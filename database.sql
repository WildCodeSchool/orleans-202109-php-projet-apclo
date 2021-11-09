-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Octobre 2017 à 13:53
-- Version du serveur :  5.7.19-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `cat` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `digital_chip` INT(15), `description` TEXT, `adoption_date` DATE, `birth_date` DATE, PRIMARY KEY (`id`));

ALTER TABLE `cat` ADD COLUMN `color_id` INT;

ALTER TABLE `cat` ADD COLUMN `breed_id` INT;

CREATE TABLE `color`( `id` int NOT NULL primary key AUTO_INCREMENT COMMENT 'Primary Key', `name` VARCHAR(100));

CREATE TABLE `fur`( `id` int NOT NULL primary key AUTO_INCREMENT COMMENT 'Primary Key', `length` VARCHAR(100));

CREATE TABLE `breed`( `id` int NOT NULL primary key AUTO_INCREMENT COMMENT 'Primary Key', `name` VARCHAR(100));

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_color` FOREIGN KEY(`color_id`) REFERENCES `color`(`id`);

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_breed` FOREIGN KEY(`breed_id`) REFERENCES `breed`(`id`);

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_fur` FOREIGN KEY(`fur_id`) REFERENCES `fur`(`id`);

ALTER TABLE `cat` ADD `gender_id` INT NOT NULL;

CREATE TABLE `gender` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`));

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_gender` FOREIGN KEY(`gender_id`) REFERENCES `gender`(`id`);

INSERT INTO `gender`(`name`) VALUES ('Mâle'), ('Femelle');

insert into article(id,title,description,date,image) values('1',"Adhésion","La cotisation annuelle, d'un minimum de 10€, donne droit à une déduction fiscale : 66% des sommes versée, dans la limite de 20% du revenu imposable.",'2021-11-01',null);
insert into article(id,title,description,date,image) values('2',"Reprise d'activité",'Nous reprenons notre activité "chats errants" à compter de ce jour. Les demandes en provenance d\'Orléans et Meung sur Loire seront prioritaires, ces communes ayant passé un accord avec l\'association. Seront ensuite privilégiées les personnes s\'engageant à régler la totalité des frais. En cette fin d\'année, nous devons tenir compte, plus que jamais, de nos possibilités financières.','2021-10-23',null);
insert into article(id,title,description,date,image) values('3',"Fondation de l'APCLO","L'Association pour la Protection des Chats Libres d'Orléans est fondée, en accord avec la Direction de l'Environnement et de la Santé de la commune d'Orléans.",'1999-08-03',null);
insert into article(id,title,description,date,image) values('6',"Quelle conduite tenir si un chat qui n’a pas l’habitude de sortir s’échappe de votre logement ?","Si vous habitez en pavillon ou en rez de jardin, laissez ouvert toute la nuit par là où le chat est sorti et réitérez plusieurs nuits de suite si nécessaire. Mettez un tout petit peu de nourriture devant la porte ou la fenêtre ouverte et davantage à l’intérieur.",'2021-11-03',null);

