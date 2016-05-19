<?php
	// Permet l'utilisation de la session
	session_start();

	// Connexion à la base de données
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=tpchat','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


	// on vérifie que les variables existent
	if(isset($_POST['pseudo']) AND isset($_POST['message']))
	{

		//On vérifie que pseudo et message sont remplis
		if ($_POST['pseudo'] == '') {
			//On met un msg d'erreur en session, pour l'afficher depuis l'autre page
			$_SESSION['erreur'] = "Vous devez saisir votre pseudo";
		}
		elseif ($_POST['message'] == '') {
			// on stocke le pseudo en session
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['erreur'] = "Vous devez saisir un message";
		}
		else
		{
			// on stocke le pseudo en session
			$_SESSION['pseudo'] = htmlspecialchars($_POST['pseudo']);

			// on stocke le pseudo et le message dans la BDD
			$requete = $bdd->prepare('INSERT INTO conversation (pseudo, message) VALUES(?,?)');
			$requete->execute(array(htmlspecialchars($_POST['pseudo']) , htmlspecialchars($_POST['message'])));
		}
		
		
	}

	//renvoi sur la page Exo1_chat.php
	header('Location: Exo1_chat.php');
	

	?>