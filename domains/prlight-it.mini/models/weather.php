<?php

class Site
{
	public static function SelectW($city, $data)
	{
		$db = Db::getConnection();
		$infoWeather = array();
		$sql = 'SELECT * FROM info WHERE city = :city AND data = :data';
		$result = $db->prepare($sql);
		$result->bindParam(':city', $city, PDO::PARAM_INT);
		$result->bindParam(':data', $data, PDO::PARAM_INT);
		$result->execute();
        $i = 0;
		while($row = $result->fetch()){
        $infoWeather[] = $row;
		$i++;
		}
		return $infoWeather;
	}
	
    public static function addBase($city, $data, $clouds, $temperature, $humidity, $speed, $symbol, $latitude, $longitude)
    {
        
        $db = Db::getConnection();
		
        $sql = 'INSERT INTO info (city, data, data_time, speed, clouds, temperature, humidity, symbol, latitude, longitude) '
		. 'VALUES ( :city, :data, :data_time, :speed, :clouds, :temperature, :humidity, :symbol, :latitude, :longitude)';
        $result = $db->prepare($sql);
		$result->bindParam(':city', $city, PDO::PARAM_STR);
		$result->bindParam(':data', $data, PDO::PARAM_STR);
		$result->bindParam(':data_time', $data, PDO::PARAM_STR);
		$result->bindParam(':speed', $speed, PDO::PARAM_STR);
		$result->bindParam(':clouds', $clouds, PDO::PARAM_STR);
		$result->bindParam(':temperature', $temperature, PDO::PARAM_STR);
		$result->bindParam(':humidity', $humidity, PDO::PARAM_STR);
		$result->bindParam(':symbol', $symbol, PDO::PARAM_STR);
		$result->bindParam(':latitude', $latitude, PDO::PARAM_STR);
		$result->bindParam(':longitude', $longitude, PDO::PARAM_STR);
		
		return $result->execute();
    }
	
    
        
}
        