<?php
    session_start();
    include 'fonctions.php';
  
    if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['mdp'])) //Si les champs sont remplis, continuer
    {   
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = htmlspecialchars($_POST['mdp']);
      
        //On continue le traitement
        $user = new User();
      
        $user->setPrenom($prenom);
        $user->setNom($nom);
        $user->setEmail($mail);
        $user->setMotDePasse($mdp);
      
        $db = connecBDD();
      
        $util = new UserManager($db);
        if (($util->userExiste('email', $mail) == 1)) //Si l'email existe, renvoyer au formulaire avec message "L'email existe déjà."
        {
            header('Location: Inscription.php');
            exit();
        }
        else //Sinon, ajouter le compte et renvoyer à la page d'accueil
        {
            $util->ajoutUser($user);
            header('Location: accueil.php');
            exit();
        }
              
    }
    else //Sinon, renvoyer au formulaire avec message "Tout les champs doivent être remplis."
    {
        header('Location: Inscription.php');
        exit();
    }
 
?>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Validation - Fluxxx</title>
	</head>
	<body>

	</body>

</html>