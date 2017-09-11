/*
Petit exo3 sur les varirables
17-05-2017
avec Laurent Freund
*/

/*var anneeNaissance=2000;
var year;

year = (new Date()).getFullYear();

document.getElementById("date").innerText=year-anneeNaissance;*/

//Pour remplacer (new Date()).getFullYear(), il faut créer une variable year
//que l'on placera directement dans les calculs :
var year;

year = (new Date()).getFullYear();

var anneeNaissanceCapitaine=1945;
var anneeNaissanceFemme=1951;
var anneeNaissanceMoussaillon=1986;

document.getElementById("agecapitaine").innerText=year-anneeNaissanceCapitaine;
document.getElementById("agefemme").innerText=year-anneeNaissanceFemme;
document.getElementById("agemoussaillon").innerText=year-anneeNaissanceMoussaillon;
document.getElementById("agemaccouchement").innerText=anneeNaissanceMoussaillon-anneeNaissanceFemme;