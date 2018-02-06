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
        if (($util->verifConnexion($mail, $mdp) == 1)) //Si verifConnexion est à 1, connecter et renvoyer à la page d'accueil
        {
            echo 'Vous etes connecte';
            $_SESSION['idUser'] = '1';
            $_SESSION['nom'] = 'Dupont';
            $_SESSION['prenom'] = 'Jean';
            $_SESSION['email'] = 'JeanDupont@gmail.com';
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
		<title>Validation - Fluxxx</title>
	</head>
        <body>
            
        </body>
</html>