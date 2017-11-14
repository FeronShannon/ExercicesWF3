<?php
    $email = verifierInfoEmail("email");
    $nom   = verifierInfoTexte("nom", 300);
    
    if(count($tabErreur) == 0)
    {
        $dateInscription = date("Y-m-d H:i:s");
        // J'ajoute une ligne dans la table SQL Newsletter :
        $requeteSQL =
        
<<<CODESQL
INSERT INTO Newsletter
(email, nom, dateInscription)
VALUES (:email, :nom, :dateInscription)
CODESQL;

        envoyerRequeteSQL($requeteSQL, 
                            [
                                "email"             => $email,
                                "nom"               => $nom,
                                "dateInscription"   => $dateInscription
                            ]);
        // J'affiche le message :
        echo
<<<CODEHTML
    <p class="vert">$nom ($email) est inscrit à la newsletter !</p>
CODEHTML;
    }
    else
    {
        // IL Y A DES ERREURS
        // AFFICHER LES ERREURS POUR LE VISITEUR
        afficherErreur($tabErreur);
    }
