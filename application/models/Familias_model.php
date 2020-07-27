<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Familias_model extends CI_Model {

	public function getFamilias(){
		$resultados = $this->db->get("familia");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("categorias",$data);
    }

	public function getActivo($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("categorias");
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("categorias",$data);
	}
}