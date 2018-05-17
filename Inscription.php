<?php
    session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Inscription - Meflow</title>
	</head>
	<body>
		<?php include("Banniere.php"); ?>
		<div class="insc">
			<form method="POST" action="TraitementInscription.php">
				<p>
					<label for="prenom">Votre prénom :</label>
					<input type="text" name="prenom" id="prenom" placeholder="Max. 30" size="30" maxlength="30" autofocus required />
				</p>
				<p>
					<label for="nom">Votre nom :</label>
					<input type="text" name="nom" id="nom" placeholder="Max. 30" size="30" maxlength="30" required />
				</p>
				<p>
					<label for="mail">Votre adresse email :</label>
					<input type="email" name="mail" id="mail" placeholder="Max. 30" size="30" maxlength="30" required />
				</p>
				<p>
					<label for="mdp">Votre mot de passe :</label>
                                        <input type="password" name="mdp" id="mdp" placeholder="Min. 6 - Max. 20" size="30" maxlength="20" minlength="6" required />
				</p>
				<p>
					<input type="submit" name="envoyer" id="envoyer" />
				</p>
				<p>
					<input type="reset" name="effacer" id="effacer" />
				</p>
			</form>
		</div>
	</body>
	<footer>
		<?php include("Pied.php"); ?>
	</footer>
</html>