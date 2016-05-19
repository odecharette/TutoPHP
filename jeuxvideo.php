<?php

// le 3ème paramètre est pour le MDP
// Le dernier param permet de mieux afficher les msg d'erreurs SQL
$bdd = new PDO('mysql:host=localhost;dbname=tpphp','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$reponse = $bdd->query('SELECT nom, console FROM jeux_video WHERE console="NES"');

// fetch() récupère une ligne de la table
while($data = $reponse->fetch())
{
	// afficher la colonne nom
	echo '<p>' . $data['nom'] . ' - ' . $data['console'] . '</p>';
}

echo '<p>*************</p>';

if (isset($_GET['console'])) {
	// préparer la requete et la compléter avec un paramètre dynamique
	$requete = $bdd->prepare('SELECT nom, console FROM jeux_video WHERE console=?');
	$requete->execute(array($_GET['console']));

	while($data = $requete->fetch())
	{
		// afficher la colonne nom
		echo '<p>' . $data['nom'] . ' - ' . $data['console'] . '</p>';
	}
}


echo '<p>*************</p>';

$requete = $bdd->prepare('INSERT INTO jeux_video(nom, possesseur, console,commentaires) VALUES(?,?,?,"ceci est un test")');
$requete->execute(array($_GET['nom'], $_GET['possesseur'], $_GET['console']));

?>