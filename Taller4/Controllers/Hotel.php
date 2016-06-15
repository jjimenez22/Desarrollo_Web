<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	function index(){
		$this->loadView('WT4CarouselView');
	}

	function administrar(){
		if($this->session->has_userdata('username'))
		{
			$this->loadView('WT4MenuAdministracionView');
		}else {
			redirect('login');
		}
	}

	function loadView($view){
		$this->load->view('header');
		$this->load->view($view);
		$this->load->view('WT4FooterView');
	}
}
?>
