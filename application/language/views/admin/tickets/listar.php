<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Tickets
			<small>Listado</small>
		</h1>
	</section>
	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="box box-solid">
			<div class="box-body">
				<div class="row">
					<div class="col-md-12">
						<a href="<?php echo base_url(); ?>tickets/TicketsController/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Tickets</a>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<table id="example1" class="table table-bordered table-hover ">
							<thead>
								<tr>
									<th>#</th>
									<th>Usuario</th>
									<th>Asunto Ticket</th>
									<th>Descripcion Ticket</th>
									<th>Fecha Ticket</th>
									<th>Hora Ticket</th>
									<th>Tiempo de Respuesta En Dias</th>
									<th>Fecha Termino</th>
									<th>Documento Usuario</th>
									<th>Calificacion de Usuario</th>
									<th>Estatus</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($tickets)) : ?>
									<?php foreach ($tickets as $ticket) : ?>
										<tr>
											<td>1</td>
											<td><?php echo $ticket->usuNombre . " " . $ticket->usuPaterno; ?></td>
											<td><?php echo $ticket->asuntoTic; ?></td>
											<td><?php echo $ticket->descTic; ?></td>
											<td><?php echo $ticket->fechaTic; ?></td>
											<td><?php echo $ticket->ticktime; ?></td>
											<td><?php echo $ticket->tiemRespSop; ?></td>
											<td><?php echo $ticket->fechaTicterm; ?></td>
											<td><?php echo $ticket->documentoTic; ?></td>
											<td><?php echo $ticket->califTic; ?></td>
											<td><?php echo $ticket->estatusTic; ?></td>
											<td> <a class="btn btn-success" onclick="abrirmodal(<?php echo $ticket->idTickets; ?>);"><i class="fa fa-comments"></i></a> </td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
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

<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?php echo base_url(); ?>tickets/TicketsController/updatehistorial" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Informacion de la Categoria</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Fecha de Ticket:</label>
						<input type="text" name="fechati" id="fechati" class="form-control datepicker" readonly>
					</div>
					<div class="form-group">
						<label>Descripcion:</label>
						<input type="text" name="descripcion" id="descripcion" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Fecha de Termino:</label>
						<input type="text" name="fechater" id="fechater" class="form-control datepicker" readonly>
					</div>
					<div class="form-group">
						<label>Deseas Cerrar Ticket:</label>
						<select name="estatus" id="estatus" class="form-control">
							<option value="CERRADO">SI</option>
							<option value="ASIGNADO">NO</option>
						</select>
					</div>
					<div class="form-group">
						<label>Motivo:</label>
						<textarea name="motivo" id="motivo" cols="5" rows="5" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<select name="conductori" id="conductori" class="form-control">
							<option value="EXCELENTE">EXCELENTE </option>
							<option value="BUENO">BUENO</option>
							<option value="REGULAR">REGULAR</option>
							<option value="MALO">MALO</option>
						</select>
					</div>
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
