<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fichalaboral extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}


	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/fichalaboral/create");
		$this->load->view("layouts/footer", array("script" => "admin/fichalaboral/javascript"));
	}

	public function store()
	{
		//informacion general
		$informacion_general = array(
			'nombre' => $this->input->post("nombre"),
			'puesto' => $this->input->post("puesto"),
			'funcion' => $this->input->post("funcion"),
			'unidad_negocio' => $this->input->post("unidad_negocio"),
			'curp' => $this->input->post("curp"),
			'rfc' => $this->input->post("rfc"),
			'nss' =>$this->input->post("nss"),
			'direccion' => $this->input->post("direccion"),
			'celular_asignado' => $this->input->post("celular"),
			'correo_corporativo' => $this->input->post("correo_corporativo"),
			'centro_trabajo' =>$this->input->post("centro_trabajo"),
			'correo_nokia' =>$this->input->post("correo_nokia"),
			'acceso_nokia' =>$this->input->post("correo_nokia"),
		);
		/*$nombre = $this->input->post("nombre");
		$puesto = $this->input->post("puesto");
		$funcion = $this->input->post("funcion");
		$unidad_negocio = $this->input->post("unidad_negocio");
		$curp = $this->input->post("curp");
		$rfc = $this->input->post("rfc");
		$nss = $this->input->post("nss");
		$direccion = $this->input->post("direccion");
		$correo_asignado = $this->input->post("correo_asignado");
		$correo_trabajo = $this->input->post("correo_trabajo");
		$correo_nokia = $this->input->post("correo_nokia");*/
		//relacion laboral
		$relacion_laboral = array(
			'tipo_colaborador' => $this->input->post("tipo_colaborador"), 
			'tipo_contrato' =>$this->input->post("tipo_contrato"), 
			'fecha_ingreso' => $this->input->post("fecha_ingreso"), 
			'inicio_contrato' => $this->input->post("inicio_contrato"), 
			'termino_contrato' => $this->input->post("termino_contrato"),
			'antiguedad' => $this->input->post("antiguedad"), 
			'fecha_alta' =>$this->input->post("fecha_alta"), 
			'sueldo_total' => $this->input->post("sueldo"), 
			'fecha_cambio' => $this->input->post("fecha_cambio"), 
		);
		/*$tipo_colaborador = $this->input->post("tipo_colaborador");
		$tipo_contrato = $this->input->post("tipo_contrato");
		$fecha_ingreso = $this->input->post("fecha_ingreso");
		$termino_contrato = $this->input->post("termino_contrato");
		$antiguedad = $this->input->post("antiguedad");
		$fecha_alta = $this->input->post("fecha_alta");
		$sueldo = $this->input->post("sueldo");
		$fecha_cambio = $this->input->post("fecha_cambio");*/
		//condiciones laborales
		$condiciones_laborales = array(
			'jefe_inmediato' => $this->input->post("jefe_inmediato"), 
			'pm' => $this->input->post("pm"), 
		);
	/*	$jefe_inmediato = $this->input->post("jefe_inmediato");
		$pm = $this->input->post("pm");*/
		//condiciones laborales
		$condiciones_laborales = array(
			'puesto_contractual' =>  $this->input->post("puesto_contractual"), 
			'sueldo_total' =>  $this->input->post("puesto_contractual"), 
			'nominal' =>  $this->input->post("puesto_contractual"), 
			'bono' =>  $this->input->post("puesto_contractual"), 
			'calificable' =>  $this->input->post("puesto_contractual"), 
			'nominal2' =>  $this->input->post("puesto_contractual"), 
			'adicional2' =>  $this->input->post("puesto_contractual"), 
			'bono2' =>  $this->input->post("bono2"), 
		);
		/*$puesto_contractual = $this->input->post("puesto_contractual");
		$sueldo_total = $this->input->post("sueldo_total");
		$nominal1 = $this->input->post("nominal1");
		$sd = $this->input->post("sd");
		$bono1 = $this->input->post("bono1");
		$calificable = $this->input->post("calificable");
		$nominal2 = $this->input->post("nominal2");
		$adicional = $this->input->post("adicional");
		$bono2 = $this->input->post("bono2");
		$q1 = $this->input->post("1q");
		$q2 = $this->input->post("2q");*/
		
		//acceso
		$credencial = $this->input->post("credencial") ? 1 : 0;
		$marbete = $this->input->post("marbete") ? 1 : 0;
		$tarjeta_magnetica = $this->input->post("tarjeta_magnetica") ? 1 : 0;
		$uso_transporte = $this->input->post("uso_transporte") ? 1 : 0;
		$folio_asignado = $this->input->post("folio_asignado");
		$fecha_asignacion_folio = $this->input->post("fecha_asignacion_folio");
		$no_marbete = $this->input->post("no_marbete");
		$fecha_asignacion_marbete = $this->input->post("fecha_asignacion_marbete");
		//Normativa Aplicable
		$reglamento_interno = $this->input->post("reglamento_interno");
		$transporte = $this->input->post("transporte") ? 1 : 0;
		$equipo_computo = $this->input->post("equipo_computo") ? 1 : 0;
		$automovil = $this->input->post("automovil") ? 1 : 0;
		$herramientas = $this->input->post("herramientas") ? 1 : 0;
		$celular_politicas = $this->input->post("celular_politicas") ? 1 : 0;
		$viaticos_politicas = $this->input->post("viaticos_politicas") ? 1 : 0;
		//Otras condiciones laborales
		$seguro_vida = $this->input->post("seguro_vida") ? 1 : 0;
		$credito_infonavit = $this->input->post("credito_infonavit") ? 1 : 0;
		$seguro_medico = $this->input->post("seguro_medico") ? 1 : 0;
		$credito_fonacot = $this->input->post("credito_fonacot") ? 1 : 0;
		//Información Personal
		$celular_personal1 = $this->input->post("celular_personal1");
		$telefono_fijo = $this->input->post("telefono_fijo");
		$celular_personal2 = $this->input->post("celular_personal2");
		$corrreo_personal = $this->input->post("corrreo_personal");
		$umf = $this->input->post("umf");
		$beneficiario1 = $this->input->post("beneficiario1");
		$beneficiario2 = $this->input->post("beneficiario2");
		$beneficiario3 = $this->input->post("beneficiario3");
		$estado_civil = $this->input->post("estado_civil");
		$telefono_emergencia = $this->input->post("telefono_emergencia");
		$tipo_sangre = $this->input->post("tipo_sangre");
		$alergias = $this->input->post("alergias");
		$condiciones_medicas = $this->input->post("condiciones_medicas");
		//Datos Bancarios
		$banco = $this->input->post("banco");
		$cuenta = $this->input->post("cuenta");
		$clabe = $this->input->post("clabe");
		$no_tarjeta = $this->input->post("no_tarjeta");
	}
}
