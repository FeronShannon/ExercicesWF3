document.getElementById('weather-query').addEventListener('submit', function(){



var ville = document.getElementById('ville').value;

	if(ville != ""){
		var requete = new XMLHttpRequest();

		requete.open('GET', 'http://api.openweathermap.org/data/2.5/weather?q='+ ville + '&appid=8e602b9ea28ed4f9f8fc97a5f6d1105c&units=metric');
		requete.onload = function(){
			var data = JSON.parse(requete.responseText);
			console.log(data);
			
			if(data.main == undefined)
			{
				document.getElementById('undefined').className = "";
				document.getElementById('meteo').className = "hidden";
			} else {

				var degres = Math.round(data.main.temp);
				document.getElementById('degres').innerText = degres;

				var temps = data.weather[0].main;
				var icon  = document.querySelector('#temps i');

				

				switch (temps){
					case "Rain":
						icon.className = "wi wi-day-rain";
						break;

					case "Clouds":
						icon.className = "wi wi-day-cloudy";
						break;

					case "Clear":
						icon.className = "wi wi-day-sunny";
						break;

					case "Snow":
						icon.className = "wi wi-day-snow";
						break;

					case "Mist":
						icon.className = "wi wi-day-fog";
						break;

					case "Drizzle":
						icon.className = "wi wi-day-sleet";
						break;
				}
				document.getElementById('ville').style.borderColor = 'rgba(0, 0, 255, 0)';
				document.getElementById('meteo').className = "";
				document.getElementById('error').className = "hidden";
				document.getElementById('undefined').className = "hidden";
			}
		};

		requete.send();

	} else{
		document.getElementById('ville').style.borderColor = 'red';
		document.getElementById('error').className = "";
		document.getElementById('error').style.color = "red";
		document.getElementById('meteo').className = "hidden";
	}
	document.getElementById('ville').select
	event.preventDefault();
})
