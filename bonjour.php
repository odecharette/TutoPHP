<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<p>
	<?php if (isset($_GET['prenom']) AND isset($_GET['nom'])) // Toujours vérifier que l'URL lue est correcte sinon gros risque de sécurité
	{

		$agesaisie = (int) $_GET['age']; // on force la conversion en int au cas ou user a mis autre chose

		echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' ton age : ' . $agesaisie;
	}
	else
		echo 'Ne touche pas à mon URL !!!';
	?>
</p>

</body>
</html>