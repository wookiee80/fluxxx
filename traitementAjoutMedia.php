<?php
include 'fonctions.php';
//TODO :
//Traitement et enregisrement d'un media + enregistrement de la compo du programme.
//Penser à mettre à jour la table programme (champ nombreMedia)
if(!empty($_POST['type']) && !empty($_POST['idProgramme']) && !empty($_POST['fichier']) && !empty($_POST['idUser']))
{
    //On récupère tous nos entrées de formulaire dans une variable:
    $idUser = $_POST['idUser'];
    $idProgramme = $_POST['idProgramme'];
    $typeMedia = $_POST['type'];
    $fichier = $_POST['fichier'];
    
    //Assignation d'una variable pour la connexion à la BDD:
    $db = connecBDD();
    
    //Instanciation d'un nouvel objet Media et compositionProgramme:
    $media = new Media();
    $compoProg = new CompositionProgramme();
    $programmeChoisi = new Programme();
    
    //Instanciation des manager qui vont avec:
    
    $mediaManager = new MediaManager($db);
    $compoManager = new CompositionProgrammeManager($db);
    $progManager = new ProgrammeManager($db);
    
    //On va hydrater l'objet media:
    $media->setType($typeMedia);
    $media->setType(typeFichier($typeMedia, $fichier));
    //Pour le contenu on va devoir d'abord établir une condition suivant le type d'envoi (image,lien,...)
    switch ($media->type())
    {
        case 'image':
            $media->setContenu(enregistreImage($fichier, $media->type(), $idUser));
            break;
        
        case 'lien':
            $media->setContenu($fichier);
            break;
    }
    
}
