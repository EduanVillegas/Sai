<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tickets_model extends CI_Model {

	public function getTicketsID($id){
		$this->db->select("t.*,u.*,c.*");
		$this->db->from("tickets t");
        $this->db->join("usuarios u","t.idUsuario=u.idUsuario");
        $this->db->join("catalogoservsop c","t.idServSoporte=c.idServSoporte");
		$this->db->where("u.idUsuario",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getTickets(){
		$this->db->select("t.*,u.*,c.*");
		$this->db->from("tickets t");
        $this->db->join("usuarios u","t.idUsuario=u.idUsuario");
        $this->db->join("catalogoservsop c","t.idServSoporte=c.idServSoporte");
	//	$this->db->where("u.idUsuario",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}
    public function getCatalagos(){
		$resultados = $this->db->get("catalogoservsop");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("tickets",$data);
	}
	public function savehistorial($data){
		return $this->db->insert("historicotic",$data);
	}
	public function getTicket($id){
		$this->db->where("idTickets",$id);
		$resultado = $this->db->get("tickets");
		return $resultado->row();
	}

	public function updatehistorial($id,$data){
		$this->db->where("idTickets",$id);
		return $this->db->update("tickets",$data);
	}
}
