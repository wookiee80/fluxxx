<?php

class ProgrammeManager
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
    
    //Méthode pour ajouter un programme :
    public function ajoutProgramme(Programme $programme)
    {
        // Préparation de la requête d'insertion.
        $q = $this->_db->prepare('INSERT INTO '.PROGRAMMETABLE.' (idUser, titreProgramme, nombreMedia)'
                                  . 'VALUES (:idUser, :titreProgramme, :nombreMedia)');
        
        //Assignation des valeurs:
        $q->bindValue(':titreProgramme', $programme->titreProgramme());
        $q->bindValue(':nombreMedia', $programme->nombreMedia());
        $q->bindvalue(':idUser', $programme->idUser());
        
        //Execution de la requète :
        $q->execute();
    }
    
    
    //Méthode pour mettre à jour un programme dans la table :
    public function updateProgramme(Programme $programme)
    {
        //Préparation de la requète de type UPDATE:
        $q = $this->_db->prepare('UPDATE '.PROGRAMMETABLE.' SET'
                                 . 'titreProgramme = :titreProgramme,'
                                 . 'nombreMedia = :nombreMedia,'
                . 'WHERE idProgramme = "'.$programme->idProgramme().'"');
        
        //Assignation des valeurs:
        $q->bindValue(':idUser', $programme->idUser());
        $q->bindValue(':titreProgramme', $programme->titreProgramme());
        $q->bindValue(':nombreMedia', $programme->nombreMedia());
        
        //Execution de la requète :
        $q->execute();
    }
    
    //Méthode pour supprimer un utilisateur de la table:
    public function supprProgramme(Programme $programme)
    {
        //Execute une requete de type delete
        $this->_db->exec('DELETE FROM '.PROGRAMMETABLE.'WHERE id = '.$programme->idUser());
    }
}
