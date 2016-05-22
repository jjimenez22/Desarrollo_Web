<!DOCTYPE html>
<html>
	<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <title>Lista de productos</title>

      <style>
         .jumbotron 
         { 
            background-color: #f4511e;
            color: #ffffff;
         }
      </style>
   </head>

<body>

<div class="jumbotron text-center">
  <h2>Lista de Artículos en Venta</h2>
</div>
<div class="text-center">        
  <table class="table table-striped">
    <thead>
      <tr class="text-center">
        <th class="text-center">Código</th>
        <th class="text-center">Descripción</th>
        <th class="text-center">Precio</th>
      </tr>
    </thead>
    <tbody>
    	<?php
    		/* realiza la conexión*/
			$link = mysqli_connect("localhost", "root", "", "articulos");

			/* comprueba la conexión */
			if (mysqli_connect_errno()) {
			    printf("Connect failed: %s\n", mysqli_connect_error());
			    exit();
			}

			/* realiza consulta a la BD*/
			$result = mysqli_query($link, "SELECT * FROM articulos");
			 
			/* Muestra cada elemento almacenado en la BD*/
			while ($fila = mysqli_fetch_array($result))
			{ 
			       echo "<tr><td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td></tr> \n"; 
			} 

			mysqli_free_result($result);
			mysqli_close($link);

		?>
    </tbody>
  </table>
</div>

</body>
</html>