<div class="row">
   <div class="">
      <h2>Agregar nuevo usuario</h2>
      <div class="alert alert-danger" >
         <?php echo validation_errors(); ?>
      </div>
      <form class="" action="" method="post">
         <div class="form-group">
            <label for="username"></label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Usuario"></input>
         </div>
         <div class="form-group">
            <label for="password"></label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"></input>
         </div>
         <div class="form-group">
            <label for="reppassword"></label>
            <input type="password" name="reppassword" id="reppassword" class="form-control" placeholder="Confirmar Contraseña"></input>
         </div>
         <div class="form-group">
            <label for="type"></label>
            <input type="text" name="type" id="type" class="form-control" placeholder="Tipo"></input>
         </div>
         <input type="submit" value="Registrar" class="btn btn-primary"></input>
      </form>
      <h2>Usuarios registrados</h2>
      <ul>
         <?php
         foreach ($users as $user ) {
               echo "<li>Username: ".$user->username."<br>Tipo: ".$user->type."<br><a href=\"".site_url('AdministrarUsuariosControladorWT4/eliminar')."/".$user->username."\"><button type=\"button\" name=\"buttoneliminar\" class=\"btn btn-danger\">Eliminar <span class=\"glyphicon glyphicon-trash\"></span></button></a></li>";
            }
          ?>
      </ul>
   </div>
</div>
