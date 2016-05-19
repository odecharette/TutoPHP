<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>

		<form action="form_resultat.php" method="POST">
		<!-- méthode POST n'envoi pas les paramètres dans l'URL -->

			<p><label>Prénom : <input type="text" name="prenom"></label></p>
			<p><label>Es-tu veggie ? <input type="checkbox" name="veg"></label> </p>
			<input type="submit" name="Envoyer">
			
		</form>

	</body>
</html>