// console.log("-- Fichier bien chargé");

$('form').submit(function(){
	// 1. On récupère les deux nb à additionner et on ajoute Number pour pouvoir saisir que des nombres afin qu'ils ne se collent po ensuite entre eux
	var nombre1 = Number($('#nombre-1').val());
	var nombre2 = Number($('#nombre-2').val());
	// 2. On effectue le calcul
	// var resultat = nombre1 + nombre2;

	// 2.1 On doit savoir quelle est l'opération :
	var operation = $('#operation').val();
	var resultat = 0;
/*

On peut le faire avec un if ou un switch :
if(operation == "addition"){
	resultat = nombre1 + nombre2;
} else if (operation == "soustraction"){
	resultat = nombre1 - nombre2;
} else if (operation == "multiplication"){
	resultat = nombre1 * nombre2;
}

*/

	switch(operation){
		case "addition":
			resultat = nombre1 + nombre2;
			break;
		case "soustraction":
			resultat = nombre1 - nombre2;
			break;
		case "multiplication":
			resultat = nombre1 * nombre2;
			break;
	}
	
	// 3. On affiche le résultat
	$('form p span').text(resultat);
	// Si j'appuie sur le bouton calculer, la page se recharge et n'affiche donc po le résultat !
	// Donc il faut mettre false ...
	return false;
	// ... Ou ajouter un event en haut dans 'form' : $('form').submit(function(event)
	// Et on écrit ensuite (à la place de return false) :
	// console.log(event);
	// event.preventDefault();
});

