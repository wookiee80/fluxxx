<?php
    session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Meflow</title>
	</head>
	<body>
		<?php include("Banniere.php"); ?>
		<div class="liste">
			<p>Programmes :</p>
			<div id="listeprog">
                            <?php
                                if (!empty($_SESSION['idUser']))
                                {
                            ?>
                                    <div class="nouveau"><a href="CreerProgramme.php"><img src="Ressources/plus.png" class="nouv" alt="nouv" title="Nouveau"/></a></div>
                            <?php
                                }
                                else
                                {
                                    echo 'Vous n êtes pas connecté, veuillez vous inscrire ou vous connecter si vous avez déjà un compte pour pouvoir créer un programme.';
                                }
                            ?>
			</div>
		</div>
	</body>
	<footer>
		<?php include("Pied.php"); ?>
	</footer>
	
</html>