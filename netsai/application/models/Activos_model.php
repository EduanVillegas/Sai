<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activos_model extends CI_Model
{

	public function getActivos()
	{
		$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		$this->db->where("a.activoOn", "1");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function getActivosManto()
	{
		$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		$this->db->where("a.activoOn", "1");
		$this->db->where("a.activomanto", 1);
		$resultados = $this->db->get();
		return $resultados->result();
		//$this->db->distinct();
		/*$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		$this->db->join("histomanto h", "a.idActivo=h.idactivo ");
		$this->db->where("a.activoOn", 1);
		$this->db->where("a.activomanto", 1);
		$resultados = $this->db->get();
		return $resultados->result();*/
	}
	public function getActivosId($id)
	{
		$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		$this->db->where("a.activoOn", "1");
		$this->db->where("u.idUsuario", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function save($data)
	{
		return $this->db->insert("activos", $data);
	}

	public function getActivo($id)
	{
		$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		$this->db->where("a.activoOn", "1");
		$this->db->where("a.idActivo", $id);
		$resultado = $this->db->get();
		return $resultado->row();
	}
	public function reporteactivo($id)
	{
		$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		//$this->db->join("histomanto h", "a.idActivo=h.idactivo");
		$this->db->where("a.activoOn", "1");
		$this->db->where("a.idActivo", $id);
		//$this->db->order_by("h.fechaManto", "desc");
		$resultado = $this->db->get();
		return $resultado->result();
	}
	public function getHistorialac($id)
	{
		$this->db->select("a.tipo,h.fechaac,h.estatusac,h.motivoac,h.hojaac,u.usuNombre,u.usuPaterno,u.usuMaterno");
		$this->db->from("historicoac h");
		$this->db->join("activos a", "h.idActivo = a.idActivo");
		$this->db->join("usuarios u", "h.idUsuario = u.idUsuario");
		$this->db->where("h.idActivo", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function update($id, $data)
	{
		$this->db->where("idActivo", $id);
		return $this->db->update("activos", $data);
	}

	public function saveHistorial($data)
	{
		return $this->db->insert("historicoac", $data);
	}

	public function getHistorialmanto($id)
	{
		$this->db->select("a.descripcionact,u.usuNombre,u.usuPaterno,u.usuMaterno,h.fechaManto,h.estatus,h.archivoManto");
		$this->db->from("histomanto h");
		$this->db->join("activos a", "h.idactivo = a.idActivo");
		$this->db->join("usuarios u", "h.idUsuario = u.idUsuario");
		$this->db->where("h.idActivo", $id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function saveManto($data)
	{
		return $this->db->insert("histomanto", $data);
	}

	public function getconsumibles()
	{
		$resultados = $this->db->get("consumibles");
		return $resultados->result();
	}


	public function saveActCom($data)
	{
		return $this->db->insert("activo_consumible", $data);
	}

	public function updateActCom($id, $cant)
	{
		$this->db->set('stock', 'stock-' . $cant, FALSE);
		$this->db->where('idconsumible', $id);
		return  $this->db->update('consumibles');
	}
	public function disponibles()
	{
		$this->db->select("a.*,fab.*,fam.*,e.*,u.idUsuario,u.usuNombre,u.usuPaterno,u.usuMaterno,u.usuario");
		$this->db->from("activos a");
		$this->db->join("fabricante fab", "a.idFabricante = fab.idFabricante");
		$this->db->join("familia fam", "a.idFamilia = fam.idFamilia");
		$this->db->join("empresa e", "a.idEmpresa = e.idEmpresa");
		$this->db->join("usuarios u", "a.idUsuario = u.idUsuario");
		$this->db->where("a.estatusActivo", "DISPONIBLE");
		$resultados = $this->db->get();
		return $resultados->result();
	}
}
