<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Usuarios_model");
		$this->load->model("Consultas_model");
	}
	public function index()
	{
		$id = $this->session->userdata("id");
		$data  = array(
			'usuarios' => $this->Usuarios_model->noUsuarios(),
		);
		$consultas  = array(
			'bit' => $this->Consultas_model->bitacoraRH($id),
			'bitjf' => $this->Consultas_model->bitacoraJF($id)
		);
		/*$query = $this->db->query('SELECT * FROM bitacora');
		$consultas  = $query->num_rows();*/
		$marcados = $this->Usuarios_model->usuariospermisos($this->session->userdata("id"));
		//declaramos el array para almacenar todos los registros marcados
		$valores = array();
		$privilegios = array();
		//Almacenamos los permisos marcados en el array
		foreach ($marcados as $row) :
			$valores[] = $row->idPermiso;
			$privilegios[] = $row->idprivilegio;
		endforeach;
		////Determinamos los accesos del usuario
		//si los id_permiso estan en el array $valores entonces se ejecuta la session=1, en caso contrario el usuario no tendria acceso al modulo

		in_array(1, $valores) ? $this->session->set_userdata('administrador', 1) : $this->session->set_userdata('administrador', 0);
		in_array(2, $valores) ? $this->session->set_userdata('activo', 1) : $this->session->set_userdata('activo', 0);
		in_array(3, $valores) ? $this->session->set_userdata('bitacora', 1) : $this->session->set_userdata('bitacora', 0);
		in_array(4, $valores) ? $this->session->set_userdata('calendario', 1) : $this->session->set_userdata('calendario', 0);
		in_array(5, $valores) ? $this->session->set_userdata('mobiliario', 1) : $this->session->set_userdata('mobiliario', 0);
		in_array(6, $valores) ? $this->session->set_userdata('pagina', 1) : $this->session->set_userdata('pagina', 0);
		in_array(7, $valores) ? $this->session->set_userdata('sala', 1) : $this->session->set_userdata('sala', 0);
		in_array(8, $valores) ? $this->session->set_userdata('soporte', 1) : $this->session->set_userdata('soporte', 0);
		in_array(9, $valores) ? $this->session->set_userdata('tarea', 1) : $this->session->set_userdata('tarea', 0);
		in_array(10, $valores) ? $this->session->set_userdata('RH', 1) : $this->session->set_userdata('RH', 0);
		in_array(11, $valores) ? $this->session->set_userdata('mantenimiento', 1) : $this->session->set_userdata('mantenimiento', 0);

		$id = $this->session->userdata("id");
		if ($this->session->userdata("administrador") == 1) {
			$no=$this->Usuarios_model->privilegio(1, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('administradorp', 1) : $this->session->set_userdata('administradorp', 0);
		}
		if ($this->session->userdata("activo") == 1) {
			$no=$this->Usuarios_model->privilegio(2, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('activop', 1) : $this->session->set_userdata('activop', 0);
		}
		if ($this->session->userdata("bitacora") == 1) {
			$no=$this->Usuarios_model->privilegio(3, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('bitacorap', 1) : $this->session->set_userdata('bitacorap', 0);
		}
		if ($this->session->userdata("calendario") == 1) {
			$no=$this->Usuarios_model->privilegio(4, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('calendariop', 1) : $this->session->set_userdata('calendariop', 0);
		}
		if ($this->session->userdata("mobiliario") == 1) {
			$no=$this->Usuarios_model->privilegio(5, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('mobiliariop', 1) : $this->session->set_userdata('mobiliariop', 0);
		}
		if ($this->session->userdata("pagina") == 1) {
			$no=$this->Usuarios_model->privilegio(6, $id); 
			$no->idprivilegio=="1" ? $this->session->set_userdata('paginap', 1) : $this->session->set_userdata('paginap', 0);
		}
		if ($this->session->userdata("sala") == 1) {
			$no=$this->Usuarios_model->privilegio(7, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('salap', 1) : $this->session->set_userdata('salap', 0);
		}
		if ($this->session->userdata("soporte") == 1) {
			$no=$this->Usuarios_model->privilegio(8, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('soportep', 1) : $this->session->set_userdata('soportep', 0);
		}
		if ($this->session->userdata("tarea") == 1) {
			$no=$this->Usuarios_model->privilegio(9, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('tareap', 1) : $this->session->set_userdata('tareap', 0);
		}
		if ($this->session->userdata("RH") == 1) {
			$no=$this->Usuarios_model->privilegio(10, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('RHp', 1) : $this->session->set_userdata('RHp', 0);
		}
		if ($this->session->userdata("mantenimiento") == 1) {
			$no=$this->Usuarios_model->privilegio(11, $id);
			$no->idprivilegio=="1" ? $this->session->set_userdata('mantenimientop', 1) : $this->session->set_userdata('mantenimientop', 0);
		}
		//echo $this->session->userdata("soportep");
		$this->load->view("layouts/header", $consultas);
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard", $data);
		$this->load->view("layouts/footer");
	}
}
