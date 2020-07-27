<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Areas_model extends CI_Model {

    public function getAreas(){
        $resultados = $this->db->get("areas");
		return $resultados->result();
	}
}
