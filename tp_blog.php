<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mon blog</title>
	<link rel="stylesheet" href="tp_blog.css">
</head>
<body>

	<h1>Mon super blog !</h1>

	<p>Derniers billets du blog : </p>

	<?php

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=tpblog','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}


	$requete = $bdd->query('SELECT id, titre, DATE_FORMAT(date_post, \'%d/%m/%Y à %hh%imin%ss\') AS date_post, contenu FROM billet');

	while ($data = $requete->fetch()) {
		echo '<div class="news"><h3>' . $data['titre'] . ' <i>Le ' . $data['date_post'] . '</i></h3><p>' . $data['contenu'] . '<br><a href="tp_blog_commentaire.php?article_id=' . $data['id'] .'"><i>Commentaires</i></a></p></div>' ;
	}


	?>



</body>
</html>


