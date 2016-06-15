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
   }

   function index()
   {
      if ($this->session->has_userdata('username') && $this->session->type !== 'recepcionista')
      {
         $this->load->view('header');
         $this->load->view('administrarHabitaciones');
         $this->load->view('WT4FooterView');
      } else
      {
         redirect('login');
      }
   }
}

?>
