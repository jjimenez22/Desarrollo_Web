<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}

	public function index(){

		if ($this->session->userdata('username')) {
			redirect('Hotel');
		}

		if (isset($_POST['password'])){ /*Si existe la variable*/
			$this->load->model('usuario_model'); /*Para cargar el modelo*/
			/*Ya cargado el modelo se puede acceder al metodo*/
			if ($this->usuario_model->login($_POST['username'], md5($_POST['password']))){

				$this->session->set_userdata('username', $_POST['username']); /*para mantener la sesion que se ha iniciado (hasta que no se cierra no se puede hacer login de nuevo)*/
				redirect('Hotel');
			}
			else{
				redirect('login#bad-password');
			}
		}

		$this->load->view('Hotel/login');
	}

	/*Metodo para poder salir del login*/
	public function logout(){
		$this->session->sess_destroy();
		redirect('Hotel');
	}
}
?>
