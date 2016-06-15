<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<h2>Ingresar</h2>
		<form action="" method="POST">
			<div class="form-group">
				<label for="username"></label>
				<input type="text" name="username" id="username" class="form-control" placeholder="Usuario"></input>
			</div>

			<div class="form-group">
				<label for="password"></label>
				<input type="password" name="password" id="password" class="form-control" placeholder="Contraseña"></input>
			</div>
			<div class="alert alert-danger" <?php echo $display; ?>>
				<strong>Datos incorrectos!</strong>
			</div>
			<input type="submit" value="Ingresar" class="btn btn-primary"></input>
		</form>
	</div>
</div>
