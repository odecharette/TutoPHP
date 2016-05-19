<?php

class Membre
{
		// les variables sont privées : donc utilisable uniquement dans la class membre
	private $pseudo;
	private $email;
	private $actif;

	// fonction constructeur
	// appelée autolatiquement lors de l'instanciation d'un membre
	public function __construct($pseudo)
	{
		$this->pseudo = $pseudo;
		$this->actif = true;
	}


	// fonction accesseur = lire
	public function getPseudo()
	{
		return $this->pseudo;
	}

	// fonc mutateur = modifier
	public function setPseudo($p)
	{
		$this->pseudo = $p;
	}

	public function bannir()
	{
		$this->actif = false;
	}

	public function debannir()
	{
		$this->actif = true;
	}



}


?>