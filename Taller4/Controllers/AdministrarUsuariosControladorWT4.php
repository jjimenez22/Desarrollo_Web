<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   /**
    * Clase controladora de la administracion de los usuarios
    */
   class AdministrarUsuariosControladorWT4 extends CI_Controller
   {

      function __construct()
      {
         parent::__construct();
         $this->load->helper('form');
         $this->load->library('form_validation');
         $this->load->model('administrar_usuario');
      }

      function index()
      {
         $view_data = array('status' => 0);

         if ($this->session->has_userdata('username') && $this->session->type == 'administrador')
         {
            $view_data['users'] = $this->administrar_usuario->usuarios();

            if($this->form_validation->run())
            {
               $view_data['status'] = 1;
            }
            else {
               $view_data['status'] = 2;
            }

            $this->load->view('header');
            $this->load->view('administrarUsuarios', $view_data);
            $this->load->view('WT4FooterView');
         }else {
            redirect('login');
         }
      }
   }

?>
