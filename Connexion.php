<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Connexion - Meflow</title>
	</head>
	<body>
		<?php include("Banniere.php"); ?>
		<div class="conn">
			<form method="POST" action="TraitementConnexion.php">
				<p>
					<label for="mailconn">Votre adresse email :</label>
                                        <input type="email" name="mailconn" id="mailconn" size="30" maxlength="30" autofocus required />
				</p>
				<p>
					<label for="mdpconn">Votre mot de passe :</label>
					<input type="password" name="mdpconn" id="mdpconn" size="30" maxlength="16" required />
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