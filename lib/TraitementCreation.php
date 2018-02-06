<?php

    if (!empty($_POST['contenu']) && !empty($_POST['type']))
    {
        $contenu = htmlspecialchars($_POST['contenu']);
        $type = htmlspecialchars($_POST['type']);
        
        $media = new Media();
      
        $media->setContenu($contenu);
        $media->setType($type);
      
        $db = connecBDD();
      
        $med = new MediaManager($db);

        $med->ajoutMedia($media);
        header('Location: accueil.php');
        exit();
    }
    else
    {
        echo 'Tout les champs doivent être remplis';
    }
