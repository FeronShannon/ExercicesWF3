// var jour = true;

// // Quand on clique sur le bouton :
// $('#interrupteur').click(function(){
// 	if (jour === true) {
// 	// On change le bground-color du body :
// 		$('body').css('backgroundColor', '#0a0546');
// 	// On change la couleur du h1 :
// 		$('h1').css('color', '#fff');
// 	// On change le bground-color et la couleur du body :
// 		$('#interrupteur').css({
// 			backgroundColor: '#fff',
// 			color: '#0a0546',
// 		});
// 	// On change le texte du bouton :
// 		$(this).text('Jour');
// 	// On change l'état de la variable :
// 		jour = false;
// 	} else {
// 		$('body').css('backgroundColor', '#fff');
// 	// On change la couleur du h1 :
// 		$('h1').css('color', '#0a0546');
// 	// On change le bground-color et la couleur du bouton :
// 		$('#interrupteur').css({
// 			backgroundColor: '#0a0546',
// 			color: '#fff',
// 		});
// 	// On change le texte du bouton :
// 		$(this).text('Nuit');
// 	// On change l'état de la variable :
// 		jour = true;
// 	}
// });

// Autre façon plus élégante de faire le code du dessus :
var jour = true;

// Quand on clique sur le bouton :
$('#interrupteur').click(function(){
	if (jour === true) {
		// On ajoute la class :
		$('body').addClass('nuit');
		// On change le texte du bouton :
 		$(this).text('Jour');
		// On change l'état de la variable :
		jour = false;
	} else {
		// On enlève la class :
		$('body').removeClass('nuit');
		// On change le texte du bouton :
 		$(this).text('Nuit');
		// On change l'état de la variable :
		jour = true;
	}
});