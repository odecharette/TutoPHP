<?php

include_once('membre.class.php');

// Créer un objet : instance de la classe Membre
$robert = new Membre('Robert');

echo $robert->getPseudo();

$robert->setPseudo('Gerard');

echo $robert->getPseudo();

$robert->bannir();

?>