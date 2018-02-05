<?php
//on inclus les fichiers de config et d'autoload avant toute chose
include 'fonctions.php';

// connexion à Mysql sans base de données
$pdo = new PDO('mysql:host='.HOST, USER, PASS);
 
// création de la requête sql
// on teste avant si elle existe ou non (par sécurité)
$requete = "CREATE DATABASE IF NOT EXISTS `".DBNAME."` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
 
// on prépare et on exécute la requête
$pdo->prepare($requete)->execute();


//Requète pour créer la table user, en vérifiant avant si elle existe ou non:
$requeteCreaTabUser = "CREATE TABLE IF NOT EXISTS `fluxxx`.`".USERTABLE."` ( `idUser` INT NOT NULL AUTO_INCREMENT ,"
                    . " `nom` VARCHAR(55) NOT NULL , `prenom` VARCHAR(55) NOT NULL , `email` VARCHAR(255) NOT NULL ,"
                    . " `motDePasse` VARCHAR(255) NOT NULL , `droits` ENUM ('util','adm') NOT NULL DEFAULT 'util' ,"
                    . " PRIMARY KEY (`idUser`)) ENGINE = InnoDB;";

// on prépare et on exécute la requête
$pdo->prepare($requeteCreaTabUser)->execute();



//Requète pour créer la table media:
$requeteMedia = 'CREATE TABLE IF NOT EXISTS `fluxxx`.`media` ( `idMedia` INT NOT NULL AUTO_INCREMENT , `type` VARCHAR(30) NOT NULL , `contenu` VARCHAR(400) NOT NULL , PRIMARY KEY (`idMedia`)) ENGINE = InnoDB';


//On prepare et execute la requète:
$pdo->prepare($requeteMedia)->execute();


//Requète pour créer la table programme:
$requeteProgramme = 'CREATE TABLE IF NOT EXISTS `fluxxx`.`programme` ( `idProgramme` INT NOT NULL AUTO_INCREMENT , `titreProgramme` VARCHAR(30) NOT NULL , `idUser` INT NOT NULL , `nombreMedia` INT NOT NULL , PRIMARY KEY (`idProgramme`)) ENGINE = InnoDB';

//On prepare et execute la requète:
$pdo->prepare($requeteProgramme)->execute();

//On coupe la connexion
unset ($pdo);


