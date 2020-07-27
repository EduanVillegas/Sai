<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			mobiliarios
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
						<a href="<?php echo base_url(); ?>mobiliarios/mobiliariosController/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar mobiliarios</a>
					</div>
				</div>
				<hr>
				<div class="panel-body table-responsive">
					<table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Tipo</th>
								<th>Des Mobiliario </th>
								<th>Medida</th>
								<th>Ubicacion</th>
								<th>Observacion</th>
								<th>Usuario</th>
								<th>Numero mobiliario </th>
								<th>Fecha Compra</th>
								<th>Factura</th>
								<th>Costo</th>
								<th>Qr</th>
								<th>Opciones</th>
							</tr>
						</thead>
						<tbody>
							<?php $i = 1 ?>
							<?php if (!empty($mobiliarios)) : ?>
								<?php foreach ($mobiliarios as $mobiliario) : ?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $mobiliario->tipomob; ?></td>
										<td><?php echo $mobiliario->desmob; ?></td>
										<td><?php echo $mobiliario->medidamob; ?></td>
										<td><?php echo $mobiliario->ubicamob; ?></td>
										<td><?php echo $mobiliario->obsermob; ?></td>
										<td><?php echo $mobiliario->usuNombre . " " . $mobiliario->usuPaterno . " " . $mobiliario->usuPaterno ?></td>
										<td><?php echo $mobiliario->numactivo; ?></td>
										<td><?php echo $mobiliario->fechacompra; ?></td>
										<td><?php echo $mobiliario->facturamob; ?></td>
										<td><?php echo $mobiliario->costomob; ?></td>
										<td>
											<?php if (!empty($mobiliario->qr)) : ?>
												<a download="<?php echo $mobiliario->qr; ?>" href="<?php echo base_url() ?>assets/mobiliario/qr/<?php echo $mobiliario->qr; ?>.png" title="<?php echo $mobiliario->qr; ?>">
													<img class="box-center" src="<?php echo base_url() ?>assets/mobiliario/qr/<?php echo $mobiliario->qr; ?>.png" height="145px" width="145px" />
												</a>
											<?php else : ?>
												<a class="btn btn-info btn-flat" onclick="qr('<?php echo $mobiliario->tipomob; ?>','<?php echo $mobiliario->desmob;  ?>','<?php echo $mobiliario->medidamob; ?>','<?php echo $mobiliario->numactivo; ?>','<?php echo $mobiliario->ubicamob; ?>','<?php echo $mobiliario->obsermob; ?>','<?php echo $mobiliario->idmobiliario; ?>');">Generar QR</a>
											<?php endif; ?>
										</td>
										<td>
											<div class="btn-group">
												<a href="<?php echo base_url() ?>mobiliarios/mobiliariosController/edit/<?php echo $mobiliario->idmobiliario; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
												<a href="<?php echo base_url(); ?>mobiliarios/mobiliariosController/delete/<?php echo $mobiliario->idmobiliario; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
