<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Salas_model extends CI_Model
{

	public function getSalas()
	{
		//$this->db->where("estado","1");
		$resultados = $this->db->get("salas");
		return $resultados->result();
	}
	public function getSalasUsuario($id)
	{
		$this->db->where("create_by",$id);
		$resultados = $this->db->get("salas");
		return $resultados->result();
	}

	public function save($data)
	{
		return $this->db->insert("salas", $data);
		//return ($this->db->affected_rows()!=1)?false:true;
	}
	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete("salas");
	}

	public function update($id, $data)
	{
		$this->db->where("id", $id);
		return $this->db->update("salas", $data);
	}

	Public function dragUpdateEvent($id,$data)
	{
		$this->db->where("id", $id);
		return $this->db->update("salas", $data);
	}

}
