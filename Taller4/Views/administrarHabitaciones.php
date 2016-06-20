<div class="row">
   <div class="">
      <h2>Agregar nueva habitacion</h2>
      <div class="alert alert-danger" >
         <?php echo validation_errors(); ?>
      </div>
      <form class="" action="" method="post">
         <div class="form-group">
            <label for="numero"></label>
            <input type="text" name="numero" id="numero" class="form-control" placeholder="Numero de habitacion"></input>
         </div>
         <div class="form-group">
            <label for="tipo"></label>
            <input type="text" name="tipo" id="tipo" class="form-control" placeholder="Descripcion"></input>
         </div>
         <input type="submit" value="Agregar" class="btn btn-primary"></input>
      </form>
      <h2>Habitaciones en el Hotel</h2>
      <table class="table table-hover">
         <tr>
            <th>
               Numero
            </th>
            <th>
               Tipo
            </th>
         </tr>
         <?php
            foreach ($habitaciones as $hab ) {
               echo "<tr><td>".$hab->numero."</td><td>".$hab->tipo."</td><td><a href=\"".site_url('AdministrarHabitaciones/eliminar')."/".$hab->numero."\"><button type=\"button\" name=\"buttoneliminar\" class=\"btn btn-danger\">Eliminar <span class=\"glyphicon glyphicon-trash\"></span></button></a></td></tr>";
            }
          ?>
      </table>
   </div>
</div>
