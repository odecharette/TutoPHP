<!DOCTYPE html>
<html>
<head>
	<title>Mon TP N°1</title>
</head>
<body>

<?php

	if (isset($_POST['mdp'])) {
		if (htmlspecialchars($_POST['mdp']) == 'kangourou') {
			echo '<h1>Bravo ! </h1>';
			echo '<p>	Voici le code : 1234</p>';
		}
		else
			echo '<h1>Mauvais MDP ! </h1>';
	}

?>

	

</body>
</html>