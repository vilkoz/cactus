<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" integrity="sha512-07I2e+7D8p6he1SIM+1twR5TIrhUQn9+I6yjqD53JQjFiMf8EtC93ty0/5vJTZGF8aAocvHYNEDJajGdNx1IsQ==" crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js" integrity="sha512-A7vV8IFfih/D732iSSKi20u/ooOfj/AGehOKq0f4vLT1Zr2Y+RX7C+w8A1gaSasGtRUZpF/NZgzSAu4/Gc41Lg==" crossorigin=""></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/index.css">
	<title>Leisure Club</title>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7AXb4WhqnAjNyJyB-cXSPU51kxmeq_GU"></script>
	<script src="gmaps.js"></script>

	<style>
				#map {
				 height: 200px;
				 width: 100%;
				}
				#map1 {
				 height: 200px;
				 width: 100%;
				}
				#map2 {
				 height: 200px;
				 width: 100%;
				}
		</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
	  <div class="container-fluid">

	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">
			  <img src="logo.png" class="logo">
			  <!-- <span class="brand-name">Leisure Club</span> -->
		  </a>
	    </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Profile<span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Find Event</a></li>
			<li><a href="#">About us</a></li>
	        <!-- <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
	          </ul>
	        </li> -->
	      </ul>
	      <form id="signin" class="navbar-form navbar-right" role="form">
	                        <!-- <div class="input-group">
	                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address">
	                        </div>

	                        <div class="input-group">
	                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
	                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
	                        </div> -->
															<div class="btn-group">
														  <button type="button" class="btn btn-primary">NAME USER</button>
														  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														 <span class="caret"></span>
														 <!-- <span class="sr-only">Меню с переключением</span> -->
														 </button>
														  <ul class="dropdown-menu" role="menu">
														    <li><a href="#">Редактировать профиль</a></li>
														    <li><a href="#">Помощь</a></li>
														    <li class="divider"></li>
														    <li><a href="#">Выйти</a></li>
														  </ul>
														</div>
	                        <!-- <button type="submit" class="btn btn-primary">Logout</button> -->
	       </form>
	    </div>
	  </div>
	</nav>
	<!-- <div class="row">
		<div class="col-lg-12">
			kek
		</div>
	</div> -->
	<div class="wrap">
		<div class="row panels">
			<div class="col-lg-4">
				<div style="padding-left: 8%">
				<div class="panel panel-default">
					<div class="panel-heading">
						1
					</div>
					<div class="panel-body">
						<div id="map"></div>
			<script>
			var mymap2 = L.map('map').setView([51.44, 11.42], 13);
			L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicmF6b3JlZGdlIiwiYSI6ImNqMm8wdW1vMjAwMmsyd2xrazdyY3FvcTYifQ.LGyAHAS_AxFwUh4ytOwC5Q', {
				maxZoom: 18,
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
					'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="http://mapbox.com">Mapbox</a>',
				id: 'mapbox.streets'
}).addTo(mymap2);
 </script>
 					<div><br>Пивас в падике</div>
					<div><br>алко-пати, активный досуг</div>
					<div><br> 9 мая в 14:48</div>
					</div>
				</div>
			</div>
		</div>
			<!-- <div class="col-lg-1">
			</div> -->
			<div class="col-lg-4">
				<div style="padding-left: 4%; padding-right: 4%">
				<div class="panel panel-default">
					<div class="panel-heading">
						2
					</div>
					<div class="panel-body">
						<div id="map1"></div>
			<script>
			var mymap2 = L.map('map1').setView([50.44, 11.42], 13);
			L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicmF6b3JlZGdlIiwiYSI6ImNqMm8wdW9wOTAwMjEzM3Fza3VoNnR5aHoifQ.JUhlhRoT5CkCT3FrO64uoQ', {
				maxZoom: 18,
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
					'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="http://mapbox.com">Mapbox</a>',
				id: 'mapbox.streets'
}).addTo(mymap2);
 </script>
					 <div><br>Пивас в падике</div>
					 <div><br>алко-пати, активный досуг</div>
					 <div><br> 9 мая в 14:48</div>
					</div>
				</div>
			</div>
		</div>
			<!-- <div class="col-lg-1">
			</div> -->
			<div class="col-lg-4">
				<div style="padding-left: 4%; padding-right: 4%">
				<div class="panel panel-default">
					<div class="panel-heading">
						2
					</div>
					<div class="panel-body">
						<div id="map2"></div>
			<script>
				var mymap3 = L.map('map2').setView([25.44, 10.42], 13);
				L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicmF6b3JlZGdlIiwiYSI6ImNqMm8wdXIzNjAwMXEzM282MzZycGx4dTEifQ.5rIvZiASyO49-pKLTNwNuQ', {
					maxZoom: 18,
					attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
						'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
						'Imagery © <a href="http://mapbox.com">Mapbox</a>',
					id: 'mapbox.streets'
}).addTo(mymap3);
 			</script>
						 <div><br>Пивас в падике</div>
						<div><br>алко-пати, активный досуг</div>
						<div><br> 9 мая в 14:48</div>
					</div>
				</div>
			</div>
		</div>
			<!-- <div class="col-md-1">
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container">
			<div class="row">
			</div>
		</div>
		<div class="footer-bottom">
			<div class="row">
			</div>
			<p class="pull-left">LC Leisure Club all rights reserved</p>
		</div>
	</div> -->

	<div class="col-lg-6">
		<div style="padding-left: 6%">
		<div class="panel panel-default">
			<div class="panel-heading">
				3
			</div>
			<div class="panel-body">
				ubey menya
			</div>
		</div>
	</div>
	</div>

	<div class="col-lg-6">
		<div style="padding-right: 6%">
		<div class="panel panel-default">
			<div class="panel-heading">
				Vernite 100
			</div>
			<div id="mapid" style="height: 357px"></div>
			<script>
				var mymap;
			  navigator.geolocation.getCurrentPosition(function(position) {
			    latit = position.coords.latitude;
			    longit = position.coords.longitude;
				var place = new L.LayerGroup();

				var place_ic = L.icon({
			    	iconUrl: 'png/place.png',
			    	iconSize:     [20, 35],
				});
				var action = L.icon({
					iconUrl: 'png/action.png',
					iconSize:     [20, 35],
				});

				L.marker([latit + 0.015, longit + 0.015], {icon: action}).bindPopup('This is Littleton, CO.<br>OPisanie</br>').addTo(place),
				L.marker([latit + 0.015, longit - 0.015], {icon: action}).bindPopup('This is Denver, CO.').addTo(place),
				L.marker([latit - 0.015, longit + 0.015], {icon: action}).bindPopup('This is Aurora, CO.').addTo(place),
				L.marker([latit - 0.015, longit - 0.015], {icon: action}).bindPopup('This is Golden, CO.').addTo(place);

				var action = new L.LayerGroup();

				L.marker([latit + 0.0215, longit + 0.0215], {icon: place_ic}).bindPopup('This is Littleton, CO.').addTo(action),
				L.marker([latit + 0.0215, longit - 0.0215], {icon: place_ic}).bindPopup('This is Denver, CO.').addTo(action),
				L.marker([latit - 0.0215, longit + 0.0215], {icon: place_ic}).bindPopup('This is Aurora, CO.').addTo(action),
				L.marker([latit - 0.0215, longit - 0.0215], {icon: place_ic}).bindPopup('This is Golden, CO.').addTo(action);
				mymap = L.map('mapid',{
					center: [latit, longit],
					zoom: 12,
					layers: [action, place]
				});

				L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
					maxZoom: 18,
					attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
						'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
						'Imagery © <a href="http://mapbox.com">Mapbox</a>',
					id: 'mapbox.streets'
				}).addTo(mymap);

				var mbAttr = 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
						'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
						'Imagery © <a href="http://mapbox.com">Mapbox</a>',
				mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw';

				var streets  = L.tileLayer(mbUrl, {id: 'mapbox.streets',   attribution: mbAttr})
				var baseLayers = {
				}

				var overlays = {"Места": place, "События" : action};
				L.control.layers(baseLayers, overlays).addTo(mymap);
				var greenIcon = L.icon({
			    iconUrl: '../hat.png',
			    iconSize:     [20, 35],
			});
				L.marker([latit, longit], {icon: greenIcon}).addTo(mymap)
					.bindPopup("<b>Hello world!</b><br />Петушня сидит тут. <a href='http://google.com'>OpenStreetMap</a>").openPopup();
				var popup = L.popup();
				function onMapClick(e) {
					popup
						.setLatLng(e.latlng)
						.setContent("You clicked the map at " + e.latlng.toString())
						.openOn(mymap);
				}
				mymap.on('click', onMapClick);
				})
			</script>
		</div>
	</div>
	</div>



	<div class="col-md-1">
	</div>
</div>
</div>
<div class="footer">
<div class="container">
	<div class="row">
	</div>
</div>
<div class="footer-bottom">
	<div class="row">
		<div class="col-lg-4">
		</div>
		<div class="col-lg-4">
			<span>
				Contact us:
				<form action="index.php" method="get">
					<div style="margin: 0 auto;">
					<label>Name</label>
					<input type="text" name="name"><br>
					<label>Question</label>
					<input type="text" name="text">
					<input type="submit" name="submit">
					</div>
				</form>
			</span>
		</div>
		<div class="col-lg-4">
			<span class="avsoon">Avilable soon!</span>
			<img class="app" src="downloditunes.png" height="auto">
			<img class="app"src="googleplay.png" height="auto">
		</div>
	</div>
	<p class="pull-left">LC Leisure Club all rights reserved</p>
</div>
</div>
</body>
<html>
