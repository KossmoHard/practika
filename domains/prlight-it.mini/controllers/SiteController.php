<?php

include_once '/models/weather.php';

class SiteController {
	
    public function ActionIndex()
    {
        if (isset($_POST['submit']))
		{
			$data = htmlspecialchars(stripslashes($_POST["date"]));
			$city = $_POST['q'];
			$pattern = "(19|20)\d\d-((0[1-9]|1[012])-(0[1-9]|[12]\d)|(0[13-9]|1[012])-30|(0[13578]|1[02])-31)";
			$pat_sity = "^[а-яА-ЯёЁa-zA-Z]+$";
			
			$infoWeather = Site::SelectW($city, $data);
			foreach($infoWeather as $info){
			$BdInfoCity = $info[city];
			$BdInfoDate = $info[data];
			
			$latitude = $info['latitude'];
			$longitude = $info['longitude'];
			}
			
			if($BdInfoDate != $data){
			
			$city = $city;
			$APIDD = "7a2fe37aefb8acf1b55bf597e31c5376";
			$data_file2="http://api.openweathermap.org/data/2.5/forecast?q=$city&APPID=$APIDD&mode=xml&lang=ru&units=metric"; // адрес xml файла
			$data_file2 = file_get_contents($data_file2,0); //получаем данные о погоде из xml файла
			$xml2 = new SimplexmlElement($data_file2); //помещаем данные в массив
			foreach($xml2->forecast->time as $weatherBd){
				$latitude = $xml2->location->location['latitude'];
				$longitude = $xml2->location->location['longitude'];
				$city = $xml2->location->name;
				$data = $weatherBd['from']; 
				$clouds = $weatherBd->clouds['value'];
				$temperature = $weatherBd->temperature['value'];
				$humidity = $weatherBd->humidity['value'];
				$speed = $weatherBd->windSpeed['mps'];
				$symbol = $weatherBd->symbol['var'];
				$result = Site::addBase($city, $data, $clouds, $temperature, $humidity, $speed, $symbol, $latitude, $longitude);
			}
			}else{
				$textInfo = 'Вывод информации о погоде из базы данных!';
			}
	
		
		}
		
		
		require_once (ROOT. '/views/site/index.php');
		return true;
    }
}
