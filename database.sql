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

ALTER TABLE `cat` ADD `gender_id` INT NOT NULL;

CREATE TABLE `gender` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`));

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_gender` FOREIGN KEY(`gender_id`) REFERENCES `gender`(`id`);

INSERT INTO `gender`(`name`) VALUES ('Mâle'), ('Femelle');