<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase controladora de la administracion de las Habitaciones
 */
class AdministrarHabitaciones extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
      $this->load->helper('form');
      $this->load->library('form_validation');
      $this->load->model('administrar_habitacion');

      $config = array(
         array(
                 'field' => 'numero',
                 'label' => 'Numero de Habitacion',
                 'rules' => 'required|callback_check_numero',
                 'errors' => array(
                        'required' => 'Debe proveer un %s.'
                 )
         )
      );
      $this->form_validation->set_rules($config);
   }

   function index()
   {
      if ($this->session->has_userdata('username') && $this->session->type !== 'recepcionista')
      {
         $view_data['nums'] = $this->administrar_habitacion->habitaciones();

         if ($this->form_validation->run()) {
            $this->administrar_habitacion->agregar($this->input->post('numero'), $this->input->post('tipo'));

            $succes_data = array('msj' => 'Eliminado', 'volver' => 'AdministrarHabitaciones');
            $this->load->view('header');
            $this->load->view('succesView', $succes_data);
            $this->load->view('WT4FooterView');
         }else {
            $view_data['habitaciones'] = $this->administrar_habitacion->habitaciones()));

            $this->load->view('header');
            $this->load->view('administrarHabitaciones', $view_data;
            $this->load->view('WT4FooterView');
         }

      } else
      {
         redirect('login');
      }
   }

   function check_numero($str)
   {
      if (empty($this->administrar_habitacion->buscar_habitacion($str))) {
         return true;
      } else {
         $this->form_validation->set_message('check_numero', 'Ya hay una habitacion con este numero');
         return false;
      }
   }

   function eliminar($num)
   {
      if($this->session->has_userdata('username') && $this->session->type !== 'recepcionista')
      {
         if($this->administrar_habitacion->eliminar($num))
         {
            $succes_data = array('msj' => 'Eliminado', 'volver' => 'AdministrarHabitaciones');
            $this->load->view('header');
            $this->load->view('succesView', $succes_data);
            $this->load->view('WT4FooterView');
         }
      }
   }
}

?>
