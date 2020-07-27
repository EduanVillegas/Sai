<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bitacoras_model extends CI_Model {

	public function getBitacoras($id){
		$this->db->where("idUsuario",$id);
		$resultados = $this->db->get("bitacora");
		return $resultados->result();
	}

	public function getBitacorass(){
		//$this->db->where("idUsuario",$id);
		$resultados = $this->db->get("bitacora");
		return $resultados->result();
	}

	public function getBitacorasRH(){
		//$this->db->where("idRH",4);
		$resultados = $this->db->get("bitacora");
		return $resultados->result();
	}

	public function getBitacorasJF($id){
		$this->db->select("b.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario,u.usucorreo");
        $this->db->from("bitacora b");
        $this->db->join("usuarios u","b.idUsuario = u.idUsuario");
		$this->db->where("idJF",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUsuariosRH(){
		$this->db->where("idArea",4);
		$resultados = $this->db->get("usuarios");
		return $resultados->result();
	}

	public function getUsuariosJF(){
		$this->db->where("idPerfil",1);
		$resultados = $this->db->get("usuarios");
		return $resultados->result();
	}
	public function save($data){
		return $this->db->insert("bitacora",$data);
	}

	public function getBitacora($id){
		$this->db->where("idBitacora",$id);
		$resultado = $this->db->get("bitacora");
		return $resultado->row();
	}

	public function updateJF($id,$data){
		$this->db->where("idBitacora",$id);
		return $this->db->update("bitacora",$data);
	}
	
	public function updateRH($id,$data){
		$this->db->where("idBitacora",$id);
		return $this->db->update("bitacora",$data);
	}
	public function getCorreoJF($id){
		$this->db->where("idUsuario",$id);
		$resultado = $this->db->get("usuarios");
		return $resultado->row();
	}
}
