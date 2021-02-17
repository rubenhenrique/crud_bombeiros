<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends CI_Controller {

	function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Perfil_model', 'model', TRUE);
	    }

	function listar() {

	    $this->load->helper('form');

	    return $this->model->listar();	
	}	

}
