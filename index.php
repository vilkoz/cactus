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
				 height: 325px;
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
		  </a>
	    </div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="#">Profile<span class="sr-only">(current)</span></a></li>
	        <li class="active"><a href="#">Find Event</a></li>
			<li><a href="#">About us</a></li>
	      </ul>
				<?php
				if (key_exists('login', $_SESSION) && isset($_SESSION['login']))
				{
				 ?>
	      <form id="signin" class="navbar-form navbar-right" role="form">
															<div class="btn-group">
														  <button type="button" class="btn btn-primary"><?=$_SESSION['login']  ?></button>
														  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														 <span class="caret"></span>
														 </button>
														  <ul class="dropdown-menu" role="menu">
														    <li><a href="#">Редактировать профиль</a></li>
														    <li><a href="#">Помощь</a></li>
														    <li class="divider"></li>
														    <li><a href="ajax.php?action=logout">Выйти</a></li>
														  </ul>
														</div>
	       </form>
				 <?php
			 }
			 else {
				  ?>
				<form id="signin" class="navbar-form navbar-right" role="form" action="ajax.php?action=login" method="post">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="text" class="form-control" name="login" value="" placeholder="Email Address">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" name="pass" value="" placeholder="Password">
					</div>

					<button type="submit" class="btn btn-primary">Login</button>
	       </form>
				 <?php }
				  ?>
	    </div>
	  </div>
	</nav>
	<div class="wrap">
		<div class="row panels">
			<div class="col-md-1">
			</div>
			<div class="col-md-5" >
				<div class="panel panel-default" style="min-height: 400px;">
					<div class="panel-heading">
						Register
					</div>
					<div class="panel-body">
						<form role="form" action="ajax.php?action=register" method="post">

							<div class="form-group">
								<input type="text" name="login" id="email" class="form-control input-sm" placeholder="Email Address">
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="pass" id="password" class="form-control input-sm" placeholder="Password">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
									</div>
								</div>
							</div>
							<input type="submit" value="Register" class="btn btn-info btn-block">
						</form>
					</div>
				</div>

			</div>
			<!-- <div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						1
					</div>
					<div class="panel-body">
						qwe
					</div>
				</div>
			</div> -->
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						Events nearby
					</div>
					<div class="panel-body">
						<div id="map"></div>
			<script>
			navigator.geolocation.getCurrentPosition(function(position) {
			  latit = position.coords.latitude;
			  longit = position.coords.longitude;
			var mymap2 = L.map('map').setView([latit, longit], 13);
			L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoicmF6b3JlZGdlIiwiYSI6ImNqMm8wdW1vMjAwMmsyd2xrazdyY3FvcTYifQ.LGyAHAS_AxFwUh4ytOwC5Q', {
				maxZoom: 18,
				attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, ' +
					'<a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="http://mapbox.com">Mapbox</a>',
				id: 'mapbox.streets'
}).addTo(mymap2);

	var greenIcon = L.icon({
		iconUrl: 'png/hat.png',
		iconSize:     [20, 35]
});
L.marker([latit, longit], {icon: greenIcon}).addTo(mymap2)
	.bindPopup("<b>My location!</b></a>").openPopup();
})
 </script>
					</div>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
		<!-- <div class="row">
			<div class="col-md-1">
			</div>

			<div class="col-md-10">
				<div class="panel panel-default" style="min-height: 0px;">
					<div class="panel-heading">
						Register
					</div>
					<div class="panel-body">
						<form role="form" action="ajax.php?action=register" method="post">

							<div class="form-group">
								<input type="text" name="login" id="email" class="form-control input-sm" placeholder="Email Address">
							</div>

							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="pass" id="password" class="form-control input-sm" placeholder="Password">
									</div>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6">
									<div class="form-group">
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
									</div>
								</div>
							</div>

							<input type="submit" value="Register" class="btn btn-info btn-block">

						</form>
					</div>
				</div>

			</div>
			<div class="col-md-1">
			</div>
		</div> -->
	</div>
	<div style="clear:both">

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
	</div>
</body>
<html>
