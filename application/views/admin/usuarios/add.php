<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Usuarios
			<small>Nuevo</small>
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
						<form action="<?php echo base_url(); ?>usuarios/usuarios/store" method="POST" enctype="multipart/form-data">
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Nombres:</label>
								<input type="text" class="form-control" id="nomusu" name="nomusu" placeholder="Ingresa Nombres">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Apellido Paterno:</label>
								<input type="text" class="form-control" id="pateruno" name="pateruno" placeholder="Ingresa Apellidos Paternos">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Apellido Materno:</label>
								<input type="text" class="form-control" id="materusu" name="materusu" placeholder="Ingresa Apellidos Maternos">
							</div>
							<div class="form-group <?php echo form_error('usucur') == true ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
								<label> Curp:</label>
								<input type="text" class="form-control" id="usucur" name="usucur" placeholder="Ingresa CURP">
								<?php echo form_error("usucur", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group <?php echo form_error('usurfc') == true ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
								<label> RFC:</label>
								<input type="text" class="form-control" id="usurfc" name="usurfc" placeholder="Ingresa RFC">
								<?php echo form_error("usurfc", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Dirección:</label>
								<input type="text" class="form-control" id="usudire" name="usudire" placeholder="Ingresa Direccion">
							</div>
							<div class="form-group  col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
								<label> Telefono:</label>
								<input type="text" class="form-control" id="usutel" name="usutel" minlength="10" placeholder="ejemplo 5512345678">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Celular:</label>
								<input type="text" class="form-control" id="usucel" name="usucel" minlength="10" placeholder="ejemplo 5512345678">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Email Personal:</label>
								<input type="email" class="form-control" id="usucorr" name="usucorr" placeholder="ejemplo@mail.com">
							</div>
							<div class="form-group <?php echo form_error('usunss') == true ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Nss:</label>
								<input type="text" class="form-control" id="usunss" name="usunss" placeholder="Ingresa NSS">
								<?php echo form_error("usunss", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Lugar de Nacimiento:</label>
								<input type="text" class="form-control" id="usunac" name="usunac" placeholder="Ingresa Lugar Nacimiento">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Rol de Usuario:</label>
								<input type="text" class="form-control" id="usurol" name="usurol" placeholder="Ingresa Rol de Usuario">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Tipo de Sangre:</label>
								<input type="text" class="form-control" id="ususan" name="ususan" placeholder="Ingresa Tipo de Sangre">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Alergia a Medicamento:</label>
								<input type="text" class="form-control" id="usuale" name="usuale" placeholder="Ingresa Alergia algun Medicamento">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Nombre en Caso de emergencia:</label>
								<input type="text" class="form-control" id="nomb_emergencia" name="nomb_emergencia" placeholder="Nombre en Caso de emergencia">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Numero de Emergencia:</label>
								<input type="text" class="form-control" id="no_emergencia" name="no_emergencia" placeholder="Numero de Emergencia" maxlength="10" pattern="[0-9]+">
							</div>
							<div class="form-group <?php echo form_error('usuusu') == true ? 'has-error' : '' ?> col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Usuario:</label>
								<input type="text" class="form-control" id="usuusu" name="usuusu" placeholder="ejemplo: admin12">
								<?php echo form_error("usuusu", "<span class='help-block'>", "</span>"); ?>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Password:</label>
								<input type="password" class="form-control" id="passusu" name="passusu" placeholder="Ingresa Contraseña">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Email:</label>
								<input type="email" class="form-control" id="correousu" name="correousu" placeholder="ejemplo@mail.com">
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Estatus:</label>
								<select name="estatusu" id="estatusu" class="form-control" required="required">
									<option value="">Estatus..</option>
									<option value="1">ACTIVO</option>
									<option value="0">DESACTIVADO</option>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label>Perfiles:</label>
									<select name="perfilusu" id="perfilusu" class="form-control">
										<?php foreach ($perfiles as $perfil) : ?>
											<option value="<?php echo $perfil->idPerfil ?>"><?php echo $perfil->perNombre; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<label> Folio:</label>
									<input type="text" name="folio" id="folio" class="form-control">
								</div>
							</div>

							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label>Empresas:</label>
								<select name="empreusu" id="empreusu" class="form-control">
									<?php foreach ($empresas as $empresa) : ?>
										<option value="<?php echo $empresa->idEmpresa ?>"><?php echo $empresa->nombreEmpresa; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label>Función/área:</label>
								<select name="areausu" id="areausu" class="form-control">
									<?php foreach ($areas as $area) : ?>
										<option value="<?php echo $area->idArea ?>"><?php echo $area->nombreArea; ?></option>
									<?php endforeach; ?>
								</select>
							</div>
							<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<label> Imagen:</label>
								<input type="file" class="form-control" id="imagen" name="imagen">
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
										</tr>
									</thead>
									<tbody id="cuerpo">

									</tbody>
								</table>
							</div>
							<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<button type="submit" class="btn btn-success"><span class="fa fa-save"> Guardar</span></button>
								<a class="btn btn-danger" href="<?php echo base_url(); ?>usuarios/usuarios"><span class="fa fa-arrow-circle-left"> Cancelar</span></a>
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
