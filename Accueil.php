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
                            <?php include("liste.php"); ?>
                            <div class="nouveau"><a href="CreerProgramme.php"><img src="Ressources/plus.png" class="nouv" alt="nouv" title="Nouveau"/></a></div>
			</div>
		</div>
	</body>
	<footer>
		<?php include("Pied.php"); ?>
	</footer>
	
</html>