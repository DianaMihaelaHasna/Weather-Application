<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <link rel="stylesheet" href="../CSS/outHeader.css">
  <link rel="stylesheet" href="../CSS/main.css">
  <title>Prognoza meteo</title>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid ;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #dddddd;
    }
  </style>
</head>
<body>

<div class="header">
  <a href="../HTML/index.html" class="logo">Weather Application</a>
  <div class="header-right">
  <a href="#contact">Contact</a>
    <a href="#contact">Favorites</a>
    <a class="active" href="../HTML/index.html">Home</a>
  </div>
</div>



<div class = "ta">
<table>
  <tr>
    <th style="margin-top: 20px; text-align:center; color: #001f33; background-color: #748493;" >Prognoza meteo pentru următoarele 5 zile:</th>
  </tr>
  <tr>
    <td style="text-align:center;"><input type="text" id="city-input"  style="background-color: #748493; "placeholder="Introduceți numele orașului..." ></td>
  </tr>
  <tr>
     <td style="text-align:center;"><button onclick="getWeather()" style="margin-bottom : 20px">Caută</button></td>
  </tr>
</table>
</div>

 <table id="weather-data">
    <tbody>
    </tbody>
  </table>





<script defer>
function getWeather() {
  const apikey = 'ed9fc9d0c2cad1e8ef24d1e17fef9338';
  const city = document.querySelector('#city-input').value;
  const url = `https://api.openweathermap.org/data/2.5/forecast?q=${city}&appid=${apikey}&units=metric&cnt=40`;

  fetch(url)
    .then(response => response.json())
    .then(data => {
      const weatherData = document.querySelector('#weather-data tbody');
      weatherData.innerHTML = ''; // Ștergeți orice rânduri existente în tabel

      let currentDay = '';
      data.list.forEach(forecast => {
        const date = new Date(forecast.dt_txt);
        const day = date.toLocaleDateString('ro-RO', { weekday: 'long' });
        const time = date.toLocaleTimeString('ro-RO', { hour: '2-digit', minute: '2-digit' });
        const temperature = forecast.main.temp;
        const description = forecast.weather[0].description;
        const humidity = forecast.main.humidity;

        if (day !== currentDay) {
          // Adăugați un rând pentru ziua curentă
          const dayRow = document.createElement('tr');
          const dayCell = document.createElement('tr');
          dayCell.colSpan = 4;
          dayCell.innerHTML = `<strong>${day}</strong>`;
          dayRow.appendChild(dayCell);
          weatherData.appendChild(dayRow);
          currentDay = day;
        }

        // Adăugați un rând pentru fiecare previziune de 3 ore
        const forecastRow = document.createElement('td');
        const timeCell = document.createElement('tr');
        timeCell.innerText = time;
        const temperatureCell = document.createElement('tr');
        temperatureCell.innerText = temperature;
        const descriptionCell = document.createElement('tr');
        descriptionCell.innerText = description;
        const humidityCell = document.createElement('tr');
        humidityCell.innerText = humidity;
        forecastRow.appendChild(timeCell);
        forecastRow.appendChild(temperatureCell);
        forecastRow.appendChild(descriptionCell);
        forecastRow.appendChild(humidityCell);
        weatherData.appendChild(forecastRow);
      });
    })
    .catch(error => console.error(error));
}

  </script>

</body>
</html>
