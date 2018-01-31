<?php

class Programme
{
    protected $_idProgramme;
    protected $_titreProgramme;
    protected $_idUser;
    protected $_nombreMedia;
    
        /**************************************/

//constructeur:
    
/**************************************/
    public function __construct($donnees = array())
    {
        if(!empty($donnees))
        {
              $this->hydrate($donnees);
        }
    }
    
    
    //Son role est d'hydrater un objet avec les infos contenues dans la table.
    // On hydrate grace aux setter de la classe.
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)//on créé une boucle qui va parcourir le tableau passé en paramètre.
        {
            /* On sait que les setter sont construits comme ceci:
             * - set + nom de l'attribut avec sa 1ère lettre en majuscule
             * Donc ici $method est instancié de cette manière
             */
            $method = 'set'.ucfirst($key);
            
            // Si la methode existe bien dans la classe
            if(method_exists($this, $method))
            {
                //Alors on appelle la méthode et de se fait on hydrate l'objet avec la valeur contenue dans la table
                $this->$method($value);
            }
        }
    }
    
    
    /******************************
     *           Accesseurs       *
     ******************************/
    
  public function idProgramme(){         return $this->_idProgramme;}
  public function titreProgramme(){      return $this->_titreProgramme;}
  public function idUser(){    return $this->_idUser;}
  public function nombreMedia(){    return $this->_nombreMedia;}
  
  
      /******************************
     *           Accesseurs       *
     *******************************/
  
  public function setIdProgramme($idProgramme)
  {
      if(is_int($idProgramme))
      {
          $this->_idProgramme = $idProgramme;
      }
 else {
          throw new Exception('Violation de droit : ID du programme ne convient pas !');
      }
  }
  
  public function setTitreProgramme($titreProgramme)
  {
      if(strlen($titreProgramme) <= 20)
      {
          $this->_titreProgramme = $titreProgramme;
      }
 else {
          throw new Exception('Le titre du programme ne doit pas dépasser 20 caractères');
      }
  }
  
  public function setIdUser($iduser)
  {
      if(is_int($iduser))
      {
          $this->_idUser = $iduser;
      }
 else {
          throw new Exception('Violation de droit : ID de l\'utilisateur ne convient pas !' );
      }
  }
  
  public function setNombreMedia($nombreMedia)
  {
      if(is_int($nombreMedia))
      {
          $this->_nombreMedia = $nombreMedia;
      }
      else
      {
          throw new Exception('Erreur de type : Champ INT attendu !');
      }
  }
}

