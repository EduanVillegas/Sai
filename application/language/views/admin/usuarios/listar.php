<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			Usuarios
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
						<a href="<?php echo base_url(); ?>usuarios/usuarios/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Usuarios</a>
					</div>
				</div>
				<hr>

				<div class="row">
					<div class="col-md-12">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Curp</th>
									<th>Usuario</th>
									<th>Folio</th>
									<th>RFC</th>
									<th>NSS</th>
								
									<th>Dirección</th>
									<th>Telefono</th>
									<th>Celular</th>
									<th>Correo Personal</th>
									<th>Lugar de Nacimiento</th>
									<th>Rol</th>
									<th>Tipo de Sangre</th>
									<th>alergia</th>
									<th>Correo</th>
									<th>Tipo</th>
									<th>Credencial</th>
									<th>Marbete</th>
									<th>Num.Marbete</th>
									<th>Credencial Magnetica</th>
									<th>Transporte</th>
									<th>Empresa</th>
									<th>Perfil</th>
									<th>Area</th>
									<th>QR</th>
									<th>Imagen</th>
									<th>Opciones</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1 ?>
								<?php if (!empty($usuarios)) : ?>
									<?php foreach ($usuarios as $usuario) : ?>
										<tr>
											<td><?php echo $i++; ?></td>
											<td><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno . " " . $usuario->usuMaterno ?></td>
											<td><?php echo $usuario->usucurp; ?></td>
											<td><?php echo $usuario->usuario; ?></td>
											<td><?php echo $usuario->folio; ?></td>
											<td><?php echo $usuario->usurfc; ?></td>
											<td><?php echo $usuario->usunss; ?></td>
											<td><?php echo $usuario->usudire; ?></td>
											<td><?php echo $usuario->usutel; ?></td>
											<td><?php echo $usuario->usucel; ?></td>
											<td><?php echo $usuario->usumail; ?></td>
											<td><?php echo $usuario->usulug; ?></td>
											<td><?php echo $usuario->usurol; ?></td>
											<td><?php echo $usuario->ususan; ?></td>
											<td><?php echo $usuario->usualerg; ?></td>
											<td><?php echo $usuario->usucorreo; ?></td>
											<td><?php echo $usuario->tipo; ?></td>
											<td><?php echo $usuario->credencial; ?></td>
											<td><?php echo $usuario->marbete; ?></td>
											<td><?php echo $usuario->nummarbete; ?></td>
											<td><?php echo $usuario->credencialmag; ?></td>
											<td><?php echo $usuario->transporte; ?></td>
											<td><?php echo $usuario->nombreempresa; ?></td>
											<td><?php echo $usuario->pernombre; ?></td>
											<td><?php echo $usuario->nombrearea; ?></td>
											<td>
												<?php if (!empty($usuario->qr)) : ?>
													<a download="<?php echo $usuario->qr; ?>" href="<?php echo base_url() ?>assets/usuarios/qr/<?php echo $usuario->qr; ?>" title="<?php echo $usuario->qr; ?>">
														<img class="box-center" src="<?php echo base_url() ?>assets/usuarios/qr/<?php echo $usuario->qr; ?>" height="100px" width="100px" />
													</a>
												<?php else : ?>
													<a class="btn btn-info btn-flat" href="<?php echo base_url(); ?>usuarios/usuarios/generarQR/<?php echo $usuario->idUsuario; ?>/<?php echo $usuario->usuario; ?>">Generar QR</a>
												<?php endif; ?>
											</td>
											<td><img class="box-center" src="<?php echo base_url() ?>assets/usuarios/imagenes/<?php echo $usuario->imagen; ?>" height="100px" width="100px" /></td>
											<td>
												<a class="btn btn-warning btn-flat" href="<?php echo base_url(); ?>usuarios/usuarios/edit/<?php echo $usuario->idUsuario; ?>"><span class="fa fa-pencil"></span></a>
												<?php if ($usuario->usuActivo == 1) : ?>
													<a class="btn btn-danger btn-flat" onclick="activarydesactivar(<?php echo $usuario->idUsuario; ?>,<?php echo $usuario->usuActivo; ?>)"><span class="fa fa-check"></span></a>
												<?php else : ?>
													<a class="btn btn-danger btn-flat" onclick="activarydesactivar(<?php echo $usuario->idUsuario; ?>,<?php echo $usuario->usuActivo; ?>)"><span class="fa fa-remove"></span></a>
												<?php endif; ?>
											</td>
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

