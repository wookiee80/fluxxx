<?php
    session_start();
?>
<!DOCTYPE>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="Style.css" />
		<title>Fluxxx</title>
	</head>
	<body>
		<?php include("Banniere.php"); ?>
		<div class="liste">
			<p>Programmes :</p>
			<div id="listeprog">
                            <a href="Programme1.php"><div class="programme"><img src="Ressources/Programme1.jpg" class="prg1" alt="prg1" title="Programme1" /></div></a>
                            <a href="Programme2.php"><div class="programme"><img src="Ressources/Programme2.jpg" class="prg2" alt="prg2" title="Programme2" /></div></a>
                            <a href="Programme3.php"><div class="programme"><img src="Ressources/Programme3.jpg" class="prg3" alt="prg3" title="Programme3" /></div></a>
                            <a href="Programme4.php"><div class="programme"><img src="Ressources/Programme4.jpg" class="prg4" alt="prg4" title="Programme4" /></div></a>
                            <div class="programme"><img src="Ressources/Programme5.jpg" class="prg5" alt="prg5" title="Programme5" /></div>
                            <div class="programme"><img src="Ressources/Programme6.jpg" class="prg6" alt="prg6" title="Programme6" /></div>
                            <div class="programme"><img src="Ressources/Programme7.jpg" class="prg7" alt="prg7" title="Programme7" /></div>
                            <div class="programme"><img src="Ressources/Programme8.jpg" class="prg8" alt="prg8" title="Programme8" /></div>
			</div>
		</div>
		<div class="creation">
			<a href="Creer.php"><p>Nouveau +</p></a>
		</div>
            bonjour
	</body>
	<footer>
		<?php include("Pied.php"); ?>
	</footer>
	
</html>