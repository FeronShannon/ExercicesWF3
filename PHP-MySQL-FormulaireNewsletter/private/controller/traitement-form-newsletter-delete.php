<?php

    // SECURITE
    // IL FAUT BIEN AVOIR VERIFIE SI LE VISITEUR A LE NIVEAU SUFFISANT
    // AVANT DE SUPPRIMER LE LIGNE

    $idNewsletter = verifierInfoNombre("idNewsletter", 1, PHP_INT_MAX);
    $nom          = verifierInfoTexte("nom", 300);
    
    if (count($tabErreur) == 0)
    {

        $requeteSQL =
// Je supprime une ligne dans la table SQL Newsletter :
<<<CODESQL
DELETE FROM Newsletter
WHERE idNewsletter = :idNewsletter
CODESQL;
    envoyerRequeteSQL($requeteSQL, 
                            [ 
                                "idNewsletter" => $idNewsletter, 
                            ]);
        
        // J'affiche le message de confirmation de la supp de la ligne :
        echo
<<<CODEHTML
    <p class="supp">La ligne $idNewsletter a été supprimée (Nom : $nom) !</p>
CODEHTML;


    }
    else
    {
        afficherErreur($tabErreur);
    }

?>