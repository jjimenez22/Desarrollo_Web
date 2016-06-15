<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Hotel Maldivas</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script
			  src="https://code.jquery.com/jquery-3.0.0.min.js"
			  integrity="sha256-JmvOoLtYsmqlsWxa7mDSLMwa6dZ9rrIdtrrVYRnDRH0="
			  crossorigin="anonymous"></script>



	<!-- Para el diseño del encabezado-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/css/flat-ui.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.3.0/js/flat-ui.min.js"></script>

	<!--<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>-->

</head>
<body>
	<div class="container">
		<header>
			<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
		        <div class="navbar-header">
		            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
		                <span class="sr-only">Toggle navigation</span>
		            </button>
		            	<a class="navbar-brand" href="#">Gili Lankanfushi Maldives</a>
		        </div>
		        <div class="collapse navbar-collapse" id="navbar-collapse-01">
		            	<ul class="nav navbar-nav navbar-right">
		                	<!-- <li><a href="#fakelink">About Us</a></li> -->

		                	<?php if($this->session->userdata('username')):?> <!-- si existe la sesion puede salir-->
		                		<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo ' '.$this->session->username ?><b class="caret"></b></a>
											<span class="dropdown-arrow"></span>
											<ul class="dropdown-menu">
											<li><a href="<?php echo base_url('hotel/administrar')?>"><span class="glyphicon glyphicon-th-list"></span> Administrar</a></li>
											<li><a href="<?php echo base_url('login/logout')?>"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
											</ul>
									</li>

		                	<?php else: ?> <!-- sino inicia sesion -->
									<li><a href="<?php echo base_url('login')?>"><span class="glyphicon glyphicon-log-out"></span> Entrar<span class="navbar-unread">1</span></a></li>

			            	<?php endif; ?>
		              	</ul>
		   		</div><!-- /.navbar-collapse -->
		   </nav>
		</header>
