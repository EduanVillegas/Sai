<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Usuarios_model");
		$this->load->model("Perfil_model");
		$this->load->model("Areas_model");
		$this->load->model("Empresas_model");
		$this->load->library('ciqrcode');
	}


	public function index()
	{
		$id = $this->session->userdata("id");
		$privilegio = $this->session->userdata("administradorp");
		if ($privilegio == 1) {
			$data  = array(
				'usuarios' => $this->Usuarios_model->getUsuarios(),
			);
		} else {
			$data  = array(
				'usuarios' => $this->Usuarios_model->getUsuariosID($id),
			);
		}
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/listar", $data);
		$this->load->view("layouts/footer", array("script" => "admin/usuarios/javascript"));
	}

	public function add()
	{
		$data  = array(
			'usuarios' => $this->Usuarios_model->getUsuarios(),
			'perfiles' => $this->Perfil_model->getPerfiles(),
			'areas' => $this->Areas_model->getAreas(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'permisos' => $this->Usuarios_model->getpermisos(),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add", $data);
		$this->load->view("layouts/footer", array("script" => "admin/usuarios/javascript"));
	}

	public function store()
	{
		$nomusu = $this->input->post("nomusu");
		$pateruno = $this->input->post("pateruno");
		$materusu = $this->input->post("materusu");
		$usucur = $this->input->post("usucur");
		$usurfc = $this->input->post("usurfc");
		$usudire = $this->input->post("usudire");
		$usutel = $this->input->post("usutel");
		$usucel = $this->input->post("usucel");
		$usucorr = $this->input->post("usucorr");
		$usunss = $this->input->post("usunss");
		$usunac = $this->input->post("usunac");
	//	$usufun = $this->input->post("usufun");
		$usurol = $this->input->post("usurol");
		$ususan = $this->input->post("ususan");
		$usuale = $this->input->post("usuale");
		$usuusu = $this->input->post("usuusu");
		$passusu = $this->input->post("passusu");
		$correousu = $this->input->post("correousu");
		$estatusu = $this->input->post("estatusu");
		$perfilusu = $this->input->post("perfilusu");
		$empreusu = $this->input->post("empreusu");
		$areausu = $this->input->post("areausu");
		$folio = $this->input->post("folio");

		$permisos = $this->input->post("permiso");
		$privilegios = $this->input->post("radiobutton");

		$this->form_validation->set_rules("usucur", "Curp", "required|is_unique[usuarios.usucurp]");
		$this->form_validation->set_rules("usurfc", "Rfc", "required|is_unique[usuarios.usurfc]");
		$this->form_validation->set_rules("usunss", "Nss", "required|is_unique[usuarios.usunss]");
		$this->form_validation->set_rules("usuusu", "Usuario", "required|is_unique[usuarios.usuario]");

		if ($this->form_validation->run() == TRUE) {
			if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
				$imagen = 'default.jpg';
			} else {
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "./assets/usuarios/imagenes/" . $imagen);
				}
			}

			$data  = array(
				'usuNombre' => $nomusu,
				'usuPaterno' => $pateruno,
				'usuMaterno' => $materusu,
				'usucurp' => $usucur,
				'usurfc' => $usurfc,
				'usudire' => $usudire,
				'usutel' => $usutel,
				'usucel' => $usucel,
				'usumail' => $usucorr,
				'usunss' => $usunss,
				'usulug' => $usunac,
	//			'usufun' => $usufun,
				'usurol' => $usurol,
				'ususan' => $ususan,
				'usualerg' => $usuale,
				'nomb_emergencia' => $this->input->post("nomb_emergencia"),
				'no_emergencia' => $this->input->post("no_emergencia"),
				'usuario' => $usuusu,
				'password' => $passusu,
				'usucorreo' => $correousu,
				'usuActivo' => $estatusu,
				'idPerfil' => $perfilusu,
				'idEmpresa' => $empreusu,
				'idArea' => $areausu,
				'imagen' => $imagen
			);

			if ($this->Usuarios_model->save($data)) {
				$idusuario = $this->Usuarios_model->lastID();
				$this->save_permiso($idusuario, $permisos, $privilegios);
				redirect(base_url() . "usuarios/usuarios");
			} else {
				$this->session->set_flashdata("error", "No se pudo guardar la informacion");
				redirect(base_url() . "usuarios/usuarios/add");
			}
		} else {
			$this->add();
		}
	}

	public function save_permiso($idusuario, $permisos, $privilegios)
	{
		for ($i = 0; $i < count($permisos); $i++) {
			$data  = array(
				'idUsuario' => $idusuario,
				'idPermiso' => $permisos[$i],
				'idprivilegio' => $privilegios[$i],
			);
			$this->Usuarios_model->save_permisos($data);
		}
	}

	public function generarQR($id, $usuario)
	{
		//hacemos configuraciones
		$params['data'] = "http://inovetel.ddns.net:1025/netsai/usuario.php?id=" . $id;
		$params['level'] = 'H';
		$params['size'] = 10;

		//decimos el directorio a guardar el codigo qr, en este 
		//caso una carpeta en la raíz llamada qr_code
		$params['savename'] = FCPATH . "assets/usuarios/qr/$usuario.png";
		//generamos el código qr
		$this->ciqrcode->generate($params);
		$data = array(
			'qr' => $usuario . ".png"
		);
		if ($this->Usuarios_model->update($id, $data)) {
			redirect(base_url() . "usuarios/usuarios");
		}
	}

	public function edit($id)
	{
		$data  = array(
			'usuarios' => $this->Usuarios_model->getUsuario($id),
			'perfiles' => $this->Perfil_model->getPerfiles(),
			'areas' => $this->Areas_model->getAreas(),
			'empresas' => $this->Empresas_model->getEmpresas(),
			'permisos' => $this->Usuarios_model->getpermisos(),
			'permisosID' => $this->Usuarios_model->getpermisosID($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit", $data);
		$this->load->view("layouts/footer", array("script" => "admin/usuarios/javascript"));
	}

	public function update()
	{
		$nomusu = $this->input->post("nomusu");
		$pateruno = $this->input->post("pateruno");
		$materusu = $this->input->post("materusu");
		$usucur = $this->input->post("usucur");
		$usurfc = $this->input->post("usurfc");
		$usudire = $this->input->post("usudire");
		$usutel = $this->input->post("usutel");
		$usucel = $this->input->post("usucel");
		$usucorr = $this->input->post("usucorr");
		$usunss = $this->input->post("usunss");
		$usunac = $this->input->post("usunac");
		//$usufun = $this->input->post("usufun");
		$usurol = $this->input->post("usurol");
		$ususan = $this->input->post("ususan");
		$usuale = $this->input->post("usuale");
		$usuusu = $this->input->post("usuusu");
		$passusu = $this->input->post("passusu");
		$correousu = $this->input->post("correousu");
		$estatusu = $this->input->post("estatusu");
		$perfilusu = $this->input->post("perfilusu");
		$empreusu = $this->input->post("empreusu");
		$areausu = $this->input->post("areausu");
		$idusuario = $this->input->post("idusuario");
		$folio = $this->input->post("folio");

		$credencial = $this->input->post("credencial");
		$marbete = $this->input->post("marbete");
		$nomarbete = $this->input->post("nomarbete");
		$credencialm = $this->input->post("credencialm");
		$transporte = $this->input->post("transporte");

		$permisos = $this->input->post("permiso");
		$privilegios = $this->input->post("radiobutton");
		$usuarioactual = $this->Usuarios_model->getUsuario($idusuario);

		if ($usucur == $usuarioactual->usucurp) {
			$is_unique1 = "";
		} else {
			$is_unique1 = "|is_unique[usuarios.usucurp]";
		}

		if ($usurfc == $usuarioactual->usurfc) {
			$is_unique2 = "";
		} else {
			$is_unique2 = "|is_unique[usuarios.usurfc]";
		}

		if ($usunss == $usuarioactual->usunss) {
			$is_unique3 = "";
		} else {
			$is_unique3 = "|is_unique[usuarios.usunss]";
		}

		if ($usuusu == $usuarioactual->usuario) {
			$is_unique4 = "";
		} else {
			$is_unique4 = "|is_unique[usuarios.usuario]";
		}

		$this->form_validation->set_rules("usucur", "Curp", "required" . $is_unique1);
		$this->form_validation->set_rules("usurfc", "Rfc", "required" . $is_unique2);
		$this->form_validation->set_rules("usunss", "Nss", "required" . $is_unique3);
		$this->form_validation->set_rules("usuusu", "Usuario", "required" . $is_unique4);


		if ($this->form_validation->run() == TRUE) {
			if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
				$imagen = 'default.jpg';
			} else {
				$ext = explode(".", $_FILES["imagen"]["name"]);
				if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
					$imagen = round(microtime(true)) . '.' . end($ext);
					move_uploaded_file($_FILES["imagen"]["tmp_name"], "./assets/usuarios/imagenes/" . $imagen);
				}
			}
			if ($imagen == 'default.jpg') {
				$data  = array(
					'usuNombre' => $nomusu,
					'usuPaterno' => $pateruno,
					'usuMaterno' => $materusu,
					'usucurp' => $usucur,
					'usurfc' => $usurfc,
					'usudire' => $usudire,
					'usutel' => $usutel,
					'usucel' => $usucel,
					'usumail' => $usucorr,
					'usunss' => $usunss,
					'usulug' => $usunac,
					//'usufun' => $usufun,
					'usurol' => $usurol,
					'ususan' => $ususan,
					'usualerg' => $usuale,
					'nomb_emergencia' => $this->input->post("nomb_emergencia"),
					'no_emergencia' => $this->input->post("no_emergencia"),
					'usuario' => $usuusu,
					'password' => $passusu,
					'usucorreo' => $correousu,
					'credencial' => $credencial,
					'folio' => $folio,
					'marbete' =>$marbete,
					'nummarbete' =>$nomarbete,
					'credencialmag' =>$credencialm,
					'transporte' =>$transporte,
					'usuActivo' => $estatusu,
					'idPerfil' => $perfilusu,
					'idEmpresa' => $empreusu,
					'idArea' => $areausu,
				);
			} else {
				$data  = array(
					'usuNombre' => $nomusu,
					'usuPaterno' => $pateruno,
					'usuMaterno' => $materusu,
					'usucurp' => $usucur,
					'usurfc' => $usurfc,
					'usudire' => $usudire,
					'usutel' => $usutel,
					'usucel' => $usucel,
					'usumail' => $usucorr,
					'usunss' => $usunss,
					'usulug' => $usunac,
					'usufun' => $usufun,
					'usurol' => $usurol,
					'ususan' => $ususan,
					'usualerg' => $usuale,
					'nomb_emergencia' => $this->input->post("nomb_emergencia"),
					'no_emergencia' => $this->input->post("no_emergencia"),
					'usuario' => $usuusu,
					'password' => $passusu,
					'usucorreo' => $correousu,
					'credencial' => $credencial,
					'folio' => $folio,
					'marbete' =>$marbete,
					'nummarbete' =>$nomarbete,
					'credencialmag' =>$credencialm,
					'transporte' =>$transporte,
					'usuActivo' => $estatusu,
					'idPerfil' => $perfilusu,
					'idEmpresa' => $empreusu,
					'idArea' => $areausu,
					'imagen' => $imagen
				);
			}
			if ($this->Usuarios_model->update($idusuario, $data)) {
				$this->Usuarios_model->delete_permisos($idusuario);
				$this->save_permiso($idusuario, $permisos, $privilegios);
				redirect(base_url() . "usuarios/usuarios");
			} else {
				$this->session->set_flashdata("error", "No se pudo actualizar la informacion");
				redirect(base_url() . "usuarios/usuarios/edit/" . $idusuario);
			}
		} else {
			$this->edit($idusuario);
		}
	}

	public function activarydesactivar()
	{
		$id = $this->input->post("id");
		$estatus = $this->input->post("estatus");
		if ($estatus == 1) {
			$data  = array(
				'usuActivo' => 0,
			);
		} else {
			$data  = array(
				'usuActivo' => 1,
			);
		}
		$this->Usuarios_model->update($id, $data);
		$this->index();
	}

	public function BuscarNumero()
	{
		$id = $this->input->post("id");
		if($id==3){
			$f="GTA.";
		}
		elseif($id==5){
			$f="GTC.";
		}
		elseif($id==6){
			$f="GTP.";
		}
		elseif($id==7){
			$f="GTO.";
		}
		elseif($id==9 || $id==8 || $id==1){
			return "";
		}
		
		$data = $this->Usuarios_model->BuscarNumero($f);
		$numero = (int) substr($data->folio, 4);
		if ($numero >= 999 && $numero < 9999) {
			$valor = $numero + 1;
		}
		if ($numero >= 99 && $numero < 999) {
			$valor = '0' . ($numero + 1);
		}
		if ($numero >= 9 && $numero < 99) {
			$valor = '00' . ($numero + 1);
		}
		if ($numero < 9) {
			$valor = '000' . ($numero + 1);
		}
		$cadena = substr($data->folio, 0, 4);
		$code = $f . $valor;
		echo json_encode($code);
	}

	public function perfil()
	{
		$id = $this->session->userdata("id");
		$data  = array(
			'usuarios' => $this->Usuarios_model->getPerfil($id)
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/perfil", $data);
		$this->load->view("layouts/footer");
	}

	public function updateperfil()
	{
		$id = $this->session->userdata("id");
		$nomu = $this->input->post("nomusu");
		$pater = $this->input->post("pateruno");
		$mater = $this->input->post("materusu");
		$dire = $this->input->post("usudire");
		$tel = $this->input->post("usutel");
		$cel = $this->input->post("usucel");
		$corr = $this->input->post("usucorr");
		$usu = $this->input->post("usuusu");
		$pass = $this->input->post("passusu");
		$correousu = $this->input->post("correousu");

		if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name'])) {
			$imagen = $this->session->userdata("imagen");
		} else {
			$ext = explode(".", $_FILES["imagen"]["name"]);
			if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png") {
				$imagen = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["imagen"]["tmp_name"], "./assets/usuarios/imagenes/" . $imagen);
			}
		}
		$data  = array(
			'usuNombre' => $nomu,
			'usuPaterno' => $pater,
			'usuMaterno' => $mater,
			'usudire' => $dire,
			'usutel' => $tel,
			'usucel' => $cel,
			'usumail' => $corr,
			'usuario' => $usu,
			'password' => $pass,
			'usucorreo' => $correousu,
			'imagen' => $imagen,
		);
		if ($this->Usuarios_model->updateperfil($id, $data)) {
			redirect(base_url() . "auth/logout");
		}
	}

	public function listardetalle()
	{
		$id = $this->input->post("id");
		$data = $this->Usuarios_model->getpermisosID($id);
		echo json_encode($data);
	}
}
