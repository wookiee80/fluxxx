<?php
include 'fonctions.php';

$db = connecBDD();

$manager = new UserManager($db);

$utilisateur = $manager->get('email', 'toto@gmail.com');

var_dump($utilisateur);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    </body>
</html>
