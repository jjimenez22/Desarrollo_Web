<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase modelo de administracion de usuarios
 */
class Administrar_usuario extends CI_Model
{

   function __construct()
   {
      parent::__construct();
   }

   function usuarios()
   {
      return $this->db->query('select username, type from usuario order by type');
   }
}


 ?>
