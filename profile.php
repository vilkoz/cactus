<?php
	session_start();
	require_once 'Site.class.php';
	require_once 'DB.class.php';

try
{
  DB::init();
} catch (Exception $e)
{
  $error = $e->getMessage()."</br>";
}?>

<!DOCTYPE html>
<html>
<head>
	<style media="screen">
	.list_pref, .list_inter
	{
		border-radius: 10px;
		background-color: grey;
		border: 0;
		min-width: 10px;
		color: white;
		padding: 5px;
		display: inline;
	}
	.list_pref input
	{
		background-color: grey;
		width: 10px;
		border-radius: 10px;
		border: 0px;
		text-indent: -99999px;
	}
	.list_inter input
	{
		background-color: grey;
		width: 10px;
		border-radius: 10px;
		border: 0px;
		text-indent: -99999px;
	}
	</style>
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
														  <button type="button" class="btn btn-primary"><?=$_SESSION['login']?></button>
														  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
														 <span class="caret"></span>
														 <!-- <span class="sr-only">Меню с переключением</span> -->
														 </button>
														  <ul class="dropdown-menu" role="menu">
														    <li><a href="#">Редактировать профиль</a></li>
														    <li><a href="#">Помощь</a></li>
														    <li class="divider"></li>
														    <li><a href="logout.php">Выйти</a></li>
														  </ul>
														</div>
	                        <!-- <button type="submit" class="btn btn-primary">Logout</button> -->
	       </form>
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
						Edit profile
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="Name">Name:</label>
							<input type="text" class="form-control" id="Name">
						</div>
						<div class="form-group">
							<label for="Surname">Surname:</label>
							<input type="text" class="form-control" id="Surname">
						</div>
						<div class="form-group">
							<label for="Name">Birthdate:</label>
							<input type="text" class="form-control" id="Birthdate">
						</div>
						<label class="radio-inline"><input type="radio" value="" name="group1" id="gender">male</label>
						<label class="radio-inline"><input type="radio" value="" name="group1">female</label>
						<div class="form-group">
							<label for="">Number:</label>
							<input type="text" class="form-control" id="Number">
						</div>
						<button type="submit" class="btn btn-default" id="send">Submit</button>
					</div>
				</div>
			</div>
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading">
						Edit preferences
					</div>
					<div class="panel-body">
							<div class="">
								<p>List preferences</p>
								<div id="list_pref">
								</div>
							</div>
						</br>
							<div>
								<p>List interests</p>
								<div id="list_int">
								</div>
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
			</div>
			<p class="pull-left">LC Leisure Club all rights reserved</p>
		</div>
	</div>
	<script
	src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script type="text/javascript">
     $(document).ready(function(){
       function reloadmsg() {
         $.ajax({
           type:"GET",
           url: "ajax.php",
           data: "action=list_interests",
           success: function(data){
             $("#list_int").html(data);
           }
         });
         $.ajax({
           type:"GET",
           url: "ajax.php",
           data: "action=list_preferences",
           success: function(data){
             $("#list_pref").html(data);
           }
         });
       }
			 reloadmsg();
       $("#list_pref").click(function(){
				 var nahuy = $('list_inter').val();
         $.ajax({
           type: "POST",
           url: "ajax.php?action=del_preference",
           data: {'idi':nahuy} ,
           success: function(data){
            //  $("#msg_list").html(data);
						console.log(data);
						 reloadmsg();
           }
         });
        return false;
       });
       $("#send").click(function(){
         var name = $("#Name").val();
         var surname = $("#Surname").val();
         var birthdate = $("#Birthdate").val();
         var gender = $("#gender").val();
         var number = $("#Number").val();
         $.ajax({
           type: "POST",
           url: "ajax.php?action=edit_profile",
           data: "action=sendMsg&text=" + value ,
           success: function(data){
             $("#msg_list").html(data);
           }
         });
        return false;
       });
  });
  </script>
</body>
<html>
