<style>
	/*.box {
        width: 800px;
        margin: 0 auto;
    }*/

	.active_tab1 {
		background-color: #ff1100;
		color: #ffffff;
		font-weight: 600;
	}

	.inactive_tab1 {
		background-color: #f5f5f5;
		color: #333;
		cursor: not-allowed;
	}

	.has-error {
		border-color: #cc0000;
		background-color: #ffff99;
	}
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Ficha Laboral
			<small>Nuevo</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<form method="post" id="register_form" action="<?php echo base_url(); ?>rh/fichalaboral/store">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active_tab1" style="border:1px solid #ccc" id="list_login_details">Información General</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_personal_details" style="border:1px solid #ccc">Relacion Laboral</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_contact_details" style="border:1px solid #ccc">Condiciones Laborales</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_condiciones_salariales" style="border:1px solid #ccc">Condiciones Salariales</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_accesos" style="border:1px solid #ccc">Accesos</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_asignaciones" style="border:1px solid #ccc">Asignaciones</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_normativa_aplicable" style="border:1px solid #ccc">Normativa Aplicativa</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_otras_condiciones_laborales" style="border:1px solid #ccc">Otras condiciones Laborales</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_informacion_personal" style="border:1px solid #ccc">Informacion personal</a>
								</li>
								<li class="nav-item">
									<a class="nav-link inactive_tab1" id="list_datos_bancarios" style="border:1px solid #ccc">Datos Bancarios</a>
								</li>
							</ul>
							<div class="tab-content" style="margin-top:16px;">
								<div class="tab-pane active" id="login_details">
									<div class="panel panel-default">
										<div class="panel-heading">Información General</div>
										<div class="panel-body">
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Nombre:</label>
												<input type="text" name="nombre" id="nombre" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Puesto:</label>
												<input type="text" name="puesto" id="puesto" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Funcion:</label>
												<input type="text" name="funcion" id="funcion" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Unidad de Negocio:</label>
												<input type="text" name="unidad_negocio" id="unidad_negocio" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Curp:</label>
												<input type="text" name="curp" id="curp" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>RFC:</label>
												<input type="text" name="rfc" id="rfc" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>NSS:</label>
												<input type="text" name="nss" id="nss" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Direccion:</label>
												<input type="text" name="direccion" id="direccion" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Celular Asignado:</label>
												<input type="text" name="celular" id="celular" class="form-control" minlength="10" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Correo corporativo:</label>
												<input type="email" name="correo_corporativo" id="correo_corporativo" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>centro de trabajo:</label>
												<input type="text" name="centro_trabajo" id="centro_trabajo" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Correo Nokia:</label>
												<input type="email" name="correo_nokia" id="correo_nokia" class="form-control" />
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label>Correo Nokia:</label>
												<select name="correo_validacion" id="correo_validacion" class="form-control">
													<option value="si">Si</option>
													<option value="no">No</option>
												</select>
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="personal_details">
									<div class="panel panel-default">
										<div class="panel-heading">Relacion Laboral</div>
										<div class="panel-body">
											<div class="form-group">
												<label>Tipo colaborador</label>
												<select name="tipo_colaborador" id="tipo_colaborador" class="form-control">
													<option value="1">Empleado</option>
													<option value="2">Colaborador</option>
													<option value="3">Practicante</option>
													<option value="4">Prestacion de servicios</option>
												</select>
											</div>
											<div class="form-group">
												<label>Tipo de contrato</label>
												<select name="tipo_contrato" id="tipo_contrato" class="form-control">
													<option value="">Determinado</option>
													<option value="">Indeterminado</option>
													<option value="">Periodo de Prueba</option>
												</select>
											</div>
											<div class="form-group">
												<label>Fecha de ingreso:</label>
												<input type="text" name="fecha_ingreso" id="fecha_ingreso" class="form-control datepicker" />
											</div>
											<div class="form-group">
												<label>Inicio de contrado:</label>
												<input type="text" name="inicio_contrato" id="inicio_contrato" class="form-control datepicker" />
											</div>
											<div class="form-group">
												<label>Termino de contrado:</label>
												<input type="text" name="termino_contrato" id="termino_contrato" class="form-control" />
											</div>
											<div class="form-group">
												<label>Antiguedad:</label>
												<input type="text" name="antiguedad" id="antiguedad" class="form-control" />
											</div>
											<div class="form-group">
												<label>Fecha alta:</label>
												<input type="text" name="fecha_alta" id="fecha_alta" class="form-control datepicker" />
											</div>
											<div class="form-group">
												<label>Sueldo Total $:</label>
												<input type="number" name="sueldo" id="sueldo" class="form-control" />
											</div>
											<div class="form-group">
												<label>Fecha ultimo cambio:</label>
												<input type="text" name="fecha_cambio" id="fecha_cambio" class="form-control datepicker" />
											</div>
											<br />
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_btn_personal_details" id="previous_btn_personal_details" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_personal_details" id="btn_personal_details" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="contact_details">
									<div class="panel panel-default">
										<div class="panel-heading">Condiciones Laborales</div>
										<div class="panel-body">
											<div class="form-group">
												<label>Jefe Inmediato</label>
												<select name="jefe_inmediato" id="jefe_inmediato" class="form-control">
													<option value="">Jefazo</option>
												</select>
											</div>
											<div class="form-group">
												<label>PM</label>
												<input type="text" name="pm" id="pm" class="form-control" />
											</div>
											<br />
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_btn_contact_details" id="previous_btn_contact_details" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_contact_details" id="btn_contact_details" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="condiciones_salariales">
									<div class="panel panel-default">
										<div class="panel-heading">Condiciones Salariales</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Puesto Contractual:</label>
														<select name="puesto_contractual" id="puesto_contractual" class="form-control">
															<option value="Asistente de dirección">Asistente de dirección</option>
															<option value="Asistente de Recursos Materiales">Asistente de Recursos Materiales</option>
															<option value="Asistente de Soporte Administrativo Integral de Consiliación">Asistente de Soporte Administrativo Integral de Consiliación</option>
															<option value="Auxiliar de Almacén">Auxiliar de Almacén</option>
															<option value="Becaria de Recursos Humanos">Becaria de Recursos Humanos</option>
															<option value="Becario de Calidad en Control de la producción">Becario de Calidad en Control de la producción</option>
															<option value="Becario en Electrónica">Becario en Electrónica</option>
															<option value="Becario en Sistemas">Becario en Sistemas </option>
															<option value="Coordinador de Sistemas de Gestión de Calidad">Coordinador de Sistemas de Gestión de Calidad </option>
															<option value="Especialista de Pruebas">Especialista de Pruebas</option>
															<option value="Especialista de Pruebas Junior C">Especialista de Pruebas Junior C </option>
															<option value="Especialista en soluciones">Especialista en soluciones </option>
															<option value="Gerente de Sistemas de Información y Mantenimiento">Gerente de Sistemas de Información y Mantenimiento</option>
															<option value="Gestión de Ingenierías de Nuevas Tecnologías">Gestión de Ingenierías de Nuevas Tecnologías</option>
															<option value="Residentes de Tecnologías de la Información">Residentes de Tecnologías de la Información</option>
															<option value="Seguridad Patrimonial Interna">Seguridad Patrimonial Interna</option>
															<option value="Técnicos de Servicios">Técnicos de Servicios </option>
														</select>
													</div>
												</div>
												<div class="col-md-12">
													<label>GRUPO TELNYCS</label>
													<div class="form-group">
														<div class="col-lg-3 col-md-3 col-sm-3">
															<label>Sueldo Total $:</label>
															<input type="text" name="sueldo_total" id="sueldo_total" class="form-control" />
														</div>
														<div class="col-lg-3 col-md-3 col-sm-3">
															<div class="col-lg-6 col-md-6 col-sm-6">
																<label>Nominal $:</label>
																<input type="text" name="nominal1" id="nominal2" class="form-control" />
															</div>
															<div class="col-lg-6 col-md-6 col-sm-6">
																<label>SD $:</label>
																<input type="text" name="sd" id="sd" class="form-control" />
															</div>
														</div>
														<div class="col-lg-3 col-md-3 col-sm-3">
															<label>Bono $:</label>
															<input type="text" name="bono1" id="bono1" class="form-control" />
														</div>
														<div class="col-lg-3 col-md-3 col-sm-3">
															<label>Calificable</label>
															<select name="calificable" id="calificable" class="form-control">
																<option value="Si">Si</option>
																<option value="No">No</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<label>LXP</label>
													<div class="form-group">
														<div class="col-lg-4 col-md-4 col-sm-4">
															<label>Nóminal $:</label>
															<input type="text" name="nominal2" id="nominal2" class="form-control" />
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4">
															<label>Adicional $:</label>
															<input type="text" name="adicional" id="adicional" class="form-control" />
														</div>
														<div class="col-lg-4 col-md-4 col-sm-4">
															<label>Bono $:</label>
															<input type="text" name="bono2" id="bono2" class="form-control" />
														</div>
													</div>
												</div>
											</div>



											<div class="form-gruop">
												<label>Periodicidad</label>
											</div>
											<div class="form-check">
												<div class="col-lg-6 col-md-6 col-sm-6 ">
													<label>1Q</label>
													<input type="checkbox" name="" id="" value="1">
													<input type="checkbox" name="" id="" value="1">
													<input type="checkbox" name="" id="" value="1">
												</div>
												<div class="col-lg-6 col-md-6 col-sm-6">
													<label>2Q</label>
													<input type="checkbox" name="" id="" value="1">
													<input type="checkbox" name="" id="" value="1">
													<input type="checkbox" name="" id="" value="1">
												</div>
											</div>
											<br />
											<br />
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_btn_condiciones_salariales" id="previous_btn_condiciones_salariales" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_condiciones_salariales" id="btn_condiciones_salariales" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="accesos">
									<div class="panel panel-default">
										<div class="panel-heading">Accesos</div>
										<div class="panel-body">
											<div class="form-group">
												<label>Accesos</label>
												<label class="checkbox-inline"><input type="checkbox" name="credencial" id="credencial" value="1">Credencial</label>
												<label class="checkbox-inline"><input type="checkbox" name="marbete" id="marbete" value="1">Marbete</label>
												<label class="checkbox-inline"><input type="checkbox" name="tarjeta_magnetica" value="1">Tarjeta magnetica</label>
												<label class="checkbox-inline"><input type="checkbox" name="uso_transporte" value="1">Uso de transporte</label>
											</div>
											<div class="form-group">
												<label>Folio Asignado</label>
												<input type="text" name="folio_asignado" id="folio_asignado" class="form-control">
											</div>
											<div class="form-group">
												<label>Fecha de asignación</label>
												<input type="text" name="fecha_asignacion_folio" id="fecha_asignacion_folio" class="form-control datepicker">
											</div>
											<div class="form-group">
												<label>No. Marbete</label>
												<input type="text" name="no_marbete" id="no_marbete" class="form-control">
											</div>
											<div class="form-group">
												<label>Fecha de asignación</label>
												<input type="text" name="fecha_asignacion_marbete" id="fecha_asignacion_marbete" class="form-control datepicker">
											</div>
											<div class="form-group">
												<label>ZONA ASIGNADA </label>
												<select name="zona_asignada" id="zona_asignada" class="form-control">
													<option value="Gestión">Gestión</option>
													<option value="Administración y Finanzas">Administración y Finanzas </option>
													<option value="Recursos Materiales">Recursos Materiales</option>
													<option value="Centro de Reparación">Centro de Reparación</option>
													<option value="Gestión Integral">Gestión Integral</option>
													<option value="Recursos Humanos">Recursos Humanos</option>
												</select>
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_btn_accesos" id="previous_btn_accesos" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_accesos" id="btn_accesos" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="asignaciones">
									<div class="panel panel-default">
										<div class="panel-heading">Asignaciones</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Herramientas</label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Descripcion</label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Fecha de asignacion</label>
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Equipo de Computo</label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control datepicker">
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Equipo y Mobiliario de Oficina, Archivo</label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control datepicker">
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Vehículo</label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control datepicker">
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Telefonía </label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control ">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control datepicker">
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Herramientas, utiles trabajo </label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control datepicker">
												</div>
											</div>
											<div class="form-group">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<label>Equipo de seguridad y/o Equipo de protección personal </label>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control">
												</div>
												<div class="col-lg-4 col-md-4 col-sm-12">
													<input type="text" name="" id="" class="form-control datepicker">
												</div>
											</div>
											<br />
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_btn_asignaciones" id="previous_btn_asignaciones" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_asignaciones" id="btn_asignaciones" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="normativa_aplicable">
									<div class="panel panel-default">
										<div class="panel-heading">Normativa Aplicable</div>
										<div class="panel-body">
											<div class="form-group">
												<label>Reglamento Interior de Trabajo</label>
												<select name="reglamento_interno" id="reglamento_interno" class="form-control">
													<option value="Personal Directo">Personal Directo</option>
													<option value="Personal Indirecto">Personal Indirecto</option>
												</select>
											</div>
											<hr>
											<div class="form-group">
												<label>Políticas</label>
												<label class="checkbox-inline"><input type="checkbox" name="transporte" id="transporte" value="1">Transporte</label>
												<label class="checkbox-inline"><input type="checkbox" name="equipo_computo" id="equipo_computo" value="1">Equipo de Computo</label>
												<label class="checkbox-inline"><input type="checkbox" name="automovil" id="automovil" value="1">Automovil</label>
												<label class="checkbox-inline"><input type="checkbox" name="herramientas" id="herramientas" value="1">Herramientas</label>
												<label class="checkbox-inline"><input type="checkbox" name="celular_politicas" id="celular_politicas" value="1">Celular </label>
												<label class="checkbox-inline"><input type="checkbox" name="viaticos_politicas" id="viaticos_politicas" value="1">Viaticos </label>
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_normativa_aplicable" id="previous_normativa_aplicable" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_normativa_aplicable" id="btn_normativa_aplicable" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="otras_condiciones_laborales">
									<div class="panel panel-default">
										<div class="panel-heading">Otras condiciones laborales</div>
										<div class="panel-body">
											<div class="form-group">
												<label class="checkbox-inline"><input type="checkbox" name="seguro_vida" id="seguro_vida" value="1">Seguro de Vida</label>
												<label class="checkbox-inline"><input type="checkbox" name="credito_infonavit" id="credito_infonavit" value="1">Crédito INFONAVIT</label>
												<label class="checkbox-inline"><input type="checkbox" name="seguro_medico" id="seguro_medico" value="1">Seguro Médico</label>
												<label class="checkbox-inline"><input type="checkbox" name="credito_fonacot" id="credito_fonacot" value="1">Crédito FONACOT</label>
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_otras_condiciones_laborales" id="previous_otras_condiciones_laborales" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_otras_condiciones_laborales" id="btn_otras_condiciones_laborales" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="informacion_personal">
									<div class="panel panel-default">
										<div class="panel-heading">Información Personal</div>
										<div class="panel-body">
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Celular personal 1:</label>
												<input type="text" name="celular_personal1" id="celular_personal1" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Teléfono fijo: </label>
												<input type="text" name="telefono_fijo" id="telefono_fijo" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Celular personal 2:</label>
												<input type="text" name="celular_personal2" id="celular_personal2" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Correo personal:</label>
												<input type="text" name="corrreo_personal" id="corrreo_personal" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">UMF:</label>
												<input type="text" name="umf" id="umf" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Beneficiario 1:</label>
												<input type="text" name="beneficiario1" id="beneficiario1" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Beneficiario 2:</label>
												<input type="text" name="beneficiario2" id="beneficiario2" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Beneficiario 3:</label>
												<input type="text" name="beneficiario3" id="beneficiario3" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Estado Civil:</label>
												<input type="text" name="estado_civil" id="estado_civil" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Teléfono de emergencia:</label>
												<input type="text" name="telefono_emergencia" id="telefono_emergencia" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Tipo de sangre:</label>
												<input type="text" name="tipo_sangre" id="tipo_sangre" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Alergias:</label>
												<input type="text" name="alergias" id="alergias" class="form-control">
											</div>
											<div class="form-group col-lg-6 col-md-6 col-sm-12">
												<label for="">Condiciones médicas:</label>
												<input type="text" name="condiciones_medicas" id="condiciones_medicas" class="form-control">
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_informacion_personal" id="previous_informacion_personal" class="btn btn-default btn-lg">Anterior</button>
												<button type="button" name="btn_informacion_personal" id="btn_informacion_personal" class="btn btn-info btn-lg">Siguiente</button>
											</div>
											<br />
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="datos_bancarios">
									<div class="panel panel-default">
										<div class="panel-heading">Datos Bancarios</div>
										<div class="panel-body">
											<div class="form-group">
												<label>Banco</label>
												<input type="text" name="banco" id="banco" class="form-control">
											</div>
											<div class="form-group">
												<label>Cuenta</label>
												<input type="text" name="cuenta" id="cuenta" class="form-control">
											</div>
											<div class="form-group">
												<label>Clabe</label>
												<input type="text" name="clabe" id="clabe" class="form-control">
											</div>
											<div class="form-group">
												<label>No. Tarjeta</label>
												<input type="text" name="no_tarjeta" id="no_tarjeta" class="form-control">
											</div>
											<div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
												<button type="button" name="previous_btn_datos_bancarios" id="previous_btn_datos_bancarios" class="btn btn-default btn-lg">Anterior</button>
												<button type="sumit" name="btn_datos_bancarios" id="btn_datos_bancarios" class="btn btn-success btn-lg">Guardar</button>
											</div>
											<br />
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
