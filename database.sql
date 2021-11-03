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

-- CREATION DATABASE `association`
--
-- CREATION TABLE `fur`, `gender`, `breed`, `color`, `adopter`

/*CREATE TABLE `fur` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`));

CREATE TABLE `gender` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`));

CREATE TABLE `breed` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`));

CREATE TABLE `color` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, PRIMARY KEY (`id`));

CREATE TABLE `adopter` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `firstname` VARCHAR(100) NOT NULL, `email` VARCHAR(100) NOT NULL, `adress` VARCHAR(255) NOT NULL, `phone_number` CHAR(30), PRIMARY KEY (`id`));*/

CREATE TABLE `cat` ( `id` INT NOT NULL AUTO_INCREMENT, `name` VARCHAR(100) NOT NULL, `digital_chip` INT(15), `description` TEXT, `adoption_date` DATE, `birth_date` DATE, PRIMARY KEY (`id`);
