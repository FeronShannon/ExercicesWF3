var aleatoire = Math.random(); // Renvoie un nb entre 0 et 1
aleatoire = aleatoire * 100; // On multiplie par 100 pour avoir un nb entre 0 et 100
 

var nombre = Math.round(aleatoire); // On arrondit le nb aléatoire

// Manière plus élégante de l'écrire :
var nombre = Math.round(Math.random() * 100);

console.log(nombre);

$('#form').submit(function(){
	console.log("Bonjour !");
	// Algorithme du plus ou moins

	// Récupérer le choix entré par l'utilisateur (et qui se trouve dans l'input)
	var choix = $('#choix').val(); // .val() avec parenthèses vides signifie qu'on récupère la valeur que l'utilisateur met
	console.log(choix);
	// Si le choix entré est égal à la variable nombre
	if (choix==nombre){
		// on le prévient qu'il a gagné
		$('#resultat').text('Tu as gagné !!'); // .text() là on a rentré un nouveau texte dans les parenthèses pour qu'il soit afficher à l'utilisateur
	} // Sinon
	 else if (choix>nombre){
	  		// on le prévient qu'il faut un choix plus petit
	  		$('#resultat').text('Choisir un nb plus petit');
	 // Si le choix est + petit que le nombre
	 } else if (choix<nombre){
	 		// on le prévient qu'il faut un choix plus grand
	 		$('#resultat').text('Choisir un nb plus grand');
	 }			

	// On vide l'input pour que l'utilisateur entre un nouveau choix
	$('#choix').val("");

	// Pour éviter que la page se mette à jour automatiquement :
	return false;
});