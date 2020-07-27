<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobiliarios_model extends CI_Model {

	public function getMobiliarios(){
		//$this->db->where("estado","1");
		$this->db->select("m.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuario");
        $this->db->from("mobiliario m");
		$this->db->join("usuarios u","m.idUsuario = u.idUsuario");
		$this->db->where("estatus",1);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getMobiliariosID($id){
		//$this->db->where("estado","1");
		$this->db->select("m.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuario");
        $this->db->from("mobiliario m");
		$this->db->join("usuarios u","m.idUsuario = u.idUsuario");
		$this->db->where("estatus",1);
		$this->db->where("u.idUsuario",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getMobiliario($id){
		$this->db->select("m.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuario");
        $this->db->from("mobiliario m");
		$this->db->join("usuarios u","m.idUsuario = u.idUsuario");
		$this->db->where("idmobiliario",$id);
		$resultado = $this->db->get();
		return $resultado->row();
	}

	public function save($data){
		return $this->db->insert("mobiliario",$data);
	}
	public function getCategoria($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("mobiliario");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("idmobiliario",$id);
		return $this->db->update("mobiliario",$data);
	}
}
