const img      = document.getElementById('img');
const nom      = document.getElementById('nom');
const age      = document.getElementById('age');
const email    = document.getElementById('email');
const icon     = document.getElementById('icon');

function chargerNouveauProfil(){
	const request  = new XMLHttpRequest();

	request.open('GET', 'https://randomuser.me/api/?inc=gender,name,email,dob,picture');

	request.onload = function(){
		const objetPersonne = JSON.parse(request.responseText);
		const user          = objetPersonne.results[0];

		img.src             = user.picture.large;
		nom.innerText       = user.name.title + " " + user.name.first + " " + user.name.last;
		email.innerText     = user.email;
		var genre           = user.gender;
		if(genre == "male"){
			icon.innerHTML = '<i class="fa fa-male" aria-hidden="true"></i>';
		}
		else{
			icon.innerHTML = '<i class="fa fa-female" aria-hidden="true"></i>';
		}
	}

	request.send();
}


chargerNouveauProfil();