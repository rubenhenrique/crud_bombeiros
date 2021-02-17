    <?php
     
    class Usuarios_model extends CI_Model {
     
        function __construct() {
            parent::__construct();
        }
     
        function inserir($data) {
            return $this->db->insert('usuarios', $data);
        }
     
    	function listar() {
    		$query = $this->db->get('usuarios');
    		return $query->result();
    	}
    	
    	function editar($id) {
            $this->db->where('id', $id);
            $query = $this->db->get('usuarios');
            return $query->row();
        }
     
        function atualizar($data) {
            $this->db->where('id', $data['id']);
            $this->db->set($data);
            return $this->db->update('usuarios');
        }

        function logar($data) {
            $this->db->where('email', $data['email']);
            $this->db->where('senha', md5($this->input->post('senha')));

            $query = $this->db->get('usuarios'); 

            return $query->row();
        }    
         
        function deletar($id) {
            $this->db->where('id', $id);
            return $this->db->delete('usuarios');
        }

    }

    ?>