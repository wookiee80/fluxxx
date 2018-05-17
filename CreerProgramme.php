<?php
    session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Création - Meflow</title>
	</head>
	<body>
            <?php include("Banniere.php"); ?>
		<div class="creerProgramme">
                    <form action="TraitementCreaProgramme.php" method="post">
                        <p>
                            <label for="titre">Titre du programme :</label>
                            <input type="text" name="titre" id="titre" placeholder="Max. 30" size="30" maxlength="30" autofocus required />
                        </p>
                        <p>
                            <label for="nombre">Nombre de médias :</label>
                            <input type="number" name="nombre" id="nombre" placeholder="0-50" size="30" max="50" min="0" required />
                        </p>
                        <input type="hidden" name="idutilisateur" id="idutilisateur" value="$idUser">
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