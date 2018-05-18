<?php
    session_start();
    include 'fonctions.php';
  
    if (!empty($_POST['mailconn']) && !empty($_POST['mdpconn'])) //Si les champs sont remplis, continuer
    {   
        $mail = htmlspecialchars($_POST['mailconn']);
        $mdp = htmlspecialchars($_POST['mdpconn']);
      
        //On continue le traitement    
        $db = connecBDD();
      
        $util = new UserManager($db);
        if (($util->verifConnexion($mail, $mdp) == TRUE)) //Si verifConnexion est à 1, connecter et renvoyer à la page d'accueil
        {
            $utilisateur =new User();
            $utilisateur =$util->get('email', $mail);
            
            echo 'Vous etes connecte';
            $_SESSION['idUser'] = $utilisateur->idUser();
            $_SESSION['nom'] = $utilisateur->nom();
            $_SESSION['prenom'] = $utilisateur->prenom();
            $_SESSION['email'] = $utilisateur->email();
            header('Location: accueil.php');
            exit();
        }
        else //Sinon, renvoyer au formulaire avec message "L'email ou le mot de passe n'est pas valide."
        {
            header('Location: Connexion.php');
            exit();
        }
    }
    else //Sinon, renvoyer au formulaire avec message "Tout les champs doivent être remplis."
    {
        header('Location: Connexion.php');
        exit();
      
    }
?>

<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Validation - Meflow</title>
	</head>
        <body>
            
        </body>
</html>