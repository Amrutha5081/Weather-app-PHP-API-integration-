<?php
if (isset($_POST['city'])) {
    $apiKey = 'f**************88**';
    $city = $_POST['city'];
    $apiUrl = 'https://api.openweathermap.org/data/2.5/weather?q=' . urlencode($city) . '&appid=' . $apiKey;

    // Make a GET request to the API
    $response = file_get_contents($apiUrl);

    // Parse the JSON response
    $data = json_decode($response, true);

   

    // Check if the request was successful
    if ($data && $data['cod'] === 200) {
        // Extract the relevant weather information
        $weather = $data['weather'][0]['description'];
        $temperature = $data['main']['temp'];
        $humidity = $data['main']['humidity'];
        $windspeed = $data['wind']['speed'];
        $description = $data['weather'][0]['description'];
        $pressure = $data['main']['pressure']
        // Convert temperature to Celsius
        //$temperatureCelsius = round($temperature - 273.15, 2);
        ?>
     <!DOCTYPE html>
<html>
<head>
  <title>Weather Application</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="weather.css">
  <style>
    body {
  background-color: #f0f0f0;
}

.container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.weather-card {
  width: 350px;
}

.weather-app-title {
  font-size: 36px;
  margin-bottom: 20px;
  color: #333;
  text-align: center;
}

.card {
  border: none;
}

.weather-info p {
  font-size: 18px;
  margin-bottom: 8px;
  color: #555;
}

    </style>
</head>
<body>
  <div class="container">
    <div class="weather-card">
      <h1 class="weather-app-title">Weather Forecast</h1>
      <div class="card shadow p-3 rounded">
        <div class="card-body">
          <h2 class="card-title text-center">Weather in <?php echo $city; ?></h2>
          <hr>
          <div class="weather-info">
            <p class="card-text"><strong>Description:</strong> <?php echo ucfirst($weather); ?></p>
            <p class="card-text"><strong>Temperature:</strong> <?php echo $temperature; ?>°F</p>
            <p class="card-text"><strong>Humidity:</strong> <?php echo $humidity; ?>%</p>
            <p class="card-text"><strong>Wind speed:</strong> <?php echo $windspeed; ?> m/s</p>
            <p class="card-text"><strong>Pressure:</strong> <?php echo $pressure; ?> hPa</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

        
        <?php
    } else {
        
        echo "<p style='font-size: 45px';>'Sorry, currently unable to fetch weather data.'</p>";
    }
}
?>
