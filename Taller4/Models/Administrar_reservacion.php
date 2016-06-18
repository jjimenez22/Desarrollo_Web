<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase modelo de administracion de usuarios
 */
class Administrar_reservacion extends CI_Model
{

   function __construct()
   {
      parent::__construct();
   }

   function reservaciones()
   {
      return $this->db->query('select * from reservacion')->result();
   }

   function reservaciones($orden)
   {
      return $this->db->query('select * from reservacion order by '.$orden)->result();
   }

   function buscar_reservacion($numero, $fecha)
   {
      return $this->db->query('select * from reservacion where numero = '.$numero.' and fecha_inicio=\''.$fecha.'\'')->result();
   }

   function agregar($numero, $fecha, $fechaf, $nombre)
   {
      return $this->db->query('insert into reservacion values ('.$numero.',\''.$fecha.'\','.$fechaf.',\''.$nombre.'\')');
   }

   function eliminar($numero, $fecha)
   {
      return $this->db->query('delete from reservacion where numero='.$numero.' and fecha_inicio=\''.$fecha.'\'');
   }

   function esta_ocupada($numero, $fini, $ffin)
   {
      return empty($this->db->query("select numero from reservacion where numero=".$numero." and ((fecha_inicio < '".$fini."' and fecha_fin > '".$fini."') or (fecha_inicio < '".$ffin."' and fecha_fin > '".$ffin."'))"));
   }

   function disponibles($fecha)
   {
      return $this->db->query("select habitacion.* from habitacion inner join reservacion where habitacion.numero = reservacion.numero and (reservacion.fecha_inicio > '".$fecha."' or reservacion.fecha_fin <= '".$fecha."') group by habitacion.numero")->result();
   }

   function reservadas($fecha)
   {
      return $this->db->query("select habitacion.* from habitacion inner join reservacion where habitacion.numero = reservacion.numero and reservacion.fecha_inicio < '".$fecha."' and reservacion.fecha_fin > '".$fecha."'")->result();
   }
}


 ?>
