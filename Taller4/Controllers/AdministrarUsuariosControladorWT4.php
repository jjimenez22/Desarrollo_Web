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

         $config = array(
           array(
                   'field' => 'username',
                   'label' => 'Usuario',
                   'rules' => 'required|min_length[5]|max_length[12]|callback_check_username',
                   'errors' => array(
                           'required' => 'Debe proveer un %s.',
                           'min_length' => 'El %s debe tener mas de 5 caracteres.',
                           'max_length' => 'El %s no debe tener mas de 12 caracteres.'
                   )
           ),
           array(
                   'field' => 'password',
                   'label' => 'Contraseña',
                   'rules' => 'required',
                   'errors' => array(
                           'required' => 'Debe proveer una %s.'
                   )
           ),
           array(
                   'field' => 'reppassword',
                   'label' => 'Confirmar Contraseña',
                   'rules' => 'required|matches[password]',
                   'errors' => array(
                           'required' => 'Debe %s.',
                           'matches' => 'Las contraseñas no coinciden.'
                   )
           ),
           array(
                   'field' => 'type',
                   'label' => 'Tipo',
                   'rules' => 'callback_check_type'
                   )
           );
        $this->form_validation->set_rules($config);
      }

      function index()
      {
         if ($this->session->has_userdata('username') && $this->session->type == 'administrador')
         {
            $view_data['users'] = $this->administrar_usuario->usuarios();
            // $view_data['display'] = 'style="display:none"';

            if($this->form_validation->run())
            {
               $uname = $this->input->post('username');
               $pswd = $this->input->post('password');
               $tp = $this->input->post('type');
               if($this->administrar_usuario->agregar($uname, md5($pswd), $tp))
               {
                  $succes_data = array('msj' => 'Agregado', 'volver' => 'AdministrarUsuariosControladorWT4');

                  $this->load->view('header');
                  $this->load->view('succesView', $succes_data);
                  $this->load->view('WT4FooterView');
               } else {
                  $this->load->view('header');
                  $this->load->view('administrarUsuarios', $view_data);
                  $this->load->view('WT4FooterView');
               }
            } else {
               $this->load->view('header');
               $this->load->view('administrarUsuarios', $view_data);
               $this->load->view('WT4FooterView');
            }

         }else {
            redirect('login');
         }
      }

      function check_username($str)
      {
         if (empty($this->administrar_usuario->buscar_usuario($str)))
         {
            return true;
         }else {
            $this->form_validation->set_message('check_username', 'Este nombre de usuario esta ocupado');
            return false;
         }

      }

      function check_type($str)
      {
         if ($str === 'administrador' || $str === 'gerente' || $str === 'recepcionista') {
            return true;
         }else {
            $this->form_validation->set_message('check_type', 'El tipo debe ser recepcionista, gerente o administrador');
            return false;
         }
      }

      function eliminar($username)
      {
         if ($this->session->has_userdata('username') && $this->session->type == 'administrador')
         {
            if($this->administrar_usuario->eliminar($username))
            {
               $succes_data = array('msj' => 'Eliminado', 'volver' => 'AdministrarUsuariosControladorWT4');

               $this->load->view('header');
               $this->load->view('succesView', $succes_data);
               $this->load->view('WT4FooterView');
            }
         }
      }
   }

?>
