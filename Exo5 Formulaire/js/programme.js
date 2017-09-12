$('form').submit(function(){
	
	// la variable erreurs est un flag/drapeau, ça se lit : s'il n'y a po d'erreurs
	var erreurs = false;
/*
	// 1. Le nom de famille :
	var nom = $('#nom').val();

	if(nom.length === 0){
		$('#nom').addClass('erreur');
		erreurs = true;

	} else {
		$('#nom').removeClass('erreur');
	}
	// 2. Le prénom :
	// CTRL + D pour mettre prenom à tous :
	var prenom = $('#prenom').val();

	if(prenom.length === 0){
		$('#prenom').addClass('erreur');
		erreurs = true;

	} else {
		$('#prenom').removeClass('erreur');
	}

	// 3. La civilité :
	var civilite = $('#civilite').val();

	if(civilite.length === 0){
		$('#civilite').addClass('erreur');
		erreurs = true;

	} else {
		$('#civilite').removeClass('erreur');
	}
Méthode égale avec la boucle for :
*/
	// On trouve tous les éléments HTML qui ont la classe obligatoire :
	var champs = $('.obligatoire');

	// Pour chacun des éléments HTML trouvés
	for (var i = 0; i < champs.length; i++){
		// On veut travailler sur l'élément
		var element = champs[i];
		// On veut aussi travailler sur le paragraphe d'erreur
		// 1. Il ns faut connaitre l'id du champs sur lequel on travaille
		var id = element.id;
		// 2. Il faut en déduire l'identifiant du para.
		var idMessage = '#' + id + '-message'; // par exemple : #nom-message
		// 3. On peut donc trouver le para en question :
		var message = $(idMessage);
		// On trouve la valeur de l'élément
		var valeur = $(element).val();
		// S'il n'y a rien dans l'élément (erreur)
		if (valeur.length === 0){
			$(element).addClass('erreur');
			$(message).fadeIn(150);
			erreurs = true;

		} else {
			$(element).removeClass('erreur');
			$(message).fadeOut(150);
		}
	}
// On lit : s'il n'y a po d'erreurs, on envoie le formulaire
	if(erreurs = false){
		return true;
	} else {
		return false;
	}
	
});
