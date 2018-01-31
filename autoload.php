<?php
function chargerClasse($classe)//fonction qui inclus le fichier portant le nom de la classe voulue
{
    require 'lib/'.$classe.'.class.php';
}

//Et on enregistre la fonction dans la pile d'autoload,
//afin qu'elle soit appelée dès qu'on instancie une classe non déclarée:
spl_autoload_register('chargerClasse');
