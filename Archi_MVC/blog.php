<?php

include_once('modele/connexion_sql.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('controleur/blog/index.php');
}



/*
Pour accéder à la page d'accueil du blog, il suffit maintenant d'ouvrir la page blog.php !

L'avantage de cette page est aussi qu'elle permet de masquer l'architecture de votre site au visiteur. Sans elle, ce dernier aurait dû aller sur la page controleur/blog/index.php pour afficher votre blog. Cela aurait pu marcher, mais aurait probablement créé de la confusion chez vos visiteurs, en plus de complexifier inutilement l'URL.
*/