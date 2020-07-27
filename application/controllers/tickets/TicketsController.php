<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TicketsController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Tickets_model");
		$this->load->library('ciqrcode');
		$this->load->library('email');
	}


	public function index()
	{
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("soportep");
		if ($privilegio == 1) {
			$data  = array(
				'tickets' => $this->Tickets_model->getTickets()
			);
		} else {
			$data  = array(
				'tickets' => $this->Tickets_model->getTicketsID($id),
			);
		}
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tickets/listar", $data);
		$this->load->view("layouts/footer", array("script" => "admin/tickets/javascript"));
	}

	public function add()
	{
		$data  = array(
			'catalagos' => $this->Tickets_model->getCatalagos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/tickets/add", $data);
		$this->load->view("layouts/footer");
	}

	public function store()
	{
		$catalogo = $this->input->post("catalogo");
		$asunto = $this->input->post("asunto");
		$descripcion = $this->input->post("descripcion");
		$estatus = $this->input->post("estatus");
		//$archivo = $this->input->post("archivo");

		if (!file_exists($_FILES['archivo']['tmp_name']) || !is_uploaded_file($_FILES['archivo']['tmp_name'])) {
			$archivo = 'N/A';
		} else {
			$ext = explode(".", $_FILES["archivo"]["name"]);
			$archivo = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES["archivo"]["tmp_name"], "./assets/tickets/documentos/" . $archivo);
		}
		$data  = array(
			'idUsuario' => $this->session->userdata("id"),
			'idServSoporte' => $catalogo,
			'asuntoTic' => $asunto,
			'descTic' => $descripcion,
			'estatusTic' => $estatus,
			'documentoSop' => $archivo
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
		$this->email->to('enrique.alvarado@telnycs.com.mx', 'eduardo.monroy@telnycs.com.mx', 'uriel.ontiveros@telnycs.com.mx');
		$this->email->subject('Alta de Ticket');
		$this->email->message("Un nuevo Ticket de " . $this->session->userdata("nombre") . " \nAsunto" .  $asunto);
		if ($this->email->send()) {
			if ($this->Tickets_model->save($data)) {
				redirect(base_url() . "tickets/TicketsController");
			}
		} else {
			echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
		}

		/* if ($this->email->send(FALSE)) {
            if ($this->Tickets_model->save($data)) {
             //   $this->email->from('eduardo.monroy@telnycs.com.mx', 'lalo');
              //  $this->email->to('eduan.villegas@telnycs.com.mx');
             
                redirect(base_url() . "tickets/TicketsController");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "tickets/TicketsController/add");
            }
        } else {
            echo "fallo <br/>";
            //echo "error: " . $this->email->print_debugger(array('headers'));
        }*/
	}

	public function updatehistorial()
	{
		$fechati = $this->input->post("fechati");
		$descripcion = $this->input->post("descripcion");
		$fechater = $this->input->post("fechater");
		$estatus = $this->input->post("estatus");
		$motivo = $this->input->post("motivo");
		$conductori = $this->input->post("conductori");
		$id = $this->input->post("idticket");
		if ($estatus == "ASIGNADO") {
			$data  = array(
				'fechaticcerr' => $fechati,
				'estatusTic' => $estatus,
				'ticcercom' => $motivo,
				'echot' => '0'
			);
		} else {
			$data  = array(
				'fechaticcerr' => $fechati,
				'estatusTic' => $estatus,
				'ticcercom' => $motivo,
				'califTic' => $conductori
			);
		}
		if ($this->Tickets_model->updatehistorial($id, $data)) {
			$save  = array(
				'IdTickets' => $id,
				'idUsuario' => $this->session->userdata("id"),
				//'fechaTt' => $fechater,
				//'horaTt' => $conductori,
				'resultadoTt' => $estatus,
				'comentariosTt' => $conductori
			);
			if ($this->Tickets_model->savehistorial($save)) {
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

				if ($this->session->userdata("idPerfil") <> 1) {
					$from = $this->session->userdata("correo");
					$to = "eduardo.monroy@telnycs.com.mx";
				} else {
					$from = "eduardo.monroy@telnycs.com.mx";
					$to = $this->session->userdata("correo");
				}
				$this->email->initialize($configGmail);
				$this->email->from($from);
				$this->email->to($to);
				$this->email->subject('Respuesta de Ticket');
				$this->email->message("El ticket Fue." . "$estatus");
				if ($this->email->send()) {
					redirect(base_url() . "tickets/TicketsController");
				} else {
					echo '<script>alert("No fue posible enviar su mensaje, intente más tarde.")</script>';
				}
				// redirect(base_url() . "tickets/TicketsController");
			}
		}
	}

	public function hostorialti()
	{
		$id = $this->input->post("id");
		$data = $this->Tickets_model->getTicket($id);
		echo json_encode($data);
	}

	public function generarQR()
	{
		$tipo = $this->input->post("a");
		$descripcion = $this->input->post("b");
		$medidas = $this->input->post("c");
		$numactivos = $this->input->post("d");
		$ubicacion = $this->input->post("e");
		$observacion = $this->input->post("f");
		$id = $this->input->post("id");
		//hacemos configuraciones
		$params['data'] = "Tipo: $tipo\nDescripcion: $descripcion\nMedidas: $medidas\nNumero de Activos: $numactivos\nUbicacion: $ubicacion\nObservaciones: $observacion";
		$params['level'] = 'M';
		$params['size'] = 5;

		//decimos el directorio a guardar el codigo qr, en este 
		//caso una carpeta en la raíz llamada qr_code
		$params['savename'] = FCPATH . "assets/mobiliario/qr/$numactivos.png";
		//generamos el código qr
		$this->ciqrcode->generate($params);

		$data = array(
			'qr' => $numactivos
		);
		$this->Mobiliarios_model->update($id, $data);
	}
}
