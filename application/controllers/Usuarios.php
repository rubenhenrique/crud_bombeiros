	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Usuarios extends CI_Controller {

		function __construct()
		    {
		        parent::__construct();
		        $this->load->model('Usuarios_model', 'model', TRUE);
		        if (!isset($this->session->usuario)){
		        	$this->session->set_flashdata('erro_logado','Você precisa estar logado para acessar essa página.');
					redirect('login');	
		        }
		    }



		function novo($mensagem = '') {

			$this->load->model('Perfil_model', 'model_perfil', TRUE);

			if ($this->session->usuario['id_perfil'] != '1'){
					$this->load->view('errors/html/erro_503.php');	
		    }

		    else{

			$data['perfis'] = $this->model_perfil->listar();

			$data['titulo'] = "Cadastrar usuário";

			if( isset($mensagem ['erros'])) {
			$data['erros']=  $mensagem ['erros'];
			}

			if( isset($mensagem ['sucesso'])) {
			$data['sucesso']=  $mensagem ['sucesso'];
			}

		    $this->load->helper('form');
		    $this->template->load('template', 'usuarios/novo.php',$data);

			}
		
		}

		function inserir() {
	 
			$this->load->library('form_validation');
		 
			$this->form_validation->set_error_delimiters('<span>', '</span>');
		 
			$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[50]');
			$this->form_validation->set_rules('id_perfil', 'Perfil', 'required');
			$this->form_validation->set_rules('email', 'E-mail', 'required|max_length[100]|is_unique[usuarios.email]');
			$this->form_validation->set_rules('senha', 'Senha', 'required|max_length[50]');
			$this->form_validation->set_rules('senhaconf', 'Confirmar de Senha','required|matches[senha]');
		 
			if ($this->form_validation->run() === FALSE) {
				$mensagem['erros'] =  validation_errors();
				$this->novo($mensagem);
			} else {

				$data['nome'] = $this->input->post('nome');
				$data['email'] = $this->input->post('email');
				$data['senha'] = md5($this->input->post('senha'));
				$data['id_perfil'] = $this->input->post('id_perfil');

			if ($this->model->inserir($data)) {
				$mensagem['sucesso'] = 	'Sucesso ao inserir um usuário';
					$this->novo($mensagem);
				} else {
					$mensagem['erros'] = 'Erro ao inserir um usuário';
				}
			}

		}

		function editar($id, $mensagem = '')  {

			if ($this->session->usuario['id_perfil'] != '1'){
					$this->load->view('errors/html/erro_503.php');	
		    } else{

		    $data['titulo'] = "Editar usuário";	
	 
			$data['dados_usuario'] = $this->model->editar($id);

			$this->load->model('Perfil_model', 'model_perfil', TRUE);
			$data['perfis'] = $this->model_perfil->listar();

			if( isset($mensagem ['erros'])) {
			$data['erros']=  $mensagem ['erros'];
			}

			if( isset($mensagem ['sucesso'])) {
			$data['sucesso']=  $mensagem ['sucesso'];
			}

			$this->template->load('template', 'usuarios/novo.php',$data);

			}
		
		}

		function atualizar() {
	 
			$this->load->library('form_validation');
		 
			$this->form_validation->set_error_delimiters('<span>', '</span>');
		 
			$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[50]');
			$this->form_validation->set_rules('email', 'E-mail', 'required|max_length[100]');
			$this->form_validation->set_rules('senha', 'Senha', 'required|max_length[50]');
			$this->form_validation->set_rules('senhaconf', 'Confirmar de Senha','required|matches[senha]');

			$data['id'] = $this->input->get('id');
		 
			if ($this->form_validation->run() === FALSE) {
				$mensagem['erros'] =  validation_errors();
				$this->editar($data['id'],$mensagem);
			} else {
				
				$data['nome'] = $this->input->post('nome');
				$data['email'] = $this->input->post('email');
				$data['senha'] = md5($this->input->post('senha'));

		 
				$this->model->atualizar($data);

				if ($this->model->atualizar($data)) {
					$mensagem['sucesso'] = 	'Sucesso ao editar um usuário';
					$this->editar($data['id'],$mensagem);
				} else {
					$mensagem['erros'] = 'Erro ao editar um usuário';
				}

			}

	}

		function index() {

		    $this->load->helper('form');
		    $data['titulo'] = "CRUD com CodeIgniter | Cadastro de usuário";
		    $data['usuarios'] = $this->model->listar();
		    $this->template->load('template', 'usuarios/listar.php',$data);
		
		}	


		function deletar($id) {
	 
	 	if ($this->model->deletar($id)) {
			$this->index();
		} else {
			log_message('error', 'Erro ao deletar o usuário.');
		}
	}


	}
