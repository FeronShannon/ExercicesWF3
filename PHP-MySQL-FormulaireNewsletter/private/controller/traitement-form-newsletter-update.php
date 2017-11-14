<?php
    
    $email          = verifierInfoEmail("email");
    $nom            = verifierInfoTexte("nom", 300);
    $idNewsletter   = verifierInfoNombre("idNewsletter", 1, PHP_INT_MAX);
    
    if (count($tabErreur) == 0)
    {
        // COMPLETER LES INFOS MANQUANTES
        $dateModification = date("Y-m-d H:i:s");
        
        // ET AJOUTER UNE LIGNE DANS LA TABLE SQL Newsletter
        $requeteSQL =
<<<CODESQL

UPDATE Newsletter
SET email = :email, nom = :nom, dateModification = :dateModification
WHERE idNewsletter = :idNewsletter

CODESQL;

        envoyerRequeteSQL($requeteSQL, 
                            [
                                "idNewsletter"     => $idNewsletter,
                                "email"            => $email, 
                                "nom"              => $nom, 
                                "dateModification" => $dateModification
                            ]);
                            
        // AFFICHER LE MESSAGE DE CONFIRMATION
        echo
<<<CODEHTML
    <p class="vert">La ligne $idNewsletter a été modifiée !</p>
CODEHTML;
    }
    else
    {
        // AFFICHER LES ERREURS POUR LE VISITEUR
        afficherErreur($tabErreur);
    }
