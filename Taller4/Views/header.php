<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Hotel Maldivas</title>

	<!-- Para el diseño del mostrador de Imagenes (Bootstrap Carousel)-->
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
	    $(document).ready(function(){
	        $('.myCarousel').carousel()
	    });
	</script>

	<!-- Para el diseño del encabezado-->
	<link rel="stylesheet" href="<?php echo base_url()?>static/css/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url()?>static/css/flat-ui.min.css">
	<script src="<?php echo base_url()?>static/js/vendor/jquery.min.js"></script>
	<script src="<?php echo base_url()?>static/js/flat-ui.min.js"></script>



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
		                	<li><a href="#fakelink">About Us</a></li>

		                	<?php if($this->session->userdata('username')):?> <!-- si existe la sesion puede salir-->
		                		<li><a href="<?php echo site_url('login/logout')?>">Logout<span class="navbar-unread">1</span></a></li>
		                	<?php else: ?> <!-- sino inicia sesion -->
		                		<li class="dropdown">
			                  		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sign in <b class="caret"></b></a>
			                  		<span class="dropdown-arrow"></span>
			                  		<ul class="dropdown-menu">
			                    		<li><a href="<?php echo site_url('login')?>">Gerente</a></li>
			                    		<li><a href="<?php echo site_url('login')?>">Recepcionista</a></li>
			                    		<li class="divider"></li>
			                    		<li><a href="<?php echo site_url('login')?>">Administrador</a></li>
			                  		</ul>
			                	</li>
			            	<?php endif; ?>
		              	</ul>
		               <!--<form class="navbar-form navbar-right" action="#" role="search">
		                <div class="form-group">
		                  <div class="input-group">
		                    <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
		                    <span class="input-group-btn">
		                      <button type="submit" class="btn"><span class="fui-search"></span></button>
		                    </span>
		                  </div>
		                </div>
		              </form>-->
		   		</div><!-- /.navbar-collapse -->
		   </nav>
		</header>

  		
    <div id="myCarousel" class="carousel slide">

    	<!-- Circulos indicadores -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
        <li data-target="#myCarousel" data-slide-to="6"></li>
        <li data-target="#myCarousel" data-slide-to="7"></li>
        <li data-target="#myCarousel" data-slide-to="8"></li>
        <li data-target="#myCarousel" data-slide-to="9"></li>
        <li data-target="#myCarousel" data-slide-to="10"></li>
        <li data-target="#myCarousel" data-slide-to="11"></li>
        <li data-target="#myCarousel" data-slide-to="12"></li>
        <li data-target="#myCarousel" data-slide-to="13"></li>
        <li data-target="#myCarousel" data-slide-to="14"></li>
        <li data-target="#myCarousel" data-slide-to="15"></li>
        <li data-target="#myCarousel" data-slide-to="16"></li>
        <li data-target="#myCarousel" data-slide-to="17"></li>
        <li data-target="#myCarousel" data-slide-to="18"></li>
        <li data-target="#myCarousel" data-slide-to="19"></li>
      </ol>
      
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag5.jpg" alt="banner1" /></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag12.jpg" alt="banner2" /></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag10.jpg" alt="banner3" /></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag4.jpg" alt="banner4"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag2.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag14.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag18.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag20.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag21.jpg" alt="banner4"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag26.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag22.jpg" alt="banner4"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag15.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag3.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag8.jpg" alt="banner4"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag13.jpg" alt="banner5"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag7.jpg" alt="banner4"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag16.jpg" alt="banner4"/></div>
        <div class="item"  align="center"><img  src="http://localhost/CodeIgniter/imag/imag1.jpg" alt="banner4"/></div>
      </div>

 		<!-- Controles Anterior y Siguiente -->
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Anterior</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Siguiente</span>
		</a>
    </div>
</div> <!-- end container -->
</body>
</html>