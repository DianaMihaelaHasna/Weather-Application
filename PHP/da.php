<html>
<body>




  <label for="CityNameInput">Enter a city name:</label>
  <input type="text" id="CityNameInput">
  <button type="button" onclick="getDataByCityName()">Search</button>



<table>
<tr>
    <td colspan=2 id="NameOfCity"></td>
</tr>
<tr>
    <td> Temperature: </td>
    <td id="TemperatureCity"> </td>
</tr>
<tr>
    <td> Humidity: </td>
    <td id="Humidity"> </td>
</tr>
<tr>
    <td> Wind: </td>
    <td id="Wind"> </td>
</tr>

</table>
asdasd
  </body>

<script>

alert("asd");
  // set API endpoint URL and API key


const url = 'https://api.openweathermap.org/data/2.5/forecast';
const apiKey = 'ed9fc9d0c2cad1e8ef24d1e17fef9338';

// set location and time frame parameters
const locatie = 'Timisoara';
const numDays = 2;
const numHours = numDays * 8;
let i=0;


// set query parameters for API request
const queryParams = `?q=${locatie}&cnt=${numHours}&appid=${apiKey}`;




// send GET request to API endpoint and get response
fetch(url + queryParams)
  .then(response => {


    // check if response is OK (i.e., status code is 200)
    if (response.ok) {

      return response.json();
    } else {
      throw new Error('Error in API request.');
    }
  })
  .then(data => {
    // extract weather forecast data for specified time frame
    const forecastData = data.list.slice(0, numHours);
    // display weather forecast data
    forecastData.forEach(data => {
      if(i%8 == 0){
      const timestamp =  data.dt;
      const temp = data.main.temp;
      const weatherDesc = data.weather[0].description;
      alert(`At ${timestamp} the temperature is ${temp} and the weather is ${weatherDesc}.`);

      document.getElementById('TemperatureCity').innerHTML = temp;
      document.getElementById('Humidity').innerHTML = timestamp;
      document.getElementById('Wind').innerHTML = weatherDesc;
      //document.getElementById("TemperatureCity").innerHTML = timestamp;
      }

      i++;
    });
  })
  .catch(error => console.log(error));

    </script>


</html>


