<?php

class UserManager
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
    
    //Fonction pour savoir si on a bien une entrée présente avec
    //le nom ou l'id passé en paramètre:
    public function userExiste($champ, $valeur)
    {
          return $this->_db->query('SELECT COUNT(*) FROM '.USERTABLE.' WHERE '.$champ.' = "'.$valeur.'"')->fetchColumn();
    }
    
    
    //Méthode pour ajouter un utilisateur :
    public function ajoutUser(User $utilisateur)
    {
        // Préparation de la requête d'insertion.
        $q = $this->_db->prepare('INSERT INTO '.USERTABLE.' (nom, prenom, email, motDePasse, droits)'
                                  . 'VALUES (:nom, :prenom, :email, :motDePasse, :droits)');
        
        //Assignation des valeurs:
        $q->bindValue(':nom', $utilisateur->nom());
        $q->bindValue(':prenom', $utilisateur->prenom());
        $q->bindValue(':email', $utilisateur->email());
        $q->bindValue(':motDePasse', $utilisateur->motDePasse());
        $q->bindValue(':droits', 'util');
        
        //Execution de la requète :
        $q->execute();
    }
    
    
    //Méthode pour mettre à jour un utilisateur dans la table :
    public function updateUtilisateur(User $utilisateur)
    {
        //Préparation de la requète de type UPDATE:
        $q = $this->_db->prepare('UPDATE '.USERTABLE.' SET'
                                 . 'nom = :nom,'
                                 . 'prenom = :prenom,'
                                 . 'email = :email,'
                                 . 'motDePasse = :motDePasse,'
                                 . 'droits = :droits'
                . 'WHERE idUser = "'.$utilisateur->idUser().'"');
        
        //Assignation des valeurs:
        $q->bindValue(':idUser', $utilisateur->idUser());
        $q->bindValue(':nom', $utilisateur->nom());
        $q->bindValue(':prenom', $utilisateur->prenom());
        $q->bindValue(':email', $utilisateur->email());
        $q->bindValue(':motDePasse', $utilisateur->motDePasse());
        $q->bindValue(':droits', $utilisateur->droits());
        
        //Execution de la requète :
        $q->execute();
    }
    
    //Méthode pour supprimer un utilisateur de la table:
    public function supprUtilisateur(User $utilisateur)
    {
        //Execute une requete de type delete
        $this->_db->exec('DELETE FROM '.USERTABLE.'WHERE id = '.$utilisateur->idUser());
    }
    
    //Méthode pour vérifier les jeu email/mot de passe
    //renvoie true si on trouve le jeu correct dans la base:
    public function verifConnexion($email, $motDePasse)
    {
        $etat = FALSE;
        // Si on trouve une entrée dans la table comportant l'email :
        if(($this->_db->query('SELECT COUNT(*) FROM '.USERTABLE.' WHERE email = "'.$email.'"')->fetchColumn()) != 0)
        {
            //On récupère les données de la ligne concernée :
            $q = $this->_db->query('SELECT * FROM '.USERTABLE.' WHERE email = "'.$email.'"');
            $donnees = $q->fetch(PDO::FETCH_ASSOC);
            if(password_verify($motDePasse, $donnees['motDePasse']) == TRUE)
            {
                $etat = TRUE;
                return $etat;
            }
            else {
                    throw new Exception('Mot de passe invalide');
                    return $etat;
                 }
        }
        else
        {
            throw new Exception('Adresse mail inconnue');
            return $etat;
        }
        
    }
    
        public function get($champ,$valeur)
    {

        $q = $this->_db->query('SELECT * FROM '.USERTABLE.' WHERE '.$champ.' = "'.$valeur.'"');
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
        
        return new User($donnees);
    }
}

