<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Usuarios
			<small>Editar</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<?php if ($this->session->flashdata("error")) : ?>
							<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

							</div>
						<?php endif; ?>
						<form action="<?php echo base_url(); ?>usuarios/usuarios/update" method="POST" enctype="multipart/form-data">
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Nombres:</label>
								<input type="text" class="form-control" id="nomusu" name="nomusu" placeholder="Ingresa Nombres" value="<?php echo $usuarios->usuNombre; ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Apellido Paterno:</label>
								<input type="text" class="form-control" id="pateruno" name="pateruno" placeholder="Ingresa Apellidos Paternos" value="<?php echo $usuarios->usuPaterno; ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Apellido Materno:</label>
								<input type="text" class="form-control" id="materusu" name="materusu" placeholder="Ingresa Apellidos Maternos" value="<?php echo $usuarios->usuMaterno; ?>">
							</div>
							<div class="form-group <?php echo !empty(form_error('usucur')) ? 'has-error' : ''; ?> col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
								<label> Curp:</label>
								<input type="text" class="form-control" id="usucur" name="usucur" placeholder="Ingresa CURP" value="<?php echo !empty(form_error('usucur')) ? set_value('usucur') : $usuarios->usucurp ?>">
								<?php echo form_error("usucur", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group <?php echo !empty(form_error('usucur')) ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
								<label> RFC:</label>
								<input type="text" class="form-control" id="usurfc" name="usurfc" placeholder="Ingresa RFC" value="<?php echo !empty(form_error('usurfc')) ? set_value('usurfc') : $usuarios->usurfc ?>">
								<?php echo form_error("usurfc", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Dirección:</label>
								<input type="text" class="form-control" id="usudire" name="usudire" placeholder="Ingresa Direccion" value="<?php echo $usuarios->usudire ?>">
							</div>
							<div class="form-group  col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
								<label> Telefono:</label>
								<input type="text" class="form-control" id="usutel" name="usutel" placeholder="ejemplo: 5512345678" value="<?php echo $usuarios->usutel ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Celular:</label>
								<input type="text" class="form-control" id="usucel" name="usucel" placeholder="ejemplo 5512345678" value="<?php echo $usuarios->usucel ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Email Personal:</label>
								<input type="email" class="form-control" id="usucorr" name="usucorr" placeholder="ejemplo@mail.com" value="<?php echo $usuarios->usumail ?>">
							</div>
							<div class="form-group <?php echo !empty(form_error('usunss')) ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Nss:</label>
								<input type="text" class="form-control" id="usunss" name="usunss" placeholder="Ingresa NSS" value="<?php echo $usuarios->usunss ?>">
								<?php echo form_error("usunss", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Lugar de Nacimiento:</label>
								<input type="text" class="form-control" id="usunac" name="usunac" placeholder="Ingresa Lugar Nacimiento" value="<?php echo $usuarios->usulug ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Rol de Usuario:</label>
								<input type="text" class="form-control" id="usurol" name="usurol" placeholder="Ingresa Rol de Usuario" value="<?php echo $usuarios->usurol ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Tipo de Sangre:</label>
								<input type="text" class="form-control" id="ususan" name="ususan" placeholder="Ingresa Tipo de Sangre" value="<?php echo $usuarios->ususan ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Alergia a Medicamento:</label>
								<input type="text" class="form-control" id="usuale" name="usuale" placeholder="Ingresa Alergia a algun Medicamento" value="<?php echo $usuarios->usualerg ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Nombre en Caso de emergencia:</label>
								<input type="text" class="form-control" id="nomb_emergencia" name="nomb_emergencia" placeholder="Nombre en Caso de emergencia" value="<?php echo $usuarios->nomb_emergencia ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Numero de Emergencia:</label>
								<input type="text" class="form-control" id="no_emergencia" name="no_emergencia" placeholder="Numero de Emergencia" value="<?php echo $usuarios->no_emergencia ?>" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="form-group <?php echo !empty(form_error('usucur')) ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Usuario:</label>
								<input type="text" class="form-control" id="usuusu" name="usuusu" placeholder="ejemplo: admin12" value="<?php echo !empty(form_error('usuusu')) ? set_value('usuusu') : $usuarios->usuario ?>">
								<?php echo form_error("usuusu", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Password:</label>
								<input type="password" class="form-control" id="passusu" name="passusu" placeholder="Ingresa Contraseña" value="<?php echo $usuarios->password ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Email:</label>
								<input type="email" class="form-control" id="correousu" name="correousu" placeholder="ejemplo@mail.com" value="<?php echo $usuarios->usucorreo ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Estatus:</label>
								<select name="estatusu" id="estatusu" class="form-control" required="required">
									<?php if ($usuarios->usuActivo == 1) : ?>
										<option value="1" selected>ACTIVO</option>
										<option value="0">DESACTIVADO</option>
									<?php else : ?>
										<option value="1">ACTIVO</option>
										<option value="0" selected>DESACTIVADO</option>
									<?php endif; ?>

								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Credencial:</label>
								<select name="credencial" id="credencial" class="form-control" required="required">
								<?php if ($usuarios->credencial == 'SI') : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="SI">SI</option>
										<option value="NO" selected>NO</option>
									<?php endif; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Marbete:</label>
								<select name="marbete" id="marbete" class="form-control" required="required">
								<?php if ($usuarios->marbete == 'SI') : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="SI">SI</option>
										<option value="NO" selected>NO</option>
									<?php endif; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Num.Marbete:</label>
								<input type="text" class="form-control" id="nomarbete" name="nomarbete"  value="<?php echo $usuarios->nummarbete ?>">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Credencial Magnetica:</label>
								<select name="credencialm" id="credencialm" class="form-control" required="required">
								<?php if ($usuarios->credencialmag == 'SI') : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="SI">SI</option>
										<option value="NO" selected>NO</option>
									<?php endif; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Transporte:</label>
								<select name="transporte" id="transporte" class="form-control" required="required">
								<?php if ($usuarios->transporte == 'SI') : ?>
										<option value="SI" selected>SI</option>
										<option value="NO">NO</option>
									<?php else : ?>
										<option value="SI">SI</option>
										<option value="NO" selected>NO</option>
									<?php endif; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label>Perfiles:</label>
									<select name="perfilusu" id="perfilusu" class="form-control">
										<?php foreach ($perfiles as $perfil) : ?>
											<?php if ($perfil->idPerfil == $usuarios->idPerfil) : ?>
												<option value="<?php echo $perfil->idPerfil ?>" selected><?php echo $perfil->perNombre; ?></option>
											<?php else : ?>
												<option value="<?php echo $perfil->idPerfil ?>"><?php echo $perfil->perNombre; ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label> Folio:</label>
									<input type="text" name="folio" id="folio" class="form-control" value="<?php echo $usuarios->folio ?>" >
								</div>
							</div>

							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label>Empresas:</label>
								<select name="empreusu" id="empreusu" class="form-control">
									<?php foreach ($empresas as $empresa) : ?>
										<?php if ($empresa->idEmpresa == $usuarios->idEmpresa) : ?>
											<option value="<?php echo $empresa->idEmpresa ?>" selected><?php echo $empresa->nombreEmpresa; ?></option>
										<?php else : ?>
											<option value="<?php echo $empresa->idEmpresa ?>"><?php echo $empresa->nombreEmpresa; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label>Función/área:</label>
								<select name="areausu" id="areausu" class="form-control">
									<?php foreach ($areas as $area) : ?>
										<?php if ($area->idArea == $usuarios->idArea) : ?>
											<option value="<?php echo $area->idArea ?>" selected><?php echo $area->nombreArea; ?></option>
										<?php else : ?>
											<option value="<?php echo $area->idArea ?>"><?php echo $area->nombreArea; ?></option>
										<?php endif; ?>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Imagen:</label>
								<input type="file" class="form-control" id="imagen" name="imagen">
								<input type="hidden" name="imagenactual" id="imagenactual">
								<img src="<?php echo base_url() ?>assets/usuarios/imagenes/<?php echo $usuarios->imagen; ?>" width="150px" height="150px" id="imagenmuestra">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<a onclick="abrirpermisos()" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Permisos</a>
							</div>
							
							<div class="col-lg-12">
								<label for=""> Lectura: El Usuario podrá visualizar los registros pero solo creados por el.
									<!--no generar/borrar/editar los mismos.--></label><br>
								<label for=""> Escritura: El Usuario podrá visualizar todos los registros
									<!--y generar/borrar/editar los registros.--></label><br>
								<table id="tblpermisos" class="table table-bordered table-striped">
									<thead>
										<tr>
											<th>Permiso</th>
											<th>Privilegios</th>
											<th>Opciones</th>
										</tr>
									</thead>
									<tbody id="cuerpo">
									<?php $cont = 0; ?>
										<?php foreach ($permisosID as $permisoid) : ?>
											<tr id="fila<?php echo $cont; ?>">
												<td>
													<input type='hidden' name='permiso[]' value='<?php echo $permisoid->idpermiso; ?>'> <?php echo $permisoid->permiso; ?>
												</td>
												<td>
													<?php if ($permisoid->idprivilegio == 1) { ?>
														<input type="radio" name="radiobutton[<?php echo $cont; ?>]" value="1" checked> Escritura
														<input type="radio" name="radiobutton[<?php echo $cont; ?>]" value=" 0"> Lectura
													<?php } else { ?>
														<input type="radio" name="radiobutton[<?php echo $cont; ?>]" value="1"> Escritura
														<input type="radio" name="radiobutton[<?php echo $cont; ?>]" value="0" checked> Lectura
													<?php }	?>
												</td>
												<td width="20%">
													<a class="btn btn-danger" onclick="eliminardetalle(<?php echo $cont; ?>);"><i class="fa fa-remove"></i></a>
												</td>
											</tr>
											<?php $cont = $cont + 1; ?>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<input type="hidden" name="idusuario" value="<?php echo $usuarios->idUsuario ?>">
								<button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"> Guardar</span></button>
								<a class="btn btn-danger btn-flat" href="<?php echo base_url(); ?>usuarios/usuarios"><span class="fa fa-arrow-circle-left"> Cancelar</span></a>
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
<div class="modal fade" id="modal-permisos">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?php echo base_url(); ?>tickets/TicketsController/updatehistorial" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Listar Permisos</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Permiso</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($permisos as $permiso) : ?>
								<tr>
									<td>
										<?php echo $permiso->permiso; ?>
									</td>
									<td width="20%">
										<a class="btn btn-success" onclick="detalle(<?php echo $permiso->idpermiso; ?>,'<?php echo $permiso->permiso; ?>');"><i class="fa fa-plus"></i></a>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="idticket" id="idticket">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					<button type="sumit" class="btn btn-primary">Guardar</button>
				</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
