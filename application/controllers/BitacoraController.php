<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BitacoraController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Bitacoras_model");
		$this->load->model("Usuarios_model");
		$this->load->library('email');
	}


	public function index()
	{
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("bitacorap");
		if ($privilegio == 1) {
			$data  = array(
				'bitacoras' => $this->Bitacoras_model->getBitacorass(),
				'usuarios' => $this->Usuarios_model->getUsuarios(),
			);
		} else {
			$data  = array(
				'bitacoras' => $this->Bitacoras_model->getBitacoras($id),
				'usuarios' => $this->Usuarios_model->getUsuarios(),
			);
		}

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/bitacoras/list", $data);
		$this->load->view("layouts/footer");
	}

	public function add()
	{
		$data  = array(
			'usuarios' => $this->Usuarios_model->getUsuariosJefes(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/bitacoras/add", $data);
		$this->load->view("layouts/footer", array("script" => "admin/bitacoras/javascript"));
	}

	public function store()
	{
		$fecha = $this->input->post("fecha");
		$motivo = $this->input->post("motivo");
		$hi = $this->input->post("hi");
		$hf = $this->input->post("hf");
		$usuario = $this->input->post("acusuario");
		$emailjf = $this->input->post("emailjf");
		$id = $this->session->userdata("id");

		$data  = array(
			'idUsuario' => $id,
			'bitFecha' => $fecha,
			'bitSalida' => $hi,
			'bitEntrada' => $hf,
			'bitObservaciones' => $motivo,
			'idJF' => $usuario,
		);
		$correo = $this->session->userdata("correo");
		$nombre = $this->session->userdata("nombre");
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
		$this->email->initialize($configGmail);
		$this->email->from($correo);
		$this->email->to('isis.romero@telnycs.com,alejandra.mendoza@telnycs.com,' . $emailjf);
		$this->email->subject('Solicitud de Bitacora: ' . $nombre);
		$this->email->message("Fecha: " . $fecha . "\nMotivo: " . $motivo . "\nHora de Inicio: " . $hi . "\nHora de Final: " . $hf);
		if ($this->email->send()) {
			if ($this->Bitacoras_model->save($data)) {
				redirect(base_url() . "BitacoraController");
			}
		} else {
			echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
		}
	}

	public function autorizacion()
	{
		$id = $this->session->userdata("id");
		$data  = array(
			'bitacoras' => $this->Bitacoras_model->getBitacorasRH(),
			'jfs' => $this->Bitacoras_model->getBitacorasJF($id),
			/* 'usuariosrhs' => $this->Bitacoras_model->getUsariosRH(),
            'usuariosjfs' => $this->Bitacoras_model->getUsuariosJF(),*/
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/bitacoras/autorizacion", $data);
		$this->load->view("layouts/footer", array("script" => "admin/bitacoras/javascript"));
	}

	public function storeRH()
	{
		$autoriozacion = $this->input->post("autorizacion");
		$motivo = $this->input->post("observaciones");
		$id = $this->input->post("idbrh");
		$correoto = $this->input->post("emailusu");
		$data  = array(
			'autRH' => $autoriozacion,
			'motRH' => $motivo
		);
		$correo = $this->session->userdata("correo");
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
		$this->email->initialize($configGmail);
		$this->email->from($correo);
		$this->email->to($correoto);
		$this->email->subject('Respuesta a solicitud de Bitacora');
		$this->email->message($motivo);
		if ($this->email->send()) {
			if ($this->Bitacoras_model->updateRH($id, $data)) {
				redirect(base_url() . "BitacoraController");
			}
		} else {
			echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
		}
	}
	public function storeJF()
	{
		$autorizacion = $this->input->post("autorizacion");
		$motivo = $this->input->post("observaciones");
		$id = $this->input->post("idbjf");
		$correoto = $this->input->post("emailusujf");

		$data  = array(
			'autJF' => $autorizacion,
			'motJF' => $motivo
		);

		$correo = $this->session->userdata("correo");
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
		$this->email->initialize($configGmail);
		$this->email->from($correo);
		$this->email->to($correoto);
		$this->email->subject('Respuesta a solicitud de Bitacora');
		$this->email->message($motivo);
		if ($this->email->send()) {
			if ($this->Bitacoras_model->updateJF($id, $data)) {
				$this->autorizacion();
			}
		} else {
			echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
		}
	}
	public function getCorreoAjax()
	{
		$id = $this->input->post("idJefe");
		$data = $this->Bitacoras_model->getCorreoJF($id);
		echo json_encode($data);
	}
}
