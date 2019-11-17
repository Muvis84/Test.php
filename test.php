<?php
$apiKey = "669b8c3ae522bdd1f4b00c86862ac61b";
$cityId = "";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?q=Manchester,UK"."&lang=en&units=metric&APPID=".$apiKey;

$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>
<!doctype html>
<html>
<head>
<title>Forecast Weather using OpenWeatherMap with PHP</title>
</head>
<body>
    <div class="report-container">
        <h2><?php echo $data->name; ?> Weather Forecast</h2>
        <div class="time">
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>
        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> <?php echo $data->main->temp_max; ?>&deg;C <span
                class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C </span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> m/h</div>
        </div>
    </div>
</body>
</html>
