<div class="row">
   <div class="">
      <h2>Agregar Reservacion</h2>
      <div class="alert alert-danger" >
         <?php echo validation_errors();
               echo $custom_error;?>
      </div>
      <form class="form-inline" action="" method="post" role="form">
         <div class="form-group">
            <label for="numero"></label>
            <input type="text" name="numero" id="numero" class="form-control" placeholder="Numero de Habitacion"></input>
         </div><br>
         <div class="form-group">
            <label for="anoi"></label>
            <input type="text" name="anoi" id="anoi" class="form-control" placeholder="Año de inicio"></input>
         </div>
         <div class="form-group">
            <label for="mesi"></label>
            <input type="text" name="mesi" id="mesi" class="form-control" placeholder="Mes de inicio"></input>
         </div>
         <div class="form-group">
            <label for="diai"></label>
            <input type="text" name="diai" id="diai" class="form-control" placeholder="Dia de inicio"></input>
         </div><br>
         <div class="form-group">
            <label for="anof"></label>
            <input type="text" name="anof" id="anof" class="form-control" placeholder="Año de entrega"></input>
         </div>
         <div class="form-group">
            <label for="mesf"></label>
            <input type="text" name="mesf" id="mesf" class="form-control" placeholder="Mes de entrega"></input>
         </div>
         <div class="form-group">
            <label for="diaf"></label>
            <input type="text" name="diaf" id="diaf" class="form-control" placeholder="Dia de entrega"></input>
         </div><br>
         <div class="form-group">
            <label for="cliente"></label>
            <input type="text" name="cliente" id="cliente" class="form-control" placeholder="Nombre del Cliente"></input>
         </div><br>
         <input type="submit" value="Reservar" class="btn btn-primary"></input>
      </form>

      <h2>Reservaciones</h2>
      <?php
         echo '<a href="'.site_url('AdministrarReservaciones/orden/numero').'"><button type="button" name="bnumero" class="btn btn-success">Ordenar por numero</button></a> ';
         echo '<a href="'.site_url('AdministrarReservaciones/orden/fecha_inicio').'"><button type="button" name="bfi" class="btn btn-success">Ordenar por inicio</button></a> ';
         echo '<a href="'.site_url('AdministrarReservaciones/orden/fecha_fin').'"><button type="button" name="bff" class="btn btn-success">Ordenar por final</button></a> ';
         echo '<a href="'.site_url('AdministrarReservaciones/orden/nombre').'"><button type="button" name="btipo" class="btn btn-success">Ordenar por cliente</button></a> ';
      ?>

      <h2>Disponibles para esta fecha:</h2>
      <?php echo '<form class="" action="'.site_url('AdministrarReservaciones/disponibles').'" method="post">' ?>
         <div class="form-group">
            <label for="da"></label>
            <input type="text" name="da" id="da" class="form-control" placeholder="año"></input>
         </div>
         <div class="form-group">
            <label for="dm"></label>
            <input type="text" name="dm" id="dm" class="form-control" placeholder="mes"></input>
         </div>
         <div class="form-group">
            <label for="dd"></label>
            <input type="text" name="dd" id="dd" class="form-control" placeholder="dia"></input>
         </div>
         <input type="submit" value="Disponibles" class="btn btn-primary"></input>
      </form>

      <h2>Reservadas para esta fecha:</h2>
      <?php echo '<form class="" action="'.site_url('AdministrarReservaciones/reservadas').'" method="post">' ?>
         <div class="form-group">
            <label for="da2"></label>
            <input type="text" name="da2" id="da2" class="form-control" placeholder="año"></input>
         </div>
         <div class="form-group">
            <label for="dm2"></label>
            <input type="text" name="dm2" id="dm2" class="form-control" placeholder="mes"></input>
         </div>
         <div class="form-group">
            <label for="dd2"></label>
            <input type="text" name="dd2" id="dd2" class="form-control" placeholder="dia"></input>
         </div>
         <input type="submit" value="Reservadas" class="btn btn-primary"></input>
      </form><br>

      <table class="table table-hover">
         <tr>
            <th>
               Habitacion
            </th>
            <th>
               Fecha inicio
            </th>
            <th>
               Fecha fin
            </th>
            <th>
               Cliente
            </th>
         </tr>
         <?php
            foreach ($reservaciones as $res ) {
               echo "<tr><td>".$res->numero."</td><td>".$res->fecha_inicio."</td><td>".$res->fecha_fin."</td><td>".$res->nombre."</td><td><a href=\"".site_url('AdministrarReservaciones/eliminar')."/".$res->numero."/".$res->fecha_inicio."\"><button type=\"button\" name=\"buttoneliminar\" class=\"btn btn-danger\">Eliminar <span class=\"glyphicon glyphicon-trash\"></span></button></a></td></tr>";
            }
          ?>
      </table>
   </div>
</div>
