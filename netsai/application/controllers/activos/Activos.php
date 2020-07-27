<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Activos extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Activos_model");
		$this->load->model("Fabricantes_model");
		$this->load->model("Familias_model");
		$this->load->model("Empresas_model");
		$this->load->model("Usuarios_model");
		$this->load->model("Dispositivos_model");
		$this->load->library('ciqrcode');
	}

	public function index()
	{
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("activop");
		if ($privilegio == 1) {
			$act = $this->Activos_model->getActivos();
		} else {
			$act = $this->Activos_model->getActivosId($id);
		}
		$data  = array(
			'activos' => $act,
			//'activosids' => $this->Activos_model->getActivosId($id),
			'fabricantes' => $this->Fabricantes_model->getFabricantes(),
			'familias' => $this->Familias_model->getFamilias(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/activos/listar", $data);
		$this->load->view("layouts/footer", array("script" => "admin/activos/javascript"));
	}

	public function add()
	{
		$data  = array(
			'activos' => $this->Activos_model->getActivos(),
			'fabricantes' => $this->Fabricantes_model->getFabricantes(),
			'familias' => $this->Familias_model->getFamilias(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'usuarios' => $this->Usuarios_model->getUsuarios(),
			'dispositivos' => $this->Dispositivos_model->getDispositivos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/activos/add", $data);
		//$this->load->view("layouts/footer");
		$this->load->view("layouts/footer", array("script" => "admin/activos/javascript"));
	}

	public function store()
	{
		$tipo = $this->input->post("actipo");
		$descripcion = $this->input->post("acdescrip");
		$fabricante = $this->input->post("acfabricante");
		$modelo = $this->input->post("acmodelo");
		$serie = $this->input->post("acserie");
		$procesador = $this->input->post("acprocesador");
		$ram = $this->input->post("acram");
		$familia = $this->input->post("acfamilia");
		$activo = $this->input->post("acactivo");
		$anocompra = $this->input->post("anocompra");
		$estado = $this->input->post("acestado");
		$color = $this->input->post("accolor");
		$bateria = $this->input->post("acbateria");
		$cargador = $this->input->post("accargador");
		$usuario = $this->input->post("acusuario");
		$empresa = $this->input->post("acempresa");
		$ubicacion = $this->input->post("acubicacion");
		$factura = $this->input->post("acfactura");
		$acfecha = $this->input->post("acfecha");
		$accompra = $this->input->post("accompra");
		$acrenta = $this->input->post("acrenta");
		//$archivo = $this->input->post("acarchivo");
		$estatus = $this->input->post("acestatus");
		$obs = $this->input->post("acobs");
		if (!file_exists($_FILES['acarchivo']['tmp_name']) || !is_uploaded_file($_FILES['acarchivo']['tmp_name'])) {
			$archivo = 'N/A';
		} else {
			$ext = explode(".", $_FILES["acarchivo"]["name"]);
			$archivo = round(microtime(true)) . '.' . end($ext);
			move_uploaded_file($_FILES["acarchivo"]["tmp_name"], "./assets/activos/documentos/" . $archivo);
		}
		$data  = array(
			'tipo' => $tipo,
			'descripcionact' => $descripcion,
			'idFabricante' => $fabricante,
			'modelo' => $modelo,
			'numserie' => $serie,
			'procesador' => $procesador,
			'ram' => $ram,
			'idFamilia' => $familia,
			'activofijo' => $activo,
			'anoCompra' => $anocompra,
			'estado' => $estado,
			'color' => $color,
			'bateria' => $bateria,
			'cargador' => $cargador,
			'idUsuario' => $usuario,
			'pertenece' => $fabricante,
			'idEmpresa' => $empresa,
			'ubicacion' => $ubicacion,
			'factura' => $factura,
			'fechaCompra' => $acfecha,
			'precioCompra' => $accompra,
			'precioRenta' => $acrenta,
			'observaciones' => $obs,
			'activoOn' => "1",
			'estatusActivo' => $estatus,
			'facturafisico' => $archivo,
		);

		if ($this->Activos_model->save($data)) {
			redirect(base_url() . "activos/activos");
		} else {
			$this->session->set_flashdata("error", "No se pudo guardar la informacion");
			redirect(base_url() . "activos/activos/add");
		}
	}

	public function edit($id)
	{
		$data  = array(
			'activos' => $this->Activos_model->getActivo($id),
			'fabricantes' => $this->Fabricantes_model->getFabricantes(),
			'familias' => $this->Familias_model->getFamilias(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'usuarios' => $this->Usuarios_model->getUsuarios(),
			'dispositivos' => $this->Dispositivos_model->getDispositivos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/activos/edit", $data);
		$this->load->view("layouts/footer");
	}

	public function update()
	{
		$tipo = $this->input->post("actipo");
		$descripcion = $this->input->post("acdescrip");
		$fabricante = $this->input->post("acfabricante");
		$modelo = $this->input->post("acmodelo");
		$serie = $this->input->post("acserie");
		$procesador = $this->input->post("acprocesador");
		$ram = $this->input->post("acram");
		$familia = $this->input->post("acfamilia");
		$activo = $this->input->post("acactivo");
		$anocompra = $this->input->post("anocompra");
		$estado = $this->input->post("acestado");
		$color = $this->input->post("accolor");
		$bateria = $this->input->post("acbateria");
		$cargador = $this->input->post("accargador");
		$usuario = $this->input->post("acusuario");
		$empresa = $this->input->post("acempresa");
		$ubicacion = $this->input->post("acubicacion");
		$factura = $this->input->post("acfactura");
		$acfecha = $this->input->post("acfecha");
		$accompra = $this->input->post("accompra");
		$acrenta = $this->input->post("acrenta");
		//$archivo = $this->input->post("acarchivo");
		$estatus = $this->input->post("acestatus");
		$obs = $this->input->post("acobs");
		$idActivo = $this->input->post("idActivo");

		$Activoactual = $this->Activos_model->getActivo($idActivo);


		$data  = array(
			'tipo' => $tipo,
			'descripcionact' => $descripcion,
			'idFabricante' => $fabricante,
			'modelo' => $modelo,
			'numserie' => $serie,
			'procesador' => $procesador,
			'ram' => $ram,
			'idFamilia' => $familia,
			'activofijo' => $activo,
			'anoCompra' => $anocompra,
			'estado' => $estado,
			'color' => $color,
			'bateria' => $bateria,
			'cargador' => $cargador,
			'idUsuario' => $usuario,
			'pertenece' => $fabricante,
			'idEmpresa' => $empresa,
			'ubicacion' => $ubicacion,
			'factura' => $factura,
			'fechaCompra' => $acfecha,
			'precioCompra' => $accompra,
			'precioRenta' => $acrenta,
			'observaciones' => $obs,
			'activoOn' => "1",
			'estatusActivo' => $estatus,
			//'facturafisico' => $documento,
		);


		if ($this->Activos_model->update($idActivo, $data)) {
			redirect(base_url() . "activos/activos");
		} else {
			$this->session->set_flashdata("error", "No se pudo actualizar la informacion");
			redirect(base_url() . "activos/activos/edit/" . $idActivo);
		}
	}

	public function view($id)
	{
		//$id = $this->input->post('id');
		$data = $this->Activos_model->getActivo($id);
		echo json_encode($data);
	}
	
	public function historial()
	{
		$id = $this->input->post('id');
		$data = $this->Activos_model->getHistorialac($id);
		echo json_encode($data);
	}

	public function updateActivos()
	{
		// $Activoactual = $this->Activos_model->getActivo($idActivo);
		$idActivo = $this->input->post("id");
		$usuario = $this->input->post("acusuario");
		$estatus = $this->input->post("acestatus");
		$empresa = $this->input->post("acempresa");
		$ubicacion = $this->input->post("acubicacion");
		$obs = $this->input->post("acobs");
		$fecha = date("Ymd");
		$data  = array(
			'idUsuario' => $usuario,
			'idEmpresa' => $empresa,
			'ubicacion' => $ubicacion,
			'observaciones' => $obs,
			'estatusActivo' => $estatus,
		);
		$dataHistorial  = array(
			'idActivo' => $usuario,
			'idUsuario' => $usuario,
			'fechaac' => $fecha,
			'estatusac' => $estatus,
			'motivoac' => $obs,
			//'hojaac' => $ubicacion,
		);

		if ($this->Activos_model->update($idActivo, $data)) {
			if ($this->Activos_model->saveHistorial($dataHistorial)) {
				redirect(base_url() . "activos/activos");
			}
		}
	}

	public function delete($id)
	{
		$data  = array(
			'activoOn' => "0",
		);
		$this->Activos_model->update($id, $data);
		redirect(base_url() . "activos/activos");
	}


	public function generarQR()
	{
		$a = $this->input->post("a");
		$b = $this->input->post("b");
		$c = $this->input->post("c");
		$d = $this->input->post("d");
		$e = $this->input->post("e");
		$f = $this->input->post("f");
		$g = $this->input->post("g");
		$h = $this->input->post("h");
		$i = $this->input->post("i");
		$j = $this->input->post("j");
		$k = $this->input->post("k");
		$l = $this->input->post("l");
		//hacemos configuraciones
		$params['data'] = "Descripcion: $a\nPertenece: $b\nNS: $c\nProcesador: $d\nRam: $e\nFamilia: $f\nActivo: $g\nBateria: $h\nCargador: $i\nColor:$j\nFecha de Compra: $k\nFactura: $l";
		$params['level'] = 'M';
		$params['size'] = 5;

		//decimos el directorio a guardar el codigo qr, en este 
		//caso una carpeta en la raíz llamada qr_code
		$params['savename'] = FCPATH . "assets/activos/qr/$g.png";
		//generamos el código qr
		$this->ciqrcode->generate($params);
		// echo "Descripcion: $a\nPertenece: $b\nNS: $c\nProcesador: $d\nRam: $e\nFamilia: $f\nActivo: $g\nBateria: $h\nCargador: $i\nColor:$j\nFecha de Compra: $k\nFactura: $l";
		//redirect(base_url() . "activos/activos");
	}

	public function addmantenimiento()
	{
		$id = $this->session->userdata("id");
		$data  = array(
			'activos' => $this->Activos_model->getActivosManto(),
			'activosids' => $this->Activos_model->getActivosId($id),
			'fabricantes' => $this->Fabricantes_model->getFabricantes(),
			'familias' => $this->Familias_model->getFamilias(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/activos/listarmanto", $data);
		$this->load->view("layouts/footer", array("script" => "admin/activos/javascript"));
	}

	public function storemanto()
	{
		$equipo = $this->input->post("equipo");
		$activo = $this->input->post("activo");
		$fecha = $this->input->post("fecha");
		$comentarios = $this->input->post("comentarios");
		$idactivo = $this->input->post("idactivo");
		$funcion = $this->input->post("funcion");
		$idusuario = $this->session->userdata("id");
		$data  = array(
			'idactivo' => $idactivo,
			'idUsuario' => $idusuario,
			'fechaManto' => $fecha,
			'estatus' => $funcion,
			'comentarios' => $comentarios,
			'archivoManto' => 'N/A'
		);

		if ($this->Activos_model->saveManto($data)) {
			redirect(base_url() . "activos/activos/addmantenimiento");
		} else {
			echo '<script> alert("Error, Ve al area de sistema"); </script>';
		}
	}

	public function historialmanto()
	{
		$id = $this->input->post('id');
		$data = $this->Activos_model->getHistorialmanto($id);
		echo json_encode($data);
	}

	public function getconsumibles()
	{
		$clientes = $this->Activos_model->getconsumibles();
		echo json_encode($clientes);
	}

	public function activarydesactivar($id, $estado)
	{
		if ($estado == 1) {
			$estado = 0;
		} else {
			$estado = 1;
		}
		$data = array(
			'activomanto' => $estado
		);
		if ($this->Activos_model->update($id, $data)) {
			redirect(base_url() . "activos/activos");
		}
	}

	public function activoconsumible($id)
	{
		// $id = $this->input->post("id");
		//$des = $this->input->post("des");
		$data = array(
			'id' => $id
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/activos/activo_combustible", $data);
		$this->load->view("layouts/footer", array("script" => "admin/activos/javascript"));
	}
	public function storeactivoconsimible()
	{
		$idconsumible = $this->input->post("idconsumible");
		$idactivo = $this->input->post("idactivo");
		$stock = $this->input->post("stock");

		for ($i = 0; $i < count($idconsumible); $i++) {
			$data  = array(
				'idactivo' => $idactivo[$i],
				'idconsumible' => $idconsumible[$i],
				'stock' => $stock[$i]
			);
			if ($this->Activos_model->saveActCom($data)) {
				$this->Activos_model->updateActCom($idconsumible[$i], $stock[$i]);
			}
		}
		redirect(base_url() . "activos/activos");
	}

	public function generarpdf()
	{
		$this->load->view("welcome_message");
	}

	public function hojaEnBlanco()
	{
		//Se agrega la clase desde thirdparty para usar FPDF
		require_once APPPATH . 'third_party/fpdf/fpdf.php';

		$pdf = new FPDF();
		$pdf->AliasNbPages();
		$pdf->AddPage('P', 'A4', 0);
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(0, 0, 'Hola mundo FPDF desde Codeigniter', 0, 1, 'C');
		$pdf->Output('paginaEnBlanco.pdf', 'I');
	}

	public function disponibles()
	{
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("activop");
		if ($privilegio == 1) {
			$act = $this->Activos_model->disponibles();
		} else {
			$act = $this->Activos_model->disponibles();
		}
		$data  = array(
			'activos' => $act,
			'fabricantes' => $this->Fabricantes_model->getFabricantes(),
			'familias' => $this->Familias_model->getFamilias(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'usuarios' => $this->Usuarios_model->getUsuarios()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/activos/disponibles", $data);
		$this->load->view("layouts/footer", array("script" => "admin/activos/javascript"));
	}
}
