<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hotel extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
	}

	function index(){
		$this->load->view('Hotel/header');
	}
}
?>