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
	        <li class="active"><a href="#">Profile<span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Find Event</a></li>
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
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						1
					</div>
					<div class="panel-body">
						qwe
					</div>
				</div>
			</div>
			<div class="col-md-5">
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
					</div>
				</div>
			</div>
			<div class="col-md-1">
			</div>
		</div>
		<div class="row">
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
	</div>
	<div style="clear:both">

	</div>
</body>
<html>
