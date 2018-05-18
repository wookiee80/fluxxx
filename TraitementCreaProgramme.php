<?php
    session_start();
    include 'fonctions.php';

    if (!empty($_POST['titre']) && !empty($_POST['nombre']) && !empty($_POST['idutilisateur'])) //Si les champs sont remplis, continuer
    {   
        $titreProgramme = htmlspecialchars($_POST['titre']);
        $nombreMedia = htmlspecialchars($_POST['nombre']);
        $idUser = htmlspecialchars($_POST['idutilisateur']);
        //On continue le traitement
        $programme = new Programme();
      
        $programme->setTitreProgramme($titreProgramme);
        $programme->setNombreMedia($nombreMedia);
        $programme->setIdUser($idUser);
      
        $db = connecBDD();
        
        $prog = new ProgrammeManager($db);
        $prog->ajoutProgramme($programme);
        header('Location: accueil.php');
        exit();
    }
    else
    {
        echo 'Tous les champs doivent être remplis';
    }