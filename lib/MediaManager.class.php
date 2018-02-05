<?php

class MediaManager
{
     protected $_db;
    
    
    //Constructeur:
    public function __construct($db) {
        $this->setDb($db);
    }
    
    
    //Pas besoin de getter mais juste un setter, car on ne demandera jamais d'afficher les identifiants de connexion:
    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
    
    //Méthode pour ajouter un média:
    public function ajoutMedia(Media $media)
    {
        // Préparation de la requête d'insertion.
        $q = $this->_db->prepare('INSERT INTO '.MEDIATABLE.' (type, contenu) VALUES (:type, :contenu)');
        //Assignation des valeurs:
        $q->bindValue(':type',$media->type());
        $q->bindValue(':contenu',$media->contenu());
        
        //Execution de la requète :
        $q->execute();
    }
    
    //Méthode pour modifier un média :
    public function updateMedia(Media $media)
    {
        //Préparation de la requète de type UPDATE:
        $q = $this->_db->prepare('UPDATE '.MEDIATABLE.' SET type = :type, contenu = :contenu WHERE idMedia = "'.$media->idMedia().'"');
        
        //Assignation des valeurs:
        $q->bindValue(':type',$media->type());
        $q->bindValue(':contenu',$media->contenu());
        
        //Execution de la requète :
        $q->execute();
    }
    
    //Méthode pour supprimer un media:
    public function supprMedia(Media $media)
    {
        //Execute une requete de type delete
        $this->_db->exec('DELETE FROM '.MEDIATABLE.' WHERE idMedia = "'.$media->idMedia().'"');
    }
    
    //Méthode pour récupérer un média dans la table :
    public function getMedia($champ, $valeur)
    {
        $q = $this->_db->query('SELECT * FROM '.MEDIATABLE.' WHERE '.$champ.' = "'.$valeur.'"');
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        $media = new Media;
        
        $media->setIdMedia(intval($donnees['idMedia']));
        $media->setType($donnees['type']);
        $media->setContenu($donnees['contenu']);
        
        return $media;
    }
}

