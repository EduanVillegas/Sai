<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mantenimiento_model extends CI_Model
{

    public function getMantenimientos()
    {
        //$this->db->select('*');
        $this->db->from('mantenimiento m');
        $this->db->join('usuarios u', 'm.idusuario = u.idUsuario');
        $this->db->join('catalogo_mantenimiento cm', 'm.idcatalagomanto = cm.idcatalagomanto');
        $this->db->where("m.condicion",1);
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function getMantenimientosID($id)
    {
        //$this->db->select('*');
        $this->db->from('mantenimiento m');
        $this->db->join('usuarios u', 'm.idusuario = u.idUsuario');
        $this->db->join('catalogo_mantenimiento cm', 'm.idcatalagomanto = cm.idcatalagomanto');
        $this->db->where("m.condicion",1);
        $this->db->where("u.idusuario",$id);
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getMantenimiento($id)
    {
        //$this->db->select("*");
        $this->db->from("mantenimiento m");
        $this->db->join("usuarios u", "m.idusuario = u.idUsuario");
        $this->db->join("catalogo_mantenimiento cm", "m.idcatalagomanto = cm.idcatalagomanto");
        $this->db->where("m.idmantenimiento",$id);
        $this->db->where("m.condicion",1);
        $resultados = $this->db->get();
        return $resultados->row();
        //10.1.4.14
    }
    
    public function getCatalogo()
    {
        //$this->db->where("estado","1");
        $resultados = $this->db->get("catalogo_mantenimiento");
        return $resultados->result();
    }

    public function save($data)
    {
        return $this->db->insert("mantenimiento", $data);
    }

    public function getCategoria($id)
    {
        $this->db->where("id", $id);
        $resultado = $this->db->get("categorias");
        return $resultado->row();
    }

    public function update($id, $data)
    {
        $this->db->where("idmantenimiento", $id);
        return $this->db->update("mantenimiento", $data);
    }

    public function ajaxManto($id)
    {
		$this->db->select("m.*,u.idUsuario,u.usucorreo");
		$this->db->from("mantenimiento m");
        $this->db->join("usuarios u", "m.idusuario = u.idUsuario");
        $this->db->join("catalogo_mantenimiento cm", "m.idcatalagomanto = cm.idcatalagomanto");
        $this->db->where("m.idmantenimiento",$id);
        $this->db->where("m.condicion",1);
        $resultados = $this->db->get();
        return $resultados->row();
      /*  $this->db->where("idmantenimiento", $id);
        $resultado =$this->db->get("mantenimiento");
        return $resultado->row();
		*/
    }
	
	public function ajaxHistomanto($id){
		$this->db->select("h.comentarios,m.asunto,h.estatus,h.fecha,u.usuNombre");
		$this->db->from("histomantousu h");
        $this->db->join("usuarios u", "h.idusuario = u.idUsuario");
        $this->db->join("mantenimiento m", "h.idmanto=m.idmantenimiento");
        $this->db->where("h.idmanto",$id);
        $resultados = $this->db->get();
        return $resultados->result();
	}

    public function saveActManto($data)
    {
        return $this->db->insert("histomantousu", $data);
    }
}
