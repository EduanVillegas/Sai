<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultas_model extends CI_Model {

	public function bitacoraRH($id){
		//$this->db->select("count(*) as numerosB");
		$this->db->where("idRH",$id);
		$resultados = $this->db->get("bitacora");
		return $resultados->num_rows(); 
		//return $resultados->row();
		//return $resultados->result();
	}
	public function bitacoraJF($id){
		//$this->db->select("count(*) as numerosB");
		$this->db->where("idJF",$id);
		$resultados = $this->db->get("bitacora");
		return $resultados->num_rows(); 
		//return $resultados->row();
		//return $resultados->result();
	}
}
