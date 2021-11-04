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

CREATE TABLE `cat` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `digital_chip` INT(15), `description` TEXT, `adoption_date` DATE, `birth_date` DATE, PRIMARY KEY (`id`);

ALTER TABLE `cat` ADD COLUMN `color_id` INT;

ALTER TABLE `cat` ADD COLUMN `color_id` INT;

ALTER TABLE `cat` ADD COLUMN `breed_id` INT;

CREATE TABLE `color`( `id` int NOT NULL primary key AUTO_INCREMENT COMMENT 'Primary Key', `name` VARCHAR(100));

CREATE TABLE `fur`( `id` int NOT NULL primary key AUTO_INCREMENT COMMENT 'Primary Key', `length` VARCHAR(100));

CREATE TABLE `breed`( `id` int NOT NULL primary key AUTO_INCREMENT COMMENT 'Primary Key', `name` VARCHAR(100));

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_color` FOREIGN KEY(`color_id`) REFERENCES `color`(`id`);

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_breed` FOREIGN KEY(`breed_id`) REFERENCES `breed`(`id`);

ALTER TABLE `cat` ADD CONSTRAINT `fk_cat_fur` FOREIGN KEY(`fur_id`) REFERENCES `fur`(`id`);

"SELECT cat.name as name, image, birth_date, digital_chip, description, adoption_date, gender.name as gender, fur.length as length, color.name as color, breed.name as breed FROM " .
        self::TABLE . " LEFT JOIN gender ON gender.id = cat.gender_id JOIN fur ON fur.id = cat.fur_id JOIN breed ON breed.id = cat.breed_id JOIN color ON color.id = cat.color_id WHERE cat.id=:id"