<?php
 
class Perfil_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('perfil', $data);
    }
 
	function listar() {
		$query = $this->db->get('perfil');
		return $query->result_array();
	}
	
	function editar($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('perfil');
        return $query->row();
    }
 
    function atualizar($data) {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('perfil');
    }
     
    function deletar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('perfil');
    }

}

?>