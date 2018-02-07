<?php
include 'fonctions.php';

if(!empty($_POST['idProgramme']) && !empty($_POST['idUser']))
{
  $idUser = $_POST['idUser'];
  $idProgramme = $_POST['idProgramme'];
  
  $db = connecBDD();
  
  $programme = new Programme;
  
  $programmeManager = new ProgrammeManager($db);
  
 $programme = $programmeManager->getProgramme('idProgramme', $idProgramme);
  
  if($programme->idUser() == $idUser)
  {
      $formAjoutMedia = '<form method = "POST" action = "traitementAjoutMedia.php"'
              . '<p>
                            <input type="file" name="ficher" id="fichier" />
			</p>
                        <p>
                            <select name="type">
                                <option value="NULL"></option>
                                <option value="image">Image</option>
                                <option value="musique">Musique</option>
                                <option value="video">Vidéo</option>
                                <option value="document">Document</option>
                            </select>
                        </p>
			<p>
                            <input type="hidden" id="idProgramme" value ="'.$programme->idProgramme().'"/>
                            <input type = "hidden" id = "idUser" value = "'.$programme->idUser().'"/>
                            <input type="submit" name="Creer" id="creer" />
			</p>'
              . '</form>';
  }
  else
  {
      header('location: index.php');
  }
  
}
else
{
    header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Style.css" />
        <title>Modification - <?php echo $programme->titreProgramme(); ?></title>
    </head>
    <body>
        <?php include("Banniere.php"); ?>
		<div class="insc">
                       <?php echo $formAjoutMedia;?>
		</div>
    </body>
    	<footer>
		<?php include("Pied.php"); ?>
	</footer>
</html>

