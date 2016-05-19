<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Mon blog</title>
	<link rel="stylesheet" href="tp_blog.css">
</head>
<body>

	<h1>Mon super blog !</h1>

	<a href="tp_blog.php">Retour à la liste des billets</a>

	<?php

		if(isset($_GET['article_id']))
		{
			$article_id = (int)$_GET['article_id'];

			try{
				$bdd = new PDO('mysql:host=localhost;dbname=tpblog','root','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			}
			catch(Exception $e)
			{
			    die('Erreur : '.$e->getMessage());
			}


			$requete = $bdd->prepare('SELECT id, titre, DATE_FORMAT(date_post, \'%d/%m/%Y à %hh%imin%ss\') AS date_post, contenu FROM billet WHERE id=?');
			$requete->execute(array($article_id));

			while ($data = $requete->fetch()) {
				echo '<div class="news"><h3>' . $data['titre'] . ' <i>Le ' . $data['date_post'] . '</i></h3><p>' . $data['contenu'] . '</p></div>' ;
			}

			echo '<h1>Commentaires</h1>';

			$requete = $bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %hh%i\') AS date_commentaire FROM commentaire WHERE billet_id=?');
			$requete->execute(array($article_id));

			while ($data = $requete->fetch()) {
				echo '<p><strong>' . $data['auteur'] .'</strong> le ' . $data['date_commentaire'] . '<br>' . $data['commentaire'] . '</p>';
			}
		}
		else
		{
			echo 'Aucun article sélectionné';
		}

	?>

</body>
</html>