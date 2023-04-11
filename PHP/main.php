<!DOCTYPE html>
<html>
  <head>
    <title>Weather App</title>
    <meta charset="UTF-8" >
    <meta name = "viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../CSS/main.css">
<link rel="stylesheet" href="../CSS/outHeader.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
<body id="body" style="background-image : url('../Images/train.jpg')">

<div class="header">
  <a href="../HTML/index.html" class="logo">Weather Application</a>
  <div class="header-right">
  <button onclick="changeTheme()">Change Theme</button>
  <a href="#contact">Contact</a>
      <a href="#contact">Favorites</a>
    <a class="active" href="../HTML/index.html">Home</a>
  </div>
</div>


 <table id="table1"  style ="  background-repeat:no repeat; background-size:cover;"class= "myTable">  <tr>
    <th><h1>Weather </h1></th>
  </tr>
  <tr>
    <td>Enter a city name to get the current weather:</td>
  </tr>
  <tr>
    <td><input type="text" id="city-input" placeholder="Enter city name" /></td>
  </tr>
   <tr>
    <td><button onclick="getDataByCityName()">Get Weather</button></td>
  </tr>
</table>


<table id="table2" class="myTable" style ="  background-repeat:no repeat; background-size:cover;">   <tr>

    <th><h1>Forecast</h1></th>
  </tr>
  <tr>
    <td><div id="weather-info"></div></td>
  </tr>
  <tr>
    <td>Make forecast for the desire city</td>
  </tr>
   <tr>
    <td><button ><a href="../PHP/try.php" style="color:white"><span>Forecast</span> </a></button></td>
  </tr>
</table>



    <script>
      const weatherApiKey = 'ed9fc9d0c2cad1e8ef24d1e17fef9338';
      const weatherApiUrl = 'https://api.openweathermap.org/data/2.5/weather';

      function getDataByCityName() {
        const cityName = document.getElementById('city-input').value.trim();
        if (cityName === '') {
          alert('Please enter a city name');
          return;
        }

        const url = `${weatherApiUrl}?q=${cityName}&appid=${weatherApiKey}&units=metric`;

        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            if (data.cod === '404') {
              alert('City not found');
            } else {
              const weatherInfo = `Current temperature in ${data.name}: ${data.main.temp} &#8451;, ${data.weather[0].description}`;
              document.getElementById('weather-info').innerHTML = weatherInfo;
            }
          })
          .catch((error) => alert(error.message));
      }

      function getDataByLocation(position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        const url = `${weatherApiUrl}?lat=${latitude}&lon=${longitude}&appid=${weatherApiKey}&units=metric`;

        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            const weatherInfo = `Current temperature near you <br> ${data.main.temp} &#8451;, ${data.weather[0].description}`;
            document.getElementById('weather-info').innerHTML = weatherInfo;
          })
          .catch((error) => alert(error.message));
      }

      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          getDataByLocation,
          () => console.log('User denied access to location'),
        );
      }
    </script>
<script>

let theme = 0;

  function changeTheme() {
    if (theme == 0) {
      document.body.style.backgroundImage = "url('../Images/cloud2.jpg')";
      document.getElementById("table1").style.backgroundImage = "url('../Images/sun.jpg')";
      document.getElementById("table2").style.backgroundImage = "url('../Images/sun2.jpg')";
      theme = 1;
    } else {
      document.body.style.backgroundImage = "url('../Images/rain2.jpg')";
      document.getElementById("table1").style.backgroundImage = "url('../Images/train.jpg')";
      document.getElementById("table2").style.backgroundImage = "url('../Images/train.jpg')";
      theme = 0;
    }
  }



</script>


  </body>
</html>
