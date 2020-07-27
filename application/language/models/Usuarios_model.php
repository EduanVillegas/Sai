<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios_model extends CI_Model
{

	public function login($username, $password)
	{
		$this->db->where("usuario", $username);
		$this->db->where("password", $password);
		$this->db->where("usuActivo", 1);

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		} else {
			return false;
		}
	}

	public function getUsuarios()
	{
		$this->db->select("u.*,e.nombreempresa,a.nombrearea,p.pernombre");
		$this->db->from("usuarios u");
		$this->db->join("empresa e", "u.idempresa = e.idempresa");
		$this->db->join("perfiles p", "u.idperfil = p.idperfil");
		$this->db->join("areas a", "u.idarea = a.idarea");
		$this->db->where("u.usuActivo", "1");
		$this->db->order_by("u.usuNombre", "asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUsuariosID($id)
	{
		$this->db->select("u.*,e.nombreempresa,a.nombrearea,p.pernombre");
		$this->db->from("usuarios u");
		$this->db->join("empresa e", "u.idempresa = e.idempresa");
		$this->db->join("perfiles p", "u.idperfil = p.idperfil");
		$this->db->join("areas a", "u.idarea = a.idarea");
		$this->db->where("u.idUsuario", $id);
		$this->db->order_by("u.usuNombre", "asc");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUsuariosJefes()
	{
		$this->db->select("u.*,e.nombreempresa,a.nombrearea,p.pernombre");
		$this->db->from("usuarios u");
		$this->db->join("empresa e", "u.idempresa = e.idempresa");
		$this->db->join("perfiles p", "u.idperfil = p.idperfil");
		$this->db->join("areas a", "u.idarea = a.idarea");
		$this->db->where("u.usuActivo", "1");
		$this->db->where("u.idPerfil", "1");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function usuariospermisos($id)
	{
		$this->db->where("idUsuario", $id);
		$resultados = $this->db->get("usuariopermiso");
		return $resultados->result();
	}

	public function getUsuario($id)
	{
		$this->db->where("idUsuario", $id);
		$resultado = $this->db->get("usuarios");
		return $resultado->row();
	}

	public function save($data)
	{
		return $this->db->insert("usuarios", $data);
	}

	public function delete($data)
	{
		return $this->db->insert("usuarios", $data);
	}

	public function update($id, $data)
	{
		$this->db->where("idUsuario", $id);
		return $this->db->update("usuarios", $data);
	}

	public function noUsuarios()
	{
		return $this->db->query('SELECT * FROM usuarios');
	}

	public function BuscarNumero($id)
	{
		$this->db->select("folio");
		//$this->db->from();
		$this->db->like('folio', $id);
		//$this->db->where("idPerfil", $id);
		$this->db->order_by('folio', 'DESC');
		$resultado = $this->db->get("usuarios" ,0, 1);
		return $resultado->row();
	}

	public function getpermisos()
	{
		$resultados = $this->db->get("permisos");
		return $resultados->result();
	}

	public function getpermisosID($id)
	{
		$this->db->select("*");
		$this->db->from("usuariopermiso usup");
		$this->db->join("permisos p","usup.idPermiso=p.idpermiso");
		$this->db->join("usuarios u","usup.idUsuario=u.idUsuario");
		$this->db->where("u.idUsuario",$id);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUsuPer($id)
	{
		$this->db->where("idUsuario", $id);
		$resultados = $this->db->get("usuariopermiso");
		return $resultados->result();
	}

	public function lastID(){
		return $this->db->insert_id();
	}

	public function save_permisos($data){
		$this->db->insert("usuariopermiso",$data);
	}

	public function delete_permisos($id){
		$this->db->where('idUsuario', $id);
		$this->db->delete("usuariopermiso");
	}

	public function getPerfil($id)
	{
		$this->db->select("u.*,e.*,a.*,p.*");
		$this->db->from("usuarios u");
		$this->db->join("empresa e", "u.idempresa = e.idempresa");
		$this->db->join("perfiles p", "u.idperfil = p.idperfil");
		$this->db->join("areas a", "u.idarea = a.idarea");
		$this->db->where("u.usuActivo", "1");
		$this->db->where("u.idUsuario", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function updateperfil($id, $data)
	{
		$this->db->where("idUsuario", $id);
		return $this->db->update("usuarios", $data);
	}
	
	public function privilegio($no,$usu)
	{
		$this->db->where("idUsuario", $usu);
		$this->db->where("idPermiso", $no);
		$resultado = $this->db->get("usuariopermiso");
		return $resultado->row();
	}

}
