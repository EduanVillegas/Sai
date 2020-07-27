<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumible_model extends CI_Model {

	public function getConsumibles(){
		//$this->db->where("estado","1");
		$resultados = $this->db->get("consumibles");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("consumibles",$data);
	}
	public function getConsumible($id){
		$this->db->where("idconsumible",$id);
		$resultado = $this->db->get("consumibles");
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("idconsumible",$id);
		return $this->db->update("consumibles",$data);
	}
	public function delete($id){
		$this->db->where("idconsumible",$id);
		return $this->db->delete("consumibles");
	}
}
