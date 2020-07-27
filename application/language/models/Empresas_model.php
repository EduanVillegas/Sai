<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_model extends CI_Model {

	public function getEmpresas(){
        $resultados = $this->db->get("empresa");
		return $resultados->result();
	}
}
