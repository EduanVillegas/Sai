<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MobiliariosController extends CI_Controller
{

    public function __construct()
    {
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
        $this->load->model("Mobiliarios_model");
        $this->load->model("Usuarios_model");
        $this->load->library('ciqrcode');
    }


    public function index()
    {
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("mantenimientop");
		if ($privilegio == 1) {
			$data  = array(
				'mobiliarios' => $this->Mobiliarios_model->getMobiliarios(),
				'usuarios' => $this->Usuarios_model->getUsuarios(),
			);
		} else {
			$data  = array(
				'mobiliariosids' => $this->Mobiliarios_model->getMobiliariosID($id),
				'usuarios' => $this->Usuarios_model->getUsuarios(),
			);
		}
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/mobiliarios/listar", $data);
        $this->load->view("layouts/footer", array("script" => "admin/mobiliarios/javascript"));
    }

    public function add()
    {
        $data  = array(
            'mobiliarios' => $this->Mobiliarios_model->getMobiliarios(),
            'usuarios' => $this->Usuarios_model->getUsuarios()
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/mobiliarios/add", $data);
        $this->load->view("layouts/footer");
    }

    public function store()
    {
        $tipo = $this->input->post("tipo");
        $descripcion = $this->input->post("descripcion");
        $medida = $this->input->post("medida");
        $ubicacion = $this->input->post("ubicacion");
        $observaciones = $this->input->post("observaciones");
        $idusuario = $this->input->post("idusuario");
        $numactivo = $this->input->post("numactivo");
        $fecompra = $this->input->post("fecompra");
        //$factura = $this->input->post("factura");
        $costo = $this->input->post("costo");
        if (!file_exists($_FILES['factura']['tmp_name']) || !is_uploaded_file($_FILES['factura']['tmp_name'])) {
            $factura = 'N/A';
        } else {
            $ext = explode(".", $_FILES["factura"]["name"]);
            $factura = round(microtime(true)) . '.' . end($ext);
            move_uploaded_file($_FILES["factura"]["tmp_name"], "./assets/mobiliario/documentos/" . $factura);
        }
        $data  = array(
            'tipomob' => $tipo,
            'desmob' => $descripcion,
            'medidamob' => $medida,
            'ubicamob' => $ubicacion,
            'obsermob' => $observaciones,
            'idUsuario' => $idusuario,
            'numactivo' => $numactivo,
            'fechacompra' => $fecompra,
            'facturamob' => $factura,
            'costomob' => $costo,
        );

        if ($this->Mobiliarios_model->save($data)) {
            redirect(base_url() . "mobiliarios/mobiliariosController");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "mobiliarios/mobiliariosController/add");
        }
    }

    public function edit($id)
    {
        $data  = array(
            'mobiliarios' => $this->Mobiliarios_model->getMobiliario($id),
            'usuarios' => $this->Usuarios_model->getUsuarios(),
        );
        $this->load->view("layouts/header");
        $this->load->view("layouts/aside");
        $this->load->view("admin/mobiliarios/edit", $data);
        $this->load->view("layouts/footer");
    }

    public function update()
    {
        $tipo = $this->input->post("tipo");
        $descripcion = $this->input->post("descripcion");
        $medida = $this->input->post("medida");
        $ubicacion = $this->input->post("ubicacion");
        $observaciones = $this->input->post("observaciones");
        $idusuario = $this->input->post("idusuario");
        $numactivo = $this->input->post("numactivo");
        $fecompra = $this->input->post("fecompra");
        $id = $this->input->post("id");
        $costo = $this->input->post("costo");
        if (!file_exists($_FILES['factura']['tmp_name']) || !is_uploaded_file($_FILES['factura']['tmp_name'])) {
            $factura = 'N/A';
        } else {
            $ext = explode(".", $_FILES["factura"]["name"]);
            $factura = round(microtime(true)) . '.' . end($ext);
            move_uploaded_file($_FILES["factura"]["tmp_name"], "./assets/mobiliario/documentos/" . $factura);
        }
        if ($factura == 'N/A') {
            $data  = array(
                'tipomob' => $tipo,
                'desmob' => $descripcion,
                'medidamob' => $medida,
                'ubicamob' => $ubicacion,
                'obsermob' => $observaciones,
                'idUsuario' => $idusuario,
                'numactivo' => $numactivo,
                'fechacompra' => $fecompra,
                'costomob' => $costo,
            );
        } else {
            $data  = array(
                'tipomob' => $tipo,
                'desmob' => $descripcion,
                'medidamob' => $medida,
                'ubicamob' => $ubicacion,
                'obsermob' => $observaciones,
                'idUsuario' => $idusuario,
                'numactivo' => $numactivo,
                'fechacompra' => $fecompra,
                'facturamob' => $factura,
                'costomob' => $costo,
            );
        }
        if ($this->Mobiliarios_model->update($id, $data)) {
            redirect(base_url() . "mobiliarios/mobiliariosController");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "mobiliarios/mobiliariosController/add");
        }
    }

    public function delete($id)
    {
        $data  = array(
            'estatus' => "0",
        );
        if ($this->Mobiliarios_model->update($id, $data)) {
            redirect(base_url() . "mobiliarios/mobiliariosController");
        }
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
