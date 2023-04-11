    const url = "https://api.openweathermap.org/data/2.5/weather";
      const city = "Timișoara";
      const apiKey = "ed9fc9d0c2cad1e8ef24d1e17fef9338";

      // construim URL-ul pentru cererea API
      const apiUrl = `${url}?q=${city}&appid=${apiKey}&units=metric`;

      // facem cererea GET la API
     fetch(apiUrl)
  .then(response => response.json())
  .then(data => {
    // construim tabelul HTML
    const table = document.createElement("table");

// Table header row
const tr1 = document.createElement("tr");
const td1 = document.createElement("td");
td1.innerText = "Temperatura";
tr1.appendChild(td1);

const td3 = document.createElement("td");
td3.innerText = "Presiunea";
tr1.appendChild(td3);

const td5 = document.createElement("td");
td5.innerText = "Umiditatea";
tr1.appendChild(td5);

const td7 = document.createElement("td");
td7.innerText = "Temp max";
tr1.appendChild(td7);

const td9 = document.createElement("td");
td9.innerText = "Temp min";
tr1.appendChild(td9);

const td11 = document.createElement("td");
td11.innerText = "Real feel";
tr1.appendChild(td11);

const td13 = document.createElement("td");
td13.innerText = "Tara";
tr1.appendChild(td13);

const td15 = document.createElement("td");
td15.innerText = "Rasarit";
tr1.appendChild(td15);

const td17 = document.createElement("td");
td17.innerText = "Apus";
tr1.appendChild(td17);

table.appendChild(tr1);

// Table data rows
const tr2 = document.createElement("tr");
const td2 = document.createElement("td");
td2.innerText = `${data.main.temp} °C`;
tr2.appendChild(td2);

const td4 = document.createElement("td");
td4.innerText = `${data.main.pressure} hPa`;
tr2.appendChild(td4);

const td6 = document.createElement("td");
td6.innerText = `${data.main.humidity} %`;
tr2.appendChild(td6);

const td8 = document.createElement("td");
td8.innerText = `${data.main.temp_max}°C`;
tr2.appendChild(td8);

const td10 = document.createElement("td");
td10.innerText = `${data.main.temp_min}°C`;
tr2.appendChild(td10);

const td12 = document.createElement("td");
td12.innerText = `${data.main.feels_like}°C`;
tr2.appendChild(td12);

const td14 = document.createElement("td");
td14.innerText = `${data.sys.country}`;
tr2.appendChild(td14);

const td16 = document.createElement("td");
td16.innerText = `${data.sys.sunrise}`;
tr2.appendChild(td16);

const td18 = document.createElement("td");
td18.innerText = `${data.sys.sunset}`;
tr2.appendChild(td18);

table.appendChild(tr2);

    // adăugăm tabelul în elementul HTML
    const weatherData = document.getElementById("weather-data");
    weatherData.appendChild(table);
  });

