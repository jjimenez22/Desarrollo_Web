<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		$view_data = array ('display' => 'style="display: none"');

		if ($this->session->has_userdata('username')) {
			redirect('Hotel');
		}

		if (isset($_POST['password'])){ /*Si existe la variable*/
			$this->load->model('usuario_model'); /*Para cargar el modelo*/
			/*Ya cargado el modelo se puede acceder al metodo*/
			$userdata=$this->usuario_model->login($_POST['username'], md5($_POST['password']));
			if (!empty($userdata)){

				$this->session->set_userdata($userdata); /*para mantener la sesion que se ha iniciado (hasta que no se cierra no se puede hacer login de nuevo)*/
				redirect('Hotel/administrar');
			}
			else{
				$view_data['display']='';
			}
		}

		$this->load->view('header');
		$this->load->view('login', $view_data);
		$this->load->view('WT4FooterView');
	}

	/*Metodo para poder salir del login*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('hotel');
	}
}
?>
