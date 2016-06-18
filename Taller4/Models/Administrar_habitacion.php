<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase modelo de administracion de habitaciones
 */
class administrar_habitacion extends CI_Model
{

   function __construct()
   {
      parent::__construct();
   }

   function habitaciones()
   {
      return $this->db->query('select * from habitacion order by numero')->result();
   }

   function buscar_habitacion($numero)
   {
      return $this->db->query('select * from habitacion where numero = \''.$numero.'\'')->result();
   }

   function agregar($numero, $tipo)
   {
      return $this->db->query('insert into habitacion values (\''.$numero.'\',\''.$tipo.'\')');
   }

   function eliminar($numero)
   {
      return $this->db->query('delete from habitacion where numero=\''.$numero.'\'');
   }
}


 ?>
