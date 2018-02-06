<?php

class CompositionProgrammeManager
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
    
    //Méthode pour ajouter une composition:
    public function ajoutCompo(CompositionProgramme $compo)
    {
        // Préparation de la requête d'insertion.
        $q = $this->_db->prepare('INSERT INTO '.COMPOTABLE.' (idProgramme, idMedia, ordreMedia, dureeMedia) VALUES (:idProgramme, :idMedia, :ordreMedia, :dureeMedia)');
        //Assignation des valeurs:
        $q->bindValue(':idProgramme',$compo->idProgramme());
        $q->bindValue(':idMedia',$compo->idMedia());
        $q->bindValue(':ordreMedia',$compo->ordreMedia());
        $q->bindValue(':dureeMedia',$compo->dureeMedia());
        
        //Execution de la requète :
        $q->execute();
    }
    
    
    //Méthode pour modifier une compo de programme :
    public function updateCompo(CompositionProgramme $compo)
    {
        //Préparation de la requète de type UPDATE:
        $q = $this->_db->prepare('UPDATE '.COMPOTABLE.' SET idProgramme = :idProgramme, idMedia = :idMedia, ordreMedia = :ordreMedia, dureeMedia = :dureeMedia'
                                . ' WHERE idMedia = "'.$compo->idMedia().'" AND idProgramme = "'.$compo->idProgramme().'"');
        
        //Assignation des valeurs:
        $q->bindValue(':idProgramme',$compo->idProgramme());
        $q->bindValue(':idMedia',$compo->idMedia());
        $q->bindValue(':ordreMedia',$compo->ordreMedia());
        $q->bindValue(':dureeMedia',$compo->dureeMedia());
        
        //Execution de la requète :
        $q->execute();
    }
    
    
    //Méthode pour supprimer une compo:
    public function supprCompo(CompositionProgramme $compo)
    {
        //Execute une requete de type delete
        $this->_db->exec('DELETE FROM '.COMPOTABLE.' WHERE idMedia = "'.$compo->idMedia().'" AND idProgramme = "'.$compo->idProgramme().'"');
    }
}

