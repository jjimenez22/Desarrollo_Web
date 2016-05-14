<?php
   $con = new mysqli('localhost', 'root', '', 'articulos');
   if($con->connect_error)
      die('error conectando a bd: '.$con->connect_error);

   $art = $con->query('select codigo, nombre, precio from articulos');
   $con->close();

   // modificar para que gaha la consulta referente a la consulta del usuario
 ?>
