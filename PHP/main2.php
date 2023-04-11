<?php
include("inHeader.php");

?>
<body>


<script>
// Request permission for location
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  window.alert('Geolocation is not supported by this browser.');
}

function success(position) {
  // Retrieve the user's current location
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;

  // Call the Reverse Geocoding API to retrieve the city name
  const apiKey = 'b1b17cc5c15d457a95dff94437d422a5';
  const apiUrl = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;

  fetch(apiUrl)
    .then(response => response.json())
    .then(data => {
      // Extract the city name from the Reverse Geocoding API response
      cityName = data.results[0].components.city;

      if (!cityName) {
        cityName = "City Name unavailable";
      }

      // Call the weather API with the city name
      const weatherApiKey = 'ed9fc9d0c2cad1e8ef24d1e17fef9338';
      const weatherApiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${weatherApiKey}`;

      fetch(weatherApiUrl)
        .then(response => response.json())
        .then(data => {
          // Parse and display the weather data
          temperature = data.main.temp - 273.15;
          const humidity = data.main.humidity;
          const windSpeed = data.wind.speed;

          document.getElementById("NameOfCity").innerHTML = ` ${cityName}`;
          document.getElementById("TemperatureCity").innerHTML = `: ${temperature.toFixed(0)} &#8451`;
          document.getElementById("Humidity").innerHTML = `: ${humidity}%`;
          document.getElementById("Wind").innerHTML = `: ${(windSpeed * 3.6).toFixed(0)} km/h`;
        })
        .catch(error => {
          document.write('Error fetching weather data', error);
        });
    });
}

function error() {
  document.write('Unable to retrieve your location.');
}


function getDataByCityName(){
      const CityNameIntroduced = document.getElementById("CityNameInput").value;
      // Call the weather API with the city name
      const weatherApiKey = 'ed9fc9d0c2cad1e8ef24d1e17fef9338';
      const weatherApiUrl = `https://api.openweathermap.org/data/2.5/weather?q=${CityNameIntroduced}&appid=${weatherApiKey}`;

      fetch(weatherApiUrl)
        .then(response => response.json())
        .then(data => {
          // Parse and display the weather data
          temperature = data.main.temp - 273.15;
          const humidity = data.main.humidity;
          const windSpeed = data.wind.speed;

          document.getElementById("NameOfCity").innerHTML = `${CityNameIntroduced}`;
          document.getElementById("TemperatureCity").innerHTML = `: ${temperature.toFixed(0)}  C`;
          document.getElementById("Humidity").innerHTML = `: ${humidity}%`;
          document.getElementById("Wind").innerHTML = `: ${windSpeed * 3.6} km/h`;
        })
        .catch(TypeError => {
            alert("Eroare: \n1. Verificati corectitudinea denumirii orasului. \n" +
            "2. Incercati versiunea in engleza a orasului. ");
        })

        .catch(error => {
          document.write('Error fetching weather from API! ', error);
        });
}



</script>


  <label for="CityNameInput">Enter a city name:</label>
  <input type="text" id="CityNameInput">
  <button type="button" onclick="getDataByCityName()">Search</button>


<table style="width:100%">
  <tr>
    <th colspan="8">Company</th>

  </tr>
  <tr>
   <td colspan="8">Company</td>

  </tr>
  <tr>
    <td colspan="8">Company</td>

  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
  </tr>
</table>





</body>

</html>