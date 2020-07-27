<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MantenimientoController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Mantenimiento_model");
		$this->load->library('email');
	}


	public function index()
	{
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("mantenimientop");
		if ($privilegio == 1) {
			$data  = array(
				'mantenimientos' => $this->Mantenimiento_model->getMantenimientos()
			);
		} else {
			
			$data  = array(
				'mantenimientos' => $this->Mantenimiento_model->getMantenimientosID($id)
			);
		}
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/mantenimiento/listar", $data);
		$this->load->view("layouts/footer", array("script" => "admin/mantenimiento/javascript"));
	}

	public function create()
	{
		$id = $this->session->userdata("id");
		$data  = array(
			'catalogos' => $this->Mantenimiento_model->getCatalogo()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/mantenimiento/create", $data);
		$this->load->view("layouts/footer", array("script" => "admin/mantenimiento/javascript"));
	}

	public function store()
	{
		$data = array(
			'idusuario' => $this->session->userdata("id"),
			'idcatalagomanto' => $this->input->post('catalogo'),
			'asunto' => $this->input->post('asunto'),
			'descripcion' => $this->input->post('descripcion'),
			'estatus' => $this->input->post('estatus'),
		);
		 $configGmail = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'netsai@inovetel.com.mx',
            'smtp_pass' => 'ADMON1920$',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
		);
		$correo = $this->session->userdata("correo");
        $this->email->initialize($configGmail);
        $this->email->from($correo);
        $this->email->to('servicios@telnycs.com.mx ','jesus.mendoza@telnycs.com');
        $this->email->subject('Alta de Ticket');
        $this->email->message("Su ticket sera atendido lo mas pronto posible:_" .$this->input->post('asunto'));
        if ($this->email->send()) {
            if ($this->Mantenimiento_model->save($data)) {
				redirect(base_url() . "tickets/MantenimientoController");
			}
        } else {
            echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
        }
		
	}

	public function edit($id)
	{
		//$id = $this->session->userdata("id");
		$data  = array(
			'catalogos' => $this->Mantenimiento_model->getCatalogo(),
			'mantenimientos' => $this->Mantenimiento_model->getMantenimiento($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/mantenimiento/edit", $data);
		$this->load->view("layouts/footer", array("script" => "admin/mantenimiento/javascript"));
	}

	public function update()
	{
		$id = $this->input->post('idmanto');
		$data = array(
			'idusuario' => $this->input->post("idusuario"),
			'idcatalagomanto' => $this->input->post('catalogo'),
			'asunto' => $this->input->post('asunto'),
			'descripcion' => $this->input->post('descripcion'),
			'estatus' => $this->input->post('estatus'),
		);
		if ($this->Mantenimiento_model->update($id, $data)) {
			redirect(base_url() . "tickets/MantenimientoController");
		}
	}

	public function delete($id)
	{
		//$id =$this->input->post('idmanto');
		$data = array(
			'condicion' => "0",
		);
		if ($this->Mantenimiento_model->update($id, $data)) {
			redirect(base_url() . "tickets/MantenimientoController");
		}
	}

	public function viewajax()
	{
		$id = $this->input->post('id');
		$data  =  $this->Mantenimiento_model->ajaxManto($id);
		echo json_encode($data);
	}
	
	public function viewhistomanto()
	{
		$id = $this->input->post('id');
		$data  =  $this->Mantenimiento_model->ajaxHistomanto($id);
		echo json_encode($data);
	}
	
	public function storeActManto()
	{
		$data = array(
			'idusuario' => $this->session->userdata("id"),
			'idmanto' => $this->input->post('idmanto'),
			'comentarios' => $this->input->post("comentarios"),
			'estatus' => $this->input->post('estatus'),
		);
		$configGmail = array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'netsai@inovetel.com.mx',
            'smtp_pass' => 'ADMON1920$',
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
		);
		$correo = $this->session->userdata("correo");
        $this->email->initialize($configGmail);
        $this->email->from($correo);
        $this->email->to($this->input->post("correousu"));
        $this->email->subject('Respuesta de Ticket');
        $this->email->message("Respuesta de  ticket:_" .$this->input->post('asunto'));
        if ($this->email->send()) {
            if ($this->Mantenimiento_model->saveActManto($data)) {
				//redirect(base_url() . "tickets/MantenimientoController");
				$data2 = array(
					'estatus' => $this->input->post('estatus')
				);
				if ($this->Mantenimiento_model->update($this->input->post('idmanto'), $data2)) {
				redirect(base_url() . "tickets/MantenimientoController");
				}
			}
        } else {
            echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
        }
		
	}
	
		public function estado($id)
	{
		//$id =$this->input->post('idmanto');
		$data = array(
			'estatus' => "Cerrado",
		);
		if ($this->Mantenimiento_model->update($id, $data)) {
			redirect(base_url() . "tickets/MantenimientoController");
		}
	}
}
