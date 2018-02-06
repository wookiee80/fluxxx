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
}

