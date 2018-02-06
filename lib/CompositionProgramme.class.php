<?php

class CompositionProgramme
{
    protected $_idProgramme;
    protected $_idMedia;
    protected $_ordreMedia;
    protected $_dureeMedia;
    
    
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
    
        /*****************************
     *  Accesseurs de la classe  *
     *****************************/
    
public function idProgramme(){      return $this->_idProgramme;}
public function idMedia(){    return $this->_idMedia;}
public function ordreMedia(){    return $this->_ordreMedia;}
public function dureeMedia(){    return $this->_dureeMedia;}


  /*******************************
   *   Mutateurs de la classe    *
   *******************************/

public function setIdProgramme($idProgramme)
{
    $this->_idProgramme = $idProgramme;
}

public function setIdMedia($idMedia)
{
    $this->_idMedia = $idMedia;
}

public function setOrdreMedia($ordtreMedia)
{
    $this->_ordreMedia = $ordtreMedia;
}

public function setDureeMedia($dureeMedia)
{
    $this->_dureeMedia = $dureeMedia;
}


}

