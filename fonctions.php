<?php
require_once 'config.php';
include $cheminAppli.'/autoload.php';

//Fonction connexion à la BDD
function connecBDD()
{
    try 
    {
         $db = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASS,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
         $db->exec('SET NAMES utf8');
         return $db;
    }
     catch (Exception $e)
     {
         echo 'Erreur : '.$e->getMessage().'<br />';
         echo 'N° : '.$e->getCode();
         die();
     }
}

