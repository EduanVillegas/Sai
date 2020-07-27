<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mantenimiento
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
                        <a href="<?php echo base_url(); ?>tickets/MantenimientoController/create" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Mantenimiento</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuario</th>
                                    <th>Mantenimiento</th>
                                    <th>Asunto</th>
                                    <th>Descricion</th>
                                    <th>Fecha</th>
                                    <th>Status</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php if (!empty($mantenimientos)) : ?>
                                    <?php foreach ($mantenimientos as $mantenimiento) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $mantenimiento->usuNombre . " " . $mantenimiento->usuPaterno . " " . $mantenimiento->usuMaterno; ?></td>
                                            <td><?php echo $mantenimiento->nombremanto; ?></td>
                                            <td><?php echo $mantenimiento->asunto; ?></td>
                                            <td><?php echo $mantenimiento->descripcion; ?></td>
                                            <td><?php echo $mantenimiento->fechamanto; ?></td>
                                            <td><?php echo $mantenimiento->estatus; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" onclick="abrirchat(<?php echo $mantenimiento->idmantenimiento; ?>)"><span class="fa fa-comments"></span></button>
                                                    <a href="<?php echo base_url() ?>tickets/MantenimientoController/edit/<?php echo $mantenimiento->idmantenimiento; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url(); ?>tickets/MantenimientoController/delete/<?php echo $mantenimiento->idmantenimiento; ?>" class="btn btn-danger btn-remove"><span class="fa fa-trash"></span></a>
                                                   <a  onclick="histomanto(<?php echo $mantenimiento->idmantenimiento; ?>)" class="btn btn-info"><span class="fa fa-hourglass"></span></a>
												 <a href="<?php echo base_url(); ?>tickets/MantenimientoController/estado/<?php echo $mantenimiento->idmantenimiento; ?>" class="btn btn-success"><span class="fa fa-remove"></span></a>
												</div>
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

<div class="modal fade" id="modalchat">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url();?>tickets/MantenimientoController/storeActManto" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Informacion del Mantenimiento</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Asunto</label>
                        <input type="text" name="asunto" id="asunto" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Descricion</label>
                        <input type="text" name="descripcion" id="descripcion" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Comentarios</label>
                        <textarea name="comentarios" id="comentarios" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Estatus</label>
                        <select name="estatus" id="estatus" class="form-control" required>
                            <option value="Atendido">Atendido</option>
                            <option value="Regresado">Regresado</option>
                            <option value="En Proceso">En Proceso</option>
                            <option value="Cerrado">Cerrado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idusuario" id="idusuario">
					<input type="hidden" name="idmanto" id="idmanto">
					<input type="hidden" name="correousu" id="correousu">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    <button type="sumit" class="btn btn-success">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="Historial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span id="titulo"></span></h4>
            </div>
            <div class="modal-body">
                <table id="tblbitacora" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Usuario</th>
                        <th>Comentarios</th>
                        <th>Estatus</th>
                        <th>Fecha</th>
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
