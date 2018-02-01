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

unset ($pdo);


