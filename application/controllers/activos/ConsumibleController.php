<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ConsumibleController extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
        $this->load->model("Consumible_model");
    }

    public function index()
    {
        $data  = array(
			'consumibles' => $this->Consumible_model->getConsumibles(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/consumible/listar",$data);
		$this->load->view("layouts/footer");
    }
    public function create()
    {
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/consumible/create");
        $this->load->view("layouts/footer");
    }
    public function store()
    {
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $marca = $this->input->post("marca");
        $modelo = $this->input->post("modelo");
        $fechac = $this->input->post("fechac");
        $costo = $this->input->post("costo");
        $factura = $this->input->post("factura");
        $stock = $this->input->post("stock");
        $codigo = $this->input->post("codigo");

        $data  = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'marca' => $marca,
            'modelo' => $modelo,
            'fecha_compra' => $fechac,
            'costo' => $costo,
            'stock' => $stock,
            'codigo_barra' => $codigo,
            'factura' => 'N/A'
        );
        if ($this->Consumible_model->save($data)) {
            redirect(base_url() . "activos/ConsumibleController");
        }
    }
    public function edit($id)
    {
        $data  = array(
			'consumibles' => $this->Consumible_model->getConsumible($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/consumible/edit",$data);
		$this->load->view("layouts/footer");
    }
    public function update()
    {
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");
        $marca = $this->input->post("marca");
        $modelo = $this->input->post("modelo");
        $fechac = $this->input->post("fechac");
        $costo = $this->input->post("costo");
        $factura = $this->input->post("factura");
        $stock = $this->input->post("stock");
        $codigo = $this->input->post("codigo");
        $id = $this->input->post("id");
        $data  = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'marca' => $marca,
            'modelo' => $modelo,
            'fecha_compra' => $fechac,
            'costo' => $costo,
            'stock' => $stock,
            'codigo_barra' => $codigo,
            'factura' => 'N/A'
        );
        if ($this->Consumible_model->update($id,$data)) {
            redirect(base_url() . "activos/ConsumibleController");
        }
    }

    public function delete($id)
    {
        if ($this->Consumible_model->delete($id)) {
            redirect(base_url() . "activos/ConsumibleController");
        }
    }
}
