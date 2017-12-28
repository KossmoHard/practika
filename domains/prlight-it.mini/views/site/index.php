<?php 
require_once "/views/layouts/header.php";       
?>
<div class = "container">
	<div class = "row">
		<div class = "col-md-4 col-md-offset-4">
			<form action = "#" method = "post" name='form' style = "text-align: center" onsubmit= "return validate()" >
			<div class="form-group">
				<label>Город:</label>
				<input type = "text" class="form-control" placeholder = "Kharkiv" name = "q" onkeyup="check(this.value)" />
				<span id="e_city" style="color: #c00;"></span></p>
			</div>
			<div class="form-group">
					<label>Дата:</label>
					<input type = "text" class="form-control" placeholder = "2017-06-22" name = "date" id="datep">
					<span id="e_data" style="color: #c00;"></span></p>
					<input type = "hidden" id = "latitude" value = "<?php echo $latitude; ?>">
					<input type = "hidden" id = "longitude" value = "<?php echo $longitude; ?>">
				<input type = "submit" class="btn btn-primary" name = "submit" value = "Узнать погоду" >
			</div>
			</form>
		</div>
	</div>
	<div class = "row">
	
		<?php if(isset($xml2)){ ?>
		<div class = "col-md-12">
			<div class = "block_st">
		<h2 class = "center">Город: <?php echo $xml2->location->name; ?></h2>
		<h3 class = "center">Вывод данных на ближайшие 5 дней.</h3>
		</div>
		</div>
		<div id="map" class="map"></div>
		<?php foreach($xml2->forecast->time as $xml3){ ?>
			<div class = "col-md-3 col-xs-12 col-sm-6"> 
			<div class = "block_st">
				<img src="../template/images/site/<?php echo $xml3->symbol['var']; ?>.png" title =" <?php echo $xml3->clouds['value']; ?> " width = 80px; height = 80px;>
				<p>Дата: <?php echo $xml3['from']; ?> </p> 
				<p>Погода: <?php echo $xml3->clouds['value']; ?> </p>
				<p>Температура: <?php echo $xml3->temperature['value']; ?>°</p>
				<p>Влажность: <?php echo $xml3->humidity['value']; echo $xml3->humidity['unit']; ?></p>
				<p>Скорость ветра: <?php echo $xml3->windSpeed['mps']; ?> м/c</p>
				<hr />
				</div>
			</div>
			<?php //print_r($xml3->symbol['var']); ?>
		<?php } ?>
<?php //print_r($xml3->symbol['var']); ?>
		<?php }elseif(isset($infoWeather)){ ?>
		<div class = "col-md-12">
			<div class = "block_st">
				<h2 class = "center">Город: <?php echo $BdInfoCity; ?></h2>
				<h3 class = "center"><?php echo $textInfo; ?></h3>
		</div>
		</div>
		<div id="map" class="map"></div>
			<?php foreach($infoWeather as $weather){ ?>
				<div class = "col-md-3 col-xs-12 col-sm-6"> 
				<div class = "block_st">
					<img src="template/images/site/<?php echo $weather['symbol']; ?>.png" title = " <?php echo $weather['clouds']; ?> " width = 80px; height = 80px;>
					<p>Дата: <?php  echo $weather['data_time']; ?> </p> 
					<p>Погода: <?php echo $weather['clouds']; ?> </p>
					<p>Температура: <?php echo $weather['temperature']; ?>°</p>
					<p>Влажность: <?php echo $weather['humidity']; ?>%</p>
					<p>Скорость ветра: <?php echo $weather['speed']; ?> м/c</p>
					<hr />
				</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
	<?php //print_r($infoWeather); ?>
</div>
<?php 
require_once "/views/layouts/footer.php";       
?>


    
