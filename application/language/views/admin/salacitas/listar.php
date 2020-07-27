<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Sala de Juntas
			<small>Listado</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<a href="#" class="btn btn-primary btn-flat add_calendar"><span class="fa fa-plus"></span> Agendar Cita</a>
					</div>
					<?php if ($this->session->userdata("idPerfil")<>8) {?>
						<div class="col-md-4">
						<a href="#" class="btn btn-primary btn-flat add_listar"><span class="fa fa-plus"></span> Ver Citas</a>
					</div>
					<?php } ?>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div id="calendar"></div>
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
<!-- place -->
<div id="calendarIO"></div>
<div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<form class="form-horizontal" method="POST" id="form_create">
				<input type="hidden" name="calendar_id" id="calendar_id" value="0">
				<input type="hidden" name="idusuario" id="usuario" value="<?php echo $this->session->userdata("id") ?>">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Agendar Cita </h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<div class="alert alert-danger" style="display: none;"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Motivo<span class="required"> * </span></label>
						<div class="col-sm-10">
							<input type="text" name="title" id="title" class="form-control" placeholder="Titulo">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Descripcion</label>
						<div class="col-sm-10">
							<input type="text" name="description" id="description" class="form-control" placeholder="Descripcion">
						</div>
					</div>

					<div class="form-group">
						<label for="color" class="col-sm-2 control-label">Color</label>
						<div class="col-sm-10">
							<select name="color" id="color" class="form-control">
								<option value="">Selecciona...</option>
								<option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
								<option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
								<option style="color:#008000;" value="#008000">&#9724; Green</option>
								<option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
								<option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
								<option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
								<option style="color:#000;" value="#000">&#9724; Black</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Fecha inicio</label>
						<div class="col-sm-10">
							<div class='input-group date datetime' data-date-format="yyyy-mm-dd hh:ii">
								<input type='text' class="form-control" name="start_date" id="start_date" required />
								<span class="input-group-addon">
									<span class="fa fa-calendar">
									</span>
								</span>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Fecha Final</label>
						<div class="col-sm-10">
							<div class='input-group date datetime' data-date-format="yyyy-mm-dd hh:ii">
								<input type='text' class="form-control" name="end_date" id="end_date" required />
								<span class="input-group-addon">
									<span class="fa fa-calendar">
									</span>
								</span>
							</div>
						</div>
					</div>					
						<div class="form-group">
							<label class="control-label col-sm-2">Quien Reserva</label>
							<div class="col-sm-10">
								<input type="text" name="invitado" id="invitado" class="form-control" placeholder="Ejemplo: Eduan Villegas" required>
							</div>
						</div>
					


				</div>
				<div class="modal-footer">
					<a href="javascript::void" class="btn btn-default" data-dismiss="modal">Cancelar</a>
					<a class="btn btn-danger delete_calendar" style="display: none;" id="delete">Borrar</a>
					<a class="btn btn-success update_calendar" style="display: none;" id="update">Actualizar</a>
					<button type="submit" class="btn btn-primary" id="guardar">Guardar</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- end place -->
<!-- Modal -->
<div class="modal fade" id="listar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 80% !important;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Seleccione un Servicio</h4>
			</div>
			<div class="modal-body">
				<table id="tblbitacora" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Descripcion</th>
							<th>Color</th>
							<th>Fecha de Inicio</th>
							<th>Fecha de Final</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="cuerpo">
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
<!-- Fin modal -->
