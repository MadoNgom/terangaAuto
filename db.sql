DROP DATABASE IF EXISTS `TérangaAuto`;
CREATE DATABASE IF NOT EXISTS `TérangaAuto`;
USE `TérangaAuto`;
--  user = utilisateur
DROP TABLE IF EXISTS `User`;
CREATE TABLE IF EXISTS NOT `User`;

CREATE TABLE `User`(
 `id` int PRIMARY KEY AUTO_INCREMENT,
 `nom` VARCHAR(100),
 `prenom` VARCHAR(100),
 `email` VARCHAR(50) UNIQUE,
 `pwd` VARCHAR(100),
--  type UNUM pour dire enumeeration
 `profile` ENUM("ADMIN","CLIENT")
);
CREATE TABLE `Produit`(
 `id` int PRIMARY KEY AUTO_INCREMENT,
 `nom` VARCHAR(100),
 `description` TEXT, 
 `prixU` float,
 `image` VARCHAR(100),
 `id_categories` int,
 `id_Admin` int,
CONSTRAINT fk_Admin FOREIGN KEY (`id_Admin`) REFERENCES `User` (`id`)
);

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nom` varchar(256) NOT NULL,
  `description` text NOT NULL
);

ALTER TABLE `Produit`
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_categories`) REFERENCES `categories` (`id`);

