<div class="list-group">
   <?php
      if($this->session->type === 'administrador')
         echo '<a href="'.site_url('administrarusuarioscontroladorwt4').'" class="list-group-item"><span class="glyphicon glyphicon-user"> Usuarios </span></a>';
      if($this->session->type === 'administrador' || $this->session->type === 'gerente')
         echo '<a href="'.site_url('administrarhabitaciones').'" class="list-group-item"><span class="glyphicon glyphicon-home"> Habitaciones </span></a>';
   ?>
   <a href="<?php echo site_url('administrarreservaciones')?>" class="list-group-item"><span class="glyphicon glyphicon-print"> Reservaciones </span></a>
   <!-- <a href="<?php echo site_url('consultascontrolador')?>" class="list-group-item"><span class="glyphicon glyphicon-question-sign"> Consultas </span></a> -->
</div>
