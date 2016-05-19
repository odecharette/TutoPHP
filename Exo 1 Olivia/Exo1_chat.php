<?php
	// Permet l'utilisation de la session
	session_start();
	//On initialise les variables de session, si elles n'existent pas encore
	if (!isset($_SESSION['pseudo'])) {
		$_SESSION['pseudo'] = "";
	}

	if (!isset($_SESSION['erreur'])) {
		$_SESSION['erreur'] = "";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Ceci est l'exercice N°1</title>
</head>
<body>

	<div align="center">
		<form method="POST" action="Exo1_chat_cible.php">

		<!-- Dans le formulaire, on affiche le pseudo, enregistré en session -->
			<p><label>Pseudo* : <input type="text" name="pseudo" 
				<?php 
					echo 'value="' . $_SESSION['pseudo'] . '"' 
				?> 
			></label></p>
			<p><label>Message* : <TEXTAREA name="message" rows=10 COLS=40></TEXTAREA> </label></p>
			<p><input type="submit" name="Envoyer"></p>
			
		</form>

		<!-- affichage du message d'erreur stocké en session -->
		<p style="color:red;">
		<?php 
			echo $_SESSION['erreur'];
			$_SESSION['erreur'] = "";
		?> </p>
		

	</div>


	<?php


	// connexion à la BDD
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=tpchat','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


	// Requete pour récupérer la liste des messages

	$requete = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_message,\'%d/%m/%Y à %hh%i\') AS date_message FROM conversation ORDER BY id DESC');

	// Affichage de tous les messages
	while ($data = $requete->fetch()) {
	?>
		[ <?php echo htmlspecialchars($data['date_message']); ?> ]
		<strong> <?php echo htmlspecialchars($data['pseudo']); ?> </strong>
		 : <?php echo htmlspecialchars($data['message']); ?> <br>
	<?php
	}

	$requete->closeCursor();

	?>

</body>
</html>