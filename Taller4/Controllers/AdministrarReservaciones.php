<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase controladora de la administracion de las reservaciones
 */
class AdministrarReservaciones extends CI_Controller
{

   function __construct()
   {
      parent::__construct();

      $this->load->helper('date');
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('administrar_reservacion');
      $this->load->model('administrar_habitacion');

      $config = array(
         array(
                 'field' => 'numero',
                 'label' => 'Numero de Habitacion',
                 'rules' => 'required|numeric|is_natural_no_zero|callback_existe_numero',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero'
                 )
         ),
         array(
                 'field' => 'diai',
                 'label' => 'Dia de inicio',
                 'rules' => 'required|numeric|is_natural_no_zero|less_than[32]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 31.'
                 )
         ),
         array(
                 'field' => 'mesi',
                 'label' => 'Mes de inicio',
                 'rules' => 'required|numeric|is_natural_no_zero|less_than[13]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 12.'
                 )
         ),
         array(
                 'field' => 'anoi',
                 'label' => 'Año de inicio',
                 'rules' => 'required|numeric|is_natural_no_zero|less_than[100]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 99.'
                 )
         ),
         array(
                 'field' => 'diaf',
                 'label' => 'Dia de entrega',
                 'rules' => 'required|numeric|is_natural_no_zero|less_than[32]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 31.'
                 )
         ),
         array(
                 'field' => 'mesf',
                 'label' => 'Mes de entrega',
                 'rules' => 'required|numeric|is_natural_no_zero|less_than[13]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 12'
                 )
         ),
         array(
                 'field' => 'anof',
                 'label' => 'Año de entrega',
                 'rules' => 'required|numeric|is_natural_no_zero|less_than[100]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'numeric' => '%s debe ser un numero.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 99'
                 )
         ),
         array(
                 'field' => 'cliente',
                 'label' => 'Nombre del Cliente',
                 'rules' => 'required|max_length[59]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'max_length' => '%s no debe tener mas de 60 caracteres'
                 )
         )
      );
      $this->form_validation->set_rules($config);
   }

   function index()
   {
      if ($this->session->has_userdata('username'))
      {
         $view_data = array('reservaciones' => $this->administrar_reservacion->reservaciones('numero'), 'custom_error' => '');

         if ($this->form_validation->run())
         {
            $num = $this->input->post('numero');
            $fini = array(
               'dia' => $this->input->post('diai'),
               'mes' => $this->input->post('mesi'),
               'ano' => $this->input->post('anoi')
            );
            $ffin = array(
               'dia' => $this->input->post('diaf'),
               'mes' => $this->input->post('mesf'),
               'ano' => $this->input->post('anof')
            );
            $nom = $this->input->post('cliente');
            if ($this->check_range($num, $fini, $ffin))
            {
               $this->administrar_reservacion->agregar($num, $this->formato($fini), $this->formato($ffin), $nom);
               $succes_data = array('msj' => 'Reservado', 'volver' => 'administrarReservaciones');
               $this->load->view('header');
               $this->load->view('succesView', $succes_data);
               $this->load->view('WT4FooterView');
            }else {
               $view_data['custom_error']='Ese rango de fechas no esta disponible';
               $this->load->view('header');
               $this->load->view('administrarReservaciones', $view_data);
               $this->load->view('WT4FooterView');
            }
         }else {
            $this->load->view('header');
            $this->load->view('administrarReservaciones', $view_data);
            $this->load->view('WT4FooterView');
         }

      } else
      {
         redirect('login');
      }
   }

   function check_range($numero, $fini, $ffin)
   {
      if ($fini['ano']<$ffin['ano'] || $fini['mes']<$ffin['mes'] || $fini['dia']<$ffin['dia']) // que fecha de inicio sea menor a fecha fin
      {
         if ($fini['ano']>intval(date('y')) || $fini['mes']>intval(date('m')) || $fini['dia']>intval(date('d')))
         {
            if($this->administrar_reservacion->esta_ocupada($numero, $this->formato($fini), $this->formato($ffin)))
            {
               return true;
            }
         }
      }
      return false;
   }

   function formato($fecha)
   {
      if ($fecha['ano']<10)
      {
         $fano = '0'.$fecha['ano'];
      }else {
         $fano = ''.$fecha['ano'];
      }
      if ($fecha['mes']<10)
      {
         $fmes = '0'.$fecha['mes'];
      }else {
         $fmes = ''.$fecha['mes'];
      }
      if ($fecha['dia']<10)
      {
         $fdia = '0'.$fecha['dia'];
      }else {
         $fdia = ''.$fecha['dia'];
      }

      return ''.$fano.'/'.$fmes.'/'.$fdia;
   }

   function existe_numero($str)
   {
      if (empty($this->administrar_habitacion->buscar_habitacion($str)))
      {
         $this->form_validation->set_message('existe_numero', 'No existe una habitacion numero '.$str.'.');
         return false;
      }else {
         return true;
      }
   }

   function eliminar($num, $fecha)
   {
      // $fecha = formato(array('ano' => $a, 'mes' => $m, 'dia' => $d));
      if ($this->administrar_reservacion->eliminar($num, $fecha))
      {
         $succes_data = array('msj' => 'Eliminada', 'volver' => 'administrarReservaciones');
         $this->load->view('header');
         $this->load->view('succesView', $succes_data);
         $this->load->view('WT4FooterView');
      }else {
         $succes_data = array('msj' => 'Nada que eliminar', 'volver' => 'administrarReservaciones');
         $this->load->view('header');
         $this->load->view('succesView', $succes_data);
         $this->load->view('WT4FooterView');
      }
   }

   function orden($orden)
   {
      $view_data = array('reservaciones' => $this->administrar_reservacion->reservaciones($orden), 'custom_error' => '');
      $this->load->view('header');
      $this->load->view('administrarReservaciones', $view_data);
      $this->load->view('WT4FooterView');
   }

   function disponibles()
   {
      $a = intval($this->input->post('da'));
      $m = intval($this->input->post('dm'));
      $d = intval($this->input->post('dd'));
      if($a>0 && $a<99 && $m>0 && $m<13 && $d>0 && $d<31)
      {
         $view_data = array('habitaciones' => $this->administrar_reservacion->disponibles($this->formato(array('ano' => $a, 'mes' => $m, 'dia' => $d))));
         $this->load->view('header');
         $this->load->view('administrarHabitaciones', $view_data);
         $this->load->view('WT4FooterView');
      }else {
         $view_data = array('reservaciones' => $this->administrar_reservacion->reservaciones('numero'), 'custom_error' => 'Introdujo un rango de fechas no valido para las habitaciones disponibles');
         $this->load->view('header');
         $this->load->view('administrarReservaciones', $view_data);
         $this->load->view('WT4FooterView');
      }
   }

   function reservadas()
   {
      $a = intval($this->input->post('da2'));
      $m = intval($this->input->post('dm2'));
      $d = intval($this->input->post('dd2'));
      if($a>0 && $a<99 && $m>0 && $m<13 && $d>0 && $d<31)
      {
         $view_data = array('habitaciones' => $this->administrar_reservacion->reservadas($this->formato(array('ano' => $a, 'mes' => $m, 'dia' => $d))));
         $this->load->view('header');
         $this->load->view('AdministrarHabitaciones', $view_data);
         $this->load->view('WT4FooterView');
      }else {
         $view_data = array('reservaciones' => $this->administrar_reservacion->reservaciones('numero'), 'custom_error' => 'Introdujo un rango de fechas no valido para las habitaciones reservadas');
         $this->load->view('header');
         $this->load->view('AdministrarReservaciones', $view_data);
         $this->load->view('WT4FooterView');
      }
   }
}

?>
