<?php 

$age = 30;
$message = "bonjour";
$adulte = true;

echo $message . ' Olivia, tu as ' . $age . ' ans';

// conditions

if($age <= 15) // == != > < 
{
	echo "Salut petit";
}
else
{
	echo "Salut grand";
}

if($adulte AND $age==30) // !$adulte	// OR || AND &&
{
	echo "bonjour adulte, tu as 30 ans.";
}


if($adulte)
{
	?>

	<P>Tu es adulte</P>

	<?php
}

switch ($age) {
	case 10:
		echo 'tu as 10 ans';
		break;
	case 18:
		echo 'tu as 18 ans';
		break;
	default:
		echo 'tu n\'as ni 18 ni 10 ans';
		break;
}

// version courte du if !
$majeur = ($age >= 18) ? true : false;

// boucles

$repetition = 1;

while ($repetition <= 10) {
	echo "<br> tour N° " . $repetition;
	$repetition ++;
}


for ($i=1; $i <= 10; $i++) { 
	echo "<br> tour N° " . $i;
}

// fonctions

$phrase = "Bonjour je suis une phrase.";

echo '<p>La phrase contient ' . strlen($phrase) . ' caractères</p>';

echo date('d') . '/' . date('m') . '/' . date('Y');

$heure = date('H');
$minute = date('i');


function direBonjour($prenom)
{
	echo '<p>Bonjour ' . $prenom . ' !</p>';
}

direBonjour('Olivia');


// Les tableaux

$prenoms[0] = 'Olivia';
$prenoms[1] = 'Marie';
$prenoms[2] = 'Paul';

$prenomsBis = array('Teo', 'Paul', 'Sophie');

echo $prenoms[1];

echo print_r($prenoms); // Affiche le contenu du tableau pour du debug

echo "<br><br>";

$personne = array('Nom' => 'de Charette', 'Prenom' => 'Olivia', 'Age' => 30);	// on donne un titre aux colonnes du tableau
print_r($personne);


for ($i=0; $i < 3; $i++) { 
	echo '<p>' . $prenoms[$i] . '</p>';
}

foreach ($personne as $titre => $contenu) {
	echo '<p>' . $titre . ' : ' . $contenu . '</p>';
}

$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

if (array_key_exists('nom', $coordonnees))
{
    echo 'La clé "nom" se trouve dans les coordonnées !';
}

if (array_key_exists('pays', $coordonnees))
{
    echo 'La clé "pays" se trouve dans les coordonnées !';
}

$fruits = array ('Banane', 'Pomme', 'Poire', 'Cerise', 'Fraise', 'Framboise');

if (in_array('Myrtille', $fruits))
{
    echo 'La valeur "Myrtille" se trouve dans les fruits !';
}

if (in_array('Cerise', $fruits))
{
    echo 'La valeur "Cerise" se trouve dans les fruits !';
}

?>