<!DOCTYPE html>
<html>
<head>
	<title>Ceci est mon TP N° 2</title>
</head>
<body>

	<form method="POST" action="tp2chat_cible.php">

		<p><label>Pseudo : <input type="text" name="pseudo"></label></p>
		<p><label>Message : <TEXTAREA name="message" rows=10 COLS=40></TEXTAREA> </label></p>
		<p><input type="submit" name="Envoyer"></p>
		
	</form>



	<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=tpchat','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


	$requete = $bdd->query('SELECT pseudo, message FROM conversation ORDER BY id DESC LIMIT 10');

	while ($data = $requete->fetch()) {
		echo '<strong>' . $data['pseudo'] . '</strong> : ' . $data['message'] . '<br>';
	}

	$requete->closeCursor();

	?>




</body>
</html>