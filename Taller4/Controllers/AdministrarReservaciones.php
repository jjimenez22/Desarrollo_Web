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

      $config = array(
         array(
                 'field' => 'numero',
                 'label' => 'Numero de Habitacion',
                 'rules' => 'required|is_natural_no_zero|callback_existe_numero',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero'
                 ),
         array(
                 'field' => 'diai',
                 'label' => 'Dia',
                 'rules' => 'required|is_natural_no_zero|less_than[31]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s de inicio.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 31.'
                 ),
         )
         array(
                 'field' => 'mesi',
                 'label' => 'Mes',
                 'rules' => 'required|is_natural_no_zero|less_than[12]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s de inicio.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 12.'
                 ),
         )
         array(
                 'field' => 'anoi',
                 'label' => 'Año',
                 'rules' => 'required|is_natural_no_zero|less_than[100]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s de inicio.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s no debe ser mayor a 99.'
                 ),
         )
         array(
                 'field' => 'diaf',
                 'label' => 'Dia',
                 'rules' => 'required|is_natural_no_zero|less_than[]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s final.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s debe ser un numero valido'
                 ),
         )
         array(
                 'field' => 'mesf',
                 'label' => 'Mes',
                 'rules' => 'required|is_natural_no_zero|less_than[]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s final.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s debe ser un numero valido'
                 ),
         )
         array(
                 'field' => 'anof',
                 'label' => 'Año',
                 'rules' => 'required|is_natural_no_zero|less_than[]',
                 'errors' => array(
                        'required' => 'Debe proveer un %s final.',
                        'is_natural_no_zero' => '%s debe ser mayor que cero',
                        'less_than' => '%s debe ser un numero valido'
                 ),
         )
      );
      $this->form_validation->set_rules($config);
   }

   function index()
   {
      if ($this->session->has_userdata('username'))
      {
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
            if (check_range($num, $fini, $ffin))
            {
               $this->Administrar_reservacion->agregar($num, formato($fini), formato($ffin));
               $succes_data = array('msj' => 'Reservado', 'volver' => 'administrarReservaciones');
               $this->load->view('header');
               $this->load->view('succesView', $succes_data);
               $this->load->view('WT4FooterView');
            }else {
               $this->form_validation->set_message('existe_numero', 'Ese rango de fechas no esta disponible')
               $this->load->view('header');
               $this->load->view('administrarReservaciones');
               $this->load->view('WT4FooterView');
            }
         }else {
            $this->load->view('header');
            $this->load->view('administrarReservaciones');
            $this->load->view('WT4FooterView');
         }

      } else
      {
         redirect('login');
      }
   }

   function check_range($numero, $fini, $ffin)
   {
      if ($fini['ano']<$ffin['ano'] || $fini['mes']<$ffin['mes'] || $fini['dia']<$ffin['dia'])
      {
         if ($fini['ano']>intval(date('y')) || $fini['mes']>intval(date('m')) || $fini['dia']>intval(date('d')))
         {
            if($this->arministrar_reservacion->esta_ocupada($numero, formato($fini), formato($ffin)))
            {
               return true;
            }
         }
      }
      return false;
   }

   function formato($fecha)
   {
      return ''.$fecha['ano'].'/'.$fecha['mes'].'/'.$fecha['dia'];
   }

   function existe_numero($str)
   {
      $this->load->model('administrar_habitacion');
      if (empty($this->administrar_habitacion->buscar_habitacion($str)))
      {
         $this->form_validation->set_message('existe_numero', 'La habitacion %s no existe');
         return false;
      }else {
         return true;
      }
   }

   function eliminar($num, $d, $m, $a)
   {
      $fecha = formato(array('ano' => $a, 'mes' => $m, 'dia' => $d));
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
}

?>
