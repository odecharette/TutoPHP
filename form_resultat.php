<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<!-- faille XSS : user envoi du HTML javascript pour pirater le site -->

<p>
	<?php 
	// protégrer le site en nettoyant la valeur revue du formulaire
		echo 'Bonjour ' . htmlspecialchars($_POST['prenom']) ;

		if (isset($_POST['veg'])) { // un case non cochée, n'est pas envoyée dans le formulaire
			echo ' tu es végétarien.';
		}
		else{
			echo ' tu n\'est pas végétarien.';
		}
		?>
</p>
</body>
</html>