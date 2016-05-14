<?php
   $con = new mysqli('localhost', 'root', '', 'articulos');
   if($con->connect_error)
      die('error conectando a bd: '.$con->connect_error);

   $art = $con->query('select * from articulos where codigo = '.$_GET['codigo']);
   $con->close();

   if ($q=$art->fetch_assoc())
   {
      $json_file = file_get_contents('factura.json');
      if ($json_file !== false) {
         $factura = json_decode($json_file, true);
      } else {
         $factura = array();
      }
      $codigo=$q['codigo'];
      $cantidad=$_GET['amount'];
      if ($factura != NULL && array_key_exists($codigo, $factura))
      {
         $factura[$codigo]['cantidad']+=$cantidad;
         $factura[$codigo]['preciototal']=$factura[$codigo]['precio']*$factura[$codigo]['cantidad'];
      } else
      {
         $nombre=$q['nombre'];
         $precio=$q['precio'];
         $factura[$codigo]=array();
         $factura[$codigo]['nombre']=$nombre;
         $factura[$codigo]['precio']=$precio;
         $factura[$codigo]['cantidad']=$cantidad;
         $factura[$codigo]['preciototal']=$precio*$cantidad;
      }

      file_put_contents('factura.json', json_encode($factura));

      echo '<table>';
      echo '<tr>';
      echo '<th>Código</th>';
      echo '<th>Cantidad</th>';
      echo '<th>Descripción</th>';
      echo '<th>Precio Unitario</th>';
      echo '<th>Precio Total</th>';
      echo '</tr>';
      $subtotal=0;
      foreach($factura as $codigo => $articulo)
      {
         echo '<tr>';
         echo '<td>'.$codigo.'</td>';
         echo '<td>'.$articulo['cantidad'].'</td>';
         echo '<td>'.$articulo['nombre'].'</td>';
         echo '<td>'.$articulo['precio'].'</td>';
         echo '<td>'.$articulo['preciototal'].'</td>';
         $subtotal+=$articulo['preciototal'];
         echo '</tr>';
      }
      echo '<tr>';
      echo '<th>Subtotal</th>';
      echo '<th>IVA</th>';
      echo '<th>Total</th>';
      echo '</tr>';
      echo '<tr>';
      echo '<td>'.$subtotal.'</td>';
      $iva=$subtotal*0.12;
      echo '<td>'.$iva.'</td>';
      echo '<td>'.$subtotal+$iva.'</td>';
      echo '</tr>';
      echo '</table>';
   }
 ?>
