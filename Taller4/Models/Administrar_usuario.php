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

   function buscar_usuario($username)
   {
      return $this->db->query('select username from usuario where username = \''.$username.'\'');
   }

   function agregar($username, $password, $type)
   {
      return $this->db->query('insert into usuario values (\''.$username.'\',\''.$password.'\',\''.$type.'\')');
   }

   function eliminar($username)
   {
      return $this->db->query('delete from usuario where username=\''.$username.'\'');
   }
}


 ?>
