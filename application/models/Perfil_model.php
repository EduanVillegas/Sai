<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_model extends CI_Model {

	public function getPerfiles(){
        $resultados = $this->db->get("perfiles");
		return $resultados->result();
	}
}
