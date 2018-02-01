<?php

class Media
{
    /***********************************/
    
    //Attributs:
    //Pour chaque attribut créé, il faut sa fonction accesseurs et sa fonction SET
    
/***********************************/
    
protected $_idMedia;
protected $_type;
protected $_contenu;


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

  public function idMedia(){      return $this->_idMedia;}
  public function type(){    return $this->_type;}
  public function contenu(){    return $this->_contenu;}
  
  
    /*******************************
   *   Mutateurs de la classe    *
   *******************************/
  
public function setIdMedia($idMedia)
{
    if(is_int($idMedia))
    {
        $this->_idMedia = $idMedia;
    }
    else
    {
        throw new Exception('Alerte de violation : Erreur sur l\'ID du média.');
    }
}

public function setType($type)
{
    // Gérer le traitement des type de fichiers envoyés pour le média
    switch ($type)
    {
    case 'image'://dans le cas d'une image
        $image = new SplFileInfo(strtolower($type));//On va lire l'extension du fichier qu'on reçoit en la passant en minuscule
        
        //Si on trouve bien les extensions d'un image
        if($image == 'jpg' || $image == 'gif' || $image == 'png' || $image == 'bmp')
        {
            //On continue notre traitement:
        }
        //Sinon on affiche une erreur:
        else {
                throw new Exception('Fichier non supporté en tant qu\'image');
             }
    }
    $this->_type = $type;
}

public function setContenu($contenu)
{
    $this->_contenu = $contenu;
}


}

