<?php

class User
{
 /***********************************/
    
    //Attributs:
    //Pour chaque attribut créé, il faut sa fonction accesseurs et sa fonction SET
    
/***********************************/
    
    protected $_idUser;
    protected $_nom;
    protected $_prenom;
    protected $_email;
    protected $_motDePasse;
    protected $_droits;
    
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
    
    /********************************************************/
    
    //Accesseurs (getters):
    //Pour chaque attribut créé,
    // il faut sa fonction accesseurs et sa fonction SET

/********************************************************/
    
public function idUser(){    return $this->_idUser;}
public function nom(){    return $this->_nom;}
public function prenom(){    return $this->_prenom;}
public function email(){    return $this->_email;}
public function motDePasse(){    return $this->_motDePasse;}
public function droits(){    return $this->_droits;}


    /***********************************/
    
    //Mutateurs (setters):
    
/***********************************/

public function setIdUser($idUser)
{
    if(is_int($idUser))
    {
        $this->_idUser = $idUser;
    }
 else {
        throw new Exception('l\'identifiant doit être de type nombre');
    }

}

public function setNom($nom)
{
    if(strlen($nom) <= 30)//test de la longueur du nom
    {
        $this->_nom = $nom;
    }
 else {
        throw new Exception('Le champ nom ne doit pas dépasser 30 caractères');
    }
}

public function setPrenom($prenom)
{
    if(strlen($prenom) <= 30)// test de la longueur du prénom
    {
        $this->_prenom = $prenom;
    }
 else {
        throw new Exception('Le champ Prénom ne doit pas dépasser 30 caractères');
    }
}

public function setEmail($email)
{
    if(filter_var($email,FILTER_VALIDATE_EMAIL))// test de la validité de l'adresse mail
    {
        $this->_email = $email;
    }
 else {
        throw new Exception('Format de l\'adresse email non valide');
    }
}

public function setMotDePasse($motDePasse)
{
    if(strlen($motDePasse) >=6 && strlen($motDePasse) <= 16)// test de la longueur du mot de passe
    {
        if(preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])#', $motDePasse))// puis test de la complexité
        {
            $this->_motDePasse = password_hash($motDePasse, PASSWORD_BCRYPT);//Si c'est ok on crypt le mot de passe 
        }
    }
 else {
        throw new Exception('Le mot de passe doit faire entre 6 et 16 caractères, et doit comporter chiffre majuscule et minuscule');
    }
}

public function setDroits($droits)
{
    if($droits=='adm' || $droits=='util')//Test du contenu de la variable
    {
        $this->_droits = $droits;
    }
 else {
        throw new Exception('Violation de droits');
    }
}

}