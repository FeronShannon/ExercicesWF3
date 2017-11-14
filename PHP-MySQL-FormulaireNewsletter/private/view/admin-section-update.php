<section>
    <h3>Section UPDATE</h3>
    
    
<?php
// SI ON VEUT AJOUTER UNE COLONNE DYNAMIQUEMENT
// IL Y A LA REQUETE SQL ALTER TABLE
// ALTER TABLE  `Newsletter` ADD  `dateModification` DATETIME NOT NULL ;
$idNewsletter = verifierInfoNombre("idNewsletter", 1, PHP_INT_MAX);
if($idNewsletter > 0)
{
    // ON VA RECUPERER LES AUTRES INFOS A PARTIR DE idNewsletter
    $requeteSQL =
<<<CODESQL
SELECT * FROM Newsletter
WHERE idNewsletter = :idNewsletter
CODESQL;
    $tabResultat = envoyerRequeteSQL($requeteSQL, [ "idNewsletter" => $idNewsletter ]);
    
    foreach($tabResultat as $tabLigne)
    {
        $tabLigne = array_map("htmlentities", $tabLigne);
        extract($tabLigne);
    }
    
    // Est-ce que idNewsletter correspond a une ligne dans la table SQL
    if(!empty($tabLigne))
    {
    echo
<<<CODEHTML
    <form>
        <input type="email" name="email" value="$email">
        <input type="text" name="nom" value="$nom">
        <button>Modifier</button>
        <input type="hidden" name="idNewsletter" value="$idNewsletter">
        <input type="hidden" name="section" value="update">
        <input type="hidden" name="codebarre" value="newsletter-update">
        
        <div class="response">
CODEHTML;
        if (isset($_REQUEST["codebarre"]) && ($_REQUEST["codebarre"] == "newsletter-update"))
            {
                require_once("private/controller/traitement-form-newsletter-update.php");
            }
        echo
<<<CODEHTML
        </div>
    </form>
CODEHTML;
    }
    else {
        // Erreur :
        echo "Erreur : $idNewsletter n'existe pas !";
    }
}

?>
    
</section>