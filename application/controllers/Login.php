<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	    {
	        parent::__construct();
	        $this->load->model('Usuarios_model', 'model', TRUE);
	    }

	function index($mensagem = null) {

		$data [] = null;

		if( isset($mensagem ['erros'])) {
			$data['erros']=  $mensagem ['erros'];
		}

	     $this->load->view('login/index.php',$data);

	    //$this->load->view('usuarios/listar.php', $data);
	
	}

	function logar() {

	    
		$data['email'] = $this->input->post('email');
		$data['senha'] = md5($this->input->post('senha'));

		$resultado = $this->model->logar($data);

		if ( $resultado != null) { 

			$this->session->set_userdata('usuario',get_object_vars($resultado));
			redirect('usuarios');

		}else {

			$mensagem['erros'] = 'Login invalido';
			$this->index($mensagem);

		}

	    //$this->load->view('usuarios/listar.php', $data);
	
	}			



}
