<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=tpchat','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


	if(isset($_POST['pseudo']) AND isset($_POST['message']))
	{
		$requete = $bdd->prepare('INSERT INTO conversation (pseudo, message) VALUES(?,?)');
		$requete->execute(array(htmlspecialchars($_POST['pseudo']) , htmlspecialchars($_POST['message'])));
	}

	//renvoi sur la page tp2chat.php
	header('Location: tp2chat.php');
	

	?>