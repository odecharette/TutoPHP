<?php
function get_billets($offset, $limit)
{
    global $bdd;
    $offset = (int) $offset;
    $limit = (int) $limit;
        
    $req = $bdd->prepare('SELECT id, titre, contenu, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets ORDER BY date_creation DESC LIMIT :offset, :limit');
    $req->bindParam(':offset', $offset, PDO::PARAM_INT);
    $req->bindParam(':limit', $limit, PDO::PARAM_INT);
    $req->execute();
    $billets = $req->fetchAll();
    
    
    return $billets;
}

/*
Vous noterez que ce fichier PHP ne contient pas la balise de fermeture ?>. Celle-ci n'est en effet pas obligatoire, comme je vous l'ai dit plus tôt dans le cours. Je vous recommande de ne pas l'écrire surtout dans le modèle et le contrôleur d'une architecture MVC. Cela permet d'éviter de fâcheux problèmes liés à l'envoi de HTML avant l'utilisation de fonctions comme setCookie qui nécessitent d'être appelées avant tout code HTML.
*/