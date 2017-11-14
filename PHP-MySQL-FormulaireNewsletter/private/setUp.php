<?php
// J'afficher les erreurs :
error_reporting(E_ALL);

// Je déclare mes variables globales utilisées par les fonctions verifierInfo... :
$tabErreur      = [];
$tabColonneInfo = [];

// INFOS NECESSAIRES A LA FONCTION envoyerRequeteSQL
$databaseDB = "formation4";
$loginDB    = "root";
$motPasseDB = "";
$serveurDB  = "localhost";
$charsetDB  = "utf8";

// J'appelle mon fichier fonctions.php :
require_once("fonctions.php");

?>
