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


//Fonction pour vérifier le type de fichier envoyé:
function typeFichier($type)
{
    switch ($type)
    {
    case 'image'://dans le cas d'une image
        $typeImage = new SplFileInfo(strtolower($type));//On va lire l'extension du fichier qu'on reçoit en la passant en minuscule
        
        //Si on trouve bien les extensions d'un image
        if($typeImage == 'jpg' || $typeImage == 'gif' || $typeImage == 'png' || $typeImage == 'bmp')
        {
            //On continue notre traitement:
                $typeFichier = 'image';
                 break;
        }
        //Sinon on affiche une erreur:
        else {
                throw new Exception('Fichier non supporté en tant qu\'image');
                break;
             }
             
         case 'lien'://Dans le cas d'un lien URL
            if (filter_var($type,FILTER_VALIDATE_URL))
            {
                $typeFichier = 'lien';
                break;
            }
            else
            {
                throw new Exception('Lien URL Invalide');
                break;
            }
    }
}

//Fonction pour enregistrer les images dans un dossier:
//On créé pour chaque type d'image un dossier spécifique
    function enregistreImage($fichier, $typeMedia, $idProrietaire)
    {
        //Normalement on est sûr de recevoir une image car on aura fait les traitement avec la fonction typeFichier.
        // On va donc ensuite enregistrer l'image : dans un repertoire avec un moyen de la lier à son propriétaire.

        if(!is_dir($typeMedia))// Si le repertoire n'existe pas encore on le créé
        {
            mkdir($typeMedia);
        }

        $nomFichier= rename($fichier, $idProrietaire.'_'.$fichier);// Ensuite on renome le fichier pour qu'il comporte l'id du propriétaire du fichier.
        
        //Maintenant on créé une variable avec la destination de l'enregistrement du fichier:
        $destination = CHEMIN_APPLI.$typeMedia.$nomFichier;
        
        //Ensuite on enregistre le fichier dans le bon emplacement :
        move_uploaded_file($_FILES[$fichier]['tmp_name'], $destination);
        
        return $destination;//On retourne le chemin de l'image pour l'enregistrer en bdd

    }

