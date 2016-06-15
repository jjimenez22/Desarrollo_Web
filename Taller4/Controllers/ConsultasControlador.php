<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Clase controladora del procesamiento de consultas al sistema
 */
class ConsultasControlador extends CI_Controller
{

   function __construct()
   {
      parent::__construct();
   }

   function index()
   {
      if ($this->session->has_userdata('username'))
      {
         $this->load->view('header');
         $this->load->view('consultasVista');
         $this->load->view('WT4FooterView');
      } else
      {
         redirect('login');
      }
   }
}

?>
