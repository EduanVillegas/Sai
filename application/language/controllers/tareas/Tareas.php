<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
        $this->load->model("Tareas_model");
        $this->load->model("Usuarios_model");
	}

	public function index()
	{
		$data  = array(
			'tareas' => $this->Tareas_model->getTareas() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tareas/listar",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){
        $data =array( 
			"usuarios" => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tareas/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){

		$usuario = $this->input->post("usuariot");
		$area = $this->input->post("areat");
		$fechaat = $this->input->post("fechaat");
		$titulo = $this->input->post("titulot");
		$descripcion = $this->input->post("descripciont");
		$fechaet = $this->input->post("fechaet");
		$estatus = $this->input->post("estatust");
		$archivot = $this->input->post("archivot");
		$color = '#e5f1f4';
		$textoc = '#000000';
		$txtfechaet = $fechaet . ' 22:00:00';
		$tipot = 'TAREA';
		$echot = 0;

		if (!file_exists($_FILES['archivot']['tmp_name']) || !is_uploaded_file($_FILES['archivot']['tmp_name'])) {
			$UsuarioActual = $this->session->userdata("usuario");
			$fecha = date("Ymd");
			$hora = date("His");
		
			$target_path = "tareasb/";
			$archivo = $_FILES["archivot"]["tmp_name"];
			$documento  = $_FILES["archivot"]["name"];
			$ext = explode(".", $documento);
			$extension = end($ext);
			///$codifica = md5();
			//$nombre_interno = $codifica . '.' . $extension;
			//move_uploaded_file($archivo, $target_path . $nombre_interno);
		}

		$this->form_validation->set_rules("titulot","Titulo","required|is_unique[tareas.title]");

		if ($this->form_validation->run()==TRUE) {

			$data  = array(
				'idUsuario' => $usuario, 
				'idArea' => $area,
				'start' => $fechaat,
				'title' => $titulo, 
				'descripcion' => $descripcion,
				'color' => $color,
				'textColor' => $textoc, 
				'end' => $fechaet,
				'estatusTarea' => $estatus,
				'echoT' => $echot, 
				'tareafisicob' => $documento,
				//'nombrefisicob' => $nombre_interno,
				'idAsigno' => $descripcion,
				'tipo' => "1"
			);

			if ($this->Categorias_model->save($data)) {
				redirect(base_url()."mantenimiento/categorias");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/categorias/add");
			}
		}
		else{
			/*redirect(base_url()."mantenimiento/categorias/add");*/
			$this->add();
		}
	}

	public function edit($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/categorias/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idCategoria = $this->input->post("idCategoria");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");

		$categoriaactual = $this->Categorias_model->getCategoria($idCategoria);

		if ($nombre == $categoriaactual->nombre) {
			$is_unique = "";
		}else{
			$is_unique = "|is_unique[categorias.nombre]";

		}


		$this->form_validation->set_rules("nombre","Nombre","required".$is_unique);
		if ($this->form_validation->run()==TRUE) {
			$data = array(
				'nombre' => $nombre, 
				'descripcion' => $descripcion,
			);

			if ($this->Categorias_model->update($idCategoria,$data)) {
				redirect(base_url()."mantenimiento/categorias");
			}
			else{
				$this->session->set_flashdata("error","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/categorias/edit/".$idCategoria);
			}
		}else{
			$this->edit($idCategoria);
		}

		
	}

	public function view($id){
		$data  = array(
			'categoria' => $this->Categorias_model->getCategoria($id), 
		);
		$this->load->view("admin/categorias/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "0", 
		);
		$this->Categorias_model->update($id,$data);
		echo "mantenimiento/categorias";
	}
}
