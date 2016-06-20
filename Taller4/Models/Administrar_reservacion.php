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

   // function reservaciones()
   // {
   //    return $this->db->query('select * from reservacion')->result();
   // }

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
      return $this->db->query('insert into reservacion values ('.$numero.',\''.$fecha.'\',\''.$fechaf.'\',\''.$nombre.'\')');
   }

   function eliminar($numero, $fecha)
   {
      return $this->db->query('delete from reservacion where numero='.$numero.' and fecha_inicio=\''.$fecha.'\'');
   }

   function esta_ocupada($numero, $fini, $ffin)
   {
      return empty($this->db->query("select numero from reservacion where numero=".$numero." and ((fecha_inicio < '".$fini."' and fecha_fin > '".$fini."') or (fecha_inicio < '".$ffin."' and fecha_fin > '".$ffin."'))")->result());
   }

   function disponibles($fecha)
   {
      $res1 = $this->db->query("select numero from reservacion where fecha_inicio <= '".$fecha."' and fecha_fin > '".$fecha."'")->result();
      $query = 'select * from habitacion';
      if(!empty($res1))
      {
         $query .= ' where';
         $i=false;
         foreach ($res1 as $num)
         {
            if($i)
            {
               $query .= " and";
            }
            $query .= " numero != ".$num->numero;
            $i=true;
         }
      }
      return $this->db->query($query)->result();
   }

   function reservadas($fecha)
   {
      $res1 = $this->db->query("select numero from reservacion where fecha_inicio <= '".$fecha."' and fecha_fin > '".$fecha."'")->result();
      if(empty($res1))
      {
         return $res1;
      }else {
         $query = 'select * from habitacion where';
         $i=false;
         foreach ($res1 as $num)
         {
            if($i)
            {
               $query .= " and";
            }
            $query .= " numero = ".$num->numero;
            $i=true;
         }
         return $this->db->query($query)->result();
      }
   }
}


 ?>
