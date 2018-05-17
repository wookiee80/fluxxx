<?php
    session_start();
    include 'fonctions.php';

    if (!empty($_POST['titre']) && !empty($_POST['nombre'])) //Si les champs sont remplis, continuer
    {   
        $titreProgramme = htmlspecialchars($_POST['titre']);
        $nombreMedia = htmlspecialchars($_POST['nombre']);
      
        //On continue le traitement
        $programme = new Programme();
      
        $programme->setTitreProgramme($titreProgramme);
        $programme->setNombreMedia($nombreMedia);
        $programme->setIdUser($idUser);
      
        $db = connecBDD();
        
        $prog = new ProgrammeManager($db);
        $util->ajoutProgramme($programme);
        header('Location: accueil.php');
        exit();
    }
    else
    {
        echo 'Tout les champs doivent être remplis';
    }