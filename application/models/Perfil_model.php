<?php
 
class Perfil_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
	function listar() {
		$query = $this->db->get('perfil');
		return $query->result_array();
	}

}

?>