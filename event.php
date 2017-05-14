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
				var map = new GMaps({
					el: '#map',
					lat: 50.448069,
					lng:  30.529913
				});
			</script>
		<script>
		GMaps.geolocate({
	 success: function(position) {
		 map.setCenter(position.coords.latitude, position.coords.longitude);
		map.addMarker({
				 lat: position.coords.latitude,
				 lng: position.coords.longitude,
				 title: 'location',
				 infoWindow: {
					content: '<p>My location!</p>'
				 }
	});
	},
	 error: function(error) {
		 alert('Geolocation failed: '+error.message);
	 },
	 not_supported: function() {
		 alert("Your browser does not support geolocation");
	 }
 });
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
						<div id="map"></div>
			<script>
				var map = new GMaps({
					el: '#map',
					lat: 50.448069,
					lng:  30.529913
				});
			</script>
		<script>
		GMaps.geolocate({
	 success: function(position) {
		 map.setCenter(position.coords.latitude, position.coords.longitude);
		map.addMarker({
				 lat: position.coords.latitude,
				 lng: position.coords.longitude,
				 title: 'location',
				 infoWindow: {
					content: '<p>My location!</p>'
				 }
	});
	},
	 error: function(error) {
		 alert('Geolocation failed: '+error.message);
	 },
	 not_supported: function() {
		 alert("Your browser does not support geolocation");
	 }
 });
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
				<div style="padding-right: 8%">
				<div class="panel panel-default">
					<div class="panel-heading">
						3
					</div>
					<div class="panel-body">
						<div id="map"></div>
			<script>
				var map = new GMaps({
					el: '#map',
					lat: 50.448069,
					lng:  30.529913
				});
			</script>
		<script>
		GMaps.geolocate({
	 success: function(position) {
		 map.setCenter(position.coords.latitude, position.coords.longitude);
		map.addMarker({
				 lat: position.coords.latitude,
				 lng: position.coords.longitude,
				 title: 'location',
				 infoWindow: {
					content: '<p>My location!</p>'
				 }
	});
	},
	 error: function(error) {
		 alert('Geolocation failed: '+error.message);
	 },
	 not_supported: function() {
		 alert("Your browser does not support geolocation");
	 }
 });
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
				3
			</div>
			<div class="panel-body">
				ubey menya
			</div>
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
