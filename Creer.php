<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Création - Fluxxx</title>
	</head>
	<body>
		<?php include("Banniere.php"); ?>
		<div class="creer">
                    <form action="lib/TraitementCreation.php" method="post">
			<p>
                            <input type="file" name="contenu" />
			</p>
                        <p>
                            <select name="type">
                                <option value="NULL"></option>
                                <option value="image">Image</option>
                                <option value="musique">Musique</option>
                                <option value="video">Vidéo</option>
                                <option value="document">Document</option>
                                <option value="lien">Lien</option>
                            </select>
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