<?php
// ON VA RECUPERER UNE INFO DU FORMULAIRE
// ET ON VA VERIFIER SI L'INFO A BIEN UN FORMAT D'EMAIL
function verifierInfoEmail ($nameInput)
{
    // IL FAUT CREER LA VARIABLE GLOBALE AVANT D'APPELER LA FONCTION
    global $tabErreur;
    
    // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
    // ET EFFECTUER QUELQUES FILTRES... 
    $email = verifierInfo($nameInput);
    
    // TEST DE VALIDITE
    if ($email == "")
    {
        // ERREUR
        $tabErreur[] = "Champ email vide !";
    }

    // http://php.net/manual/fr/function.mb-strlen.php
    if (mb_strlen($email) > 1000)
    {
        // ERREUR
        $tabErreur[] = "Email trop long !";
    }

    // EST-CE QUE L'EMAIL A UN FORMAT VALIDE
    // http://php.net/manual/fr/function.filter-var.php
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false)
    {
        // ERREUR
        $tabErreur[] = "Email invalide !";
    }
    return $email;
}

// ON VA RECUPERER UNE INFO DU FORMULAIRE
// ET ON VA VERIFIER SI L'INFO NE DEPASSE PAS UNE LONGUEUR MAX
function verifierInfoTexte ($nameInput, $longueurMax)
{
    // IL FAUT CREER LA VARIABLE GLOBALE AVANT D'APPELER LA FONCTION
    global $tabErreur;
    
    // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
    // ET EFFECTUER QUELQUES FILTRES... 
    $texte = verifierInfo($nameInput);
    
    // TEST DE VALIDITE
    if ($texte == "")
    {
        // ERREUR
        $tabErreur[] = "($nameInput) TEXTE VIDE";
    }

    // http://php.net/manual/fr/function.mb-strlen.php
    if (mb_strlen($texte) > $longueurMax)
    {
        // ERREUR
        $tabErreur[] = "($nameInput) TEXTE TROP LONG";
    }
    
    return $texte;
}

// ON VA RECUPERER UNE INFO DU FORMULAIRE
// ET JE LE STOCKE DANS LA VARIABLE GLOBALE $tabColonneInfo
function verifierInfo ($nameInput)
{
    // IL MANQUE ENCORE UN TEST POUR VERIFIER SI L'INFO EST BIEN PRESENTE...
    // TODO
    
    // $valueInput EST UNE VARIABLE LOCALE
    // QUI CONTIENT CE QUE LE VISITEUR A ENVOYE AVEC LE FORMULAIRE
    // SI LE FORMULAIRE CONTIENT BIEN L'INFO
    if (isset($_REQUEST[$nameInput]))
    {
        // ALORS JE LA RECUPERE
        $valueInput = $_REQUEST[$nameInput];
    }
    else
    {
        // SINON, ON MET LA CHAINE VIDE COMME VALEUR PAR DEFAUT
        $valueInput = "";
    }
    // FILTRER LES MAUVAISES INFOS
    
    // ATTENTION: MODE PARANO
    // L'ORDRE DES FILTRES EST IMPORTANT
    
    // ENLEVER LES BALISES HTML ET PHP
    // http://php.net/manual/fr/function.strip-tags.php
    $valueInput = strip_tags($valueInput);

    // ENLEVER LES ESPACES AU DEBUT ET A LA FIN
    // http://php.net/manual/fr/function.trim.php
    $valueInput = trim($valueInput);
    
    // JE RAJOUTE DANS LE TABLEAU $tabColonneInfo L'INFO RECUPEREE DU FORMULAIRE
    // $tabColonneInfo["email"] = verifierInfoEmail("email");
    global $tabColonneInfo;
    $tabColonneInfo[$nameInput] = $valueInput;
    
    return $valueInput;
}


// ENTRE CHAQUE TOKEN ET SA VALEUR
function envoyerRequeteSQL ($paramSQL, $tabTokenValeur)
{
    global $databaseDB, $loginDB, $motPasseDB, $serveurDB, $charsetDB;
    
    
    // ON VA AVOIR BESOIN DU DSN
    // Data Source Name
    // (COMME UNE URL POUR ACCEDER A LA BONNE DATABASE...)
    $dsn = "mysql:dbname=$databaseDB;host=$serveurDB;charset=$charsetDB";
    
    // CREER LA CONNEXION A LA BASE DE DONNEES
    // http://php.net/manual/fr/pdo.construct.php
    $objetPDO = new PDO($dsn, $loginDB, $motPasseDB);
    
    // MODIFIER QUELQUES PARAMETRES
    // AFFICHER DES ERREURS SQL COMME SI ELLES ETAIENT DES ERREURS PHP
    // APPELLE LA METHODE setAttribute SUR OBJET $objetPDO
    $objetPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
    // ON VEUT RECUPERER LES INFOS DE MYSQL DANS UN TABLEAU ASSOCIATIF
    $objetPDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // JE DEMANDE A $objetPDO DE PREPARER LA REQUETE QUE JE VEUX EXECUTER
    // ON APPELLE LA METHODE prepare SUR $objetPDO
    // http://php.net/manual/fr/pdo.prepare.php
    $objetPDOStatement = $objetPDO->prepare($paramSQL);
    
    // ON VA EXECUTER LA REQUETE AVEC $objetPDOStatement
    // http://php.net/manual/fr/pdostatement.execute.php
    $objetPDOStatement->execute($tabTokenValeur);
    
    // PERMET DE POUVOIR RECUPERER LES INFOS EN CAS DE LECTURE (SELECT)
    return $objetPDOStatement;
}

// AFFICHER LES ERREURS
function afficherErreur ($tabErreur)
{
    // http://php.net/manual/fr/function.implode.php
    $listeErreur = implode(",", $tabErreur);
    $nbErreur    = count($tabErreur);
    
    // ERREUR: L'UNE DES INFORMATIONS EST MANQUANTE
    echo 
<<<CODEHTML
    <div class="ko">$nbErreur erreur(s): $listeErreur</div>
CODEHTML;

}

// ON VA RECUPERER UNE INFO DU FORMULAIRE
// ET ON VA VERIFIER SI L'INFO EST ENTRE $min et $max
function verifierInfoNombre ($nameInput, $min, $max)
{
    // IL FAUT CREER LA VARIABLE GLOBALE AVANT D'APPELER LA FONCTION
    global $tabErreur;
    
    // ON FAIT APPEL A LA FONCTION verifierInfo POUR RECUPERER L'INFO 
    // ET EFFECTUER QUELQUES FILTRES... 
    $texte = verifierInfo($nameInput);
    
    // CONVERTIR LE TEXTE EN NOMBRE ENTIER
    $nombre = intval($texte);
    
    // TEST DE VALIDITE
    if ($nombre < $min)
    {
        // ERREUR
        $tabErreur[] = "($nameInput) VALEUR TROP PETITE";
    }

    // http://php.net/manual/fr/function.mb-strlen.php
    if ($nombre > $max)
    {
        // ERREUR
        $tabErreur[] = "($nameInput) VALEUR TROP GRANDE";
    }
    
    return $nombre;
}


?>