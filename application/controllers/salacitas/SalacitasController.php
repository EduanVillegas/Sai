<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalacitasController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model('Salas_model');
		$this->load->model("Usuarios_model");
	}

	public function index()
	{
		$data_calendar = $this->Salas_model->getSalas();
		$calendar = array();
		foreach ($data_calendar as  $val) {
			$calendar[] = array(
				'id' 	=> intval($val->id),
				'title' => $val->titulo,
				'description' => trim($val->descripcion),
				'start' => date_format(date_create($val->fecha_inicio), "Y-m-d H:i:s"),
				'end' 	=> date_format(date_create($val->fecha_final), "Y-m-d H:i:s"),
				'color' => $val->color,
				'invitado' => $val->invitado,
			);
		}
		$data = array();
		$data['get_data']			= json_encode($calendar);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/salacitas/listar", $data);
		$this->load->view("layouts/footer", array("script" => "admin/salacitas/javascript"));
	}
	
	public function listar()
	{
		$id = $this->session->userdata("id");
		$data = $this->Salas_model->getSalasUsuario($id);
		echo json_encode($data);
	}

	public function save()
	{
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$color = $this->input->post("color");
		$start = $this->input->post("start_date");
		$end = $this->input->post("end_date");
		$id = $this->input->post("idusuario");
		if ($this->session->userdata("idPerfil") == 8) {
			$data = array(
				'titulo' => $title,
				'descripcion' => $description,
				'color' => $color,
				'fecha_inicio' => $start,
				'fecha_final' => $end,
				'create_by' => $id,
				'invitado' => $this->input->post("invitado"),
			);
		}
		else {
			$data = array(
				'titulo' => $title,
				'descripcion' => $description,
				'color' => $color,
				'fecha_inicio' => $start,
				'fecha_final' => $end,
				'create_by' => $id,
			);
		}
		$resultado = $this->Salas_model->save($data);
		echo $resultado;


	}

	public function update()
	{
		$title = $this->input->post("title");
		$description = $this->input->post("description");
		$color = $this->input->post("color");
		$start = $this->input->post("start_date");
		$end = $this->input->post("end_date");
		$id = $this->input->post("calendar_id");

		//redirect(base_url() . "activos/activos");
		//echo $title.$description.$color.$start.$end ;
		$data = array(
			'titulo' => $title,
			'descripcion' => $description,
			'color' => $color,
			'fecha_inicio' => $start,
			'fecha_final' => $end
		);
		$resultado = $this->Salas_model->update($id, $data);
		echo $resultado;
	}

	public function delete($id)
	{
		//$id = $this->input->post("id");
		//	$sql = "DELETE FROM salas WHERE id = ?";
		//	$this->db->query($sql, $id);
		//	$resultado = ($this->db->affected_rows()!=1)?false:true;
		//$resultado = $this->db->delete("salas");
		$resultado = $this->Salas_model->delete($id);
		//echo $resultado;
		$this->index();
	}

	public function dragUpdateEvent()
	{
		$start = $this->input->post("start");
		$end = $this->input->post("end");
		$id = $this->input->post("id");
		$data = array(
			'fecha_inicio' => $start,
			'fecha_final' => $end
		);
		$result = $this->Salas_model->dragUpdateEvent($id, $data);
		echo $result;
	}
}
