<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Activos
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
                        <a href="<?php echo base_url(); ?>activos/activos/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Activos</a>
                    </div>
                </div>
                <hr>
                    <div class="panel-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tipo </th>
                                    <th>Descripción </th>
                                    <th>Fabricante</th>
                                    <th>Modelo</th>
                                    <th>Numero de Serie</th>
                                    <th>Usuario Responsable</th>
                                    <th>Num Activo </th>
                                    <th>Familia</th>
                                    <th>Ram</th>
                                    <th> Año de Compra</th>
                                    <th>Estado</th>
                                    <th>Color</th>
                                    <th>Bateria</th>
                                    <th>Cargador</th>
                                    <th>Procesador</th>
                                    <th>Nombre Empresa</th>
                                    <th>Ubicación</th>
                                    <th>Factura</th>
                                    <th>Fecha de Compra</th>
                                    <th>Precio de Compra</th>
                                    <th>Precio de Renta</th>
                                    <th>Factura Fisico</th>
                                    <th>Observaciones</th>
                                    <th>estatusActivo</th>
                                    <th>Plan de Mantenimiento</th>
                                    <th>QR</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1 ?>
                                <?php if (!empty($activos)) : ?>
                                    <?php foreach ($activos as $activo) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $activo->tipo; ?></td>
                                            <td><?php echo $activo->descripcionact; ?></td>
                                            <td><?php echo $activo->nombreFabricante; ?></td>
                                            <td><?php echo $activo->modelo; ?></td>
                                            <td><?php echo $activo->numserie; ?></td>
                                            <td><?php echo $activo->usuNombre . " " . $activo->usuPaterno; ?></td>
                                            <td><?php echo $activo->activofijo; ?></td>
                                            <td><?php echo $activo->nombreFamilia; ?></td>
                                            <td><?php echo $activo->ram; ?></td>
                                            <td><?php echo $activo->anoCompra; ?></td>
                                            <td><?php echo $activo->estado; ?></td>
                                            <td><?php echo $activo->color; ?></td>
                                            <td><?php echo $activo->bateria; ?></td>
                                            <td><?php echo $activo->cargador; ?></td>
                                            <td><?php echo $activo->procesador; ?></td>
                                            <td><?php echo $activo->nombreEmpresa; ?></td>
                                            <td><?php echo $activo->ubicacion; ?></td>
                                            <td><?php echo $activo->factura; ?></td>
                                            <td><?php echo $activo->fechaCompra; ?></td>
                                            <td><?php echo $activo->precioCompra; ?></td>
                                            <td><?php echo $activo->precioRenta; ?></td>
                                            <td><?php echo $activo->facturafisico; ?></td>
                                            <td><?php echo $activo->observaciones; ?></td>
                                            <td><?php echo $activo->estatusActivo; ?></td>
                                            <td>
                                                <?php
                                                    if ($activo->activomanto == 1) {
                                                            $btn='btn btn-success';
                                                            $icono='fa fa-check';
                                                     } else { 
                                                        $btn='btn btn-danger';
                                                        $icono='fa fa-close';
                                                     } 
                                                    ?>
                                                <a href="<?php echo base_url() ?>activos/activos/activarydesactivar/<?php echo $activo->idActivo; ?>/<?php echo $activo->activomanto;?>" class="<?php echo $btn ?>"><i class="<?php echo $icono ?>"></i></a>

                                            </td>
                                            <td>
                                                <a download="<?php echo $activo->usuario; ?>" href="<?php echo base_url() ?>assets/activos/qr/<?php echo $activo->activofijo; ?>.png" title="<?php echo $activo->activofijo; ?>">
                                                    <img class="box-center" src="<?php echo base_url() ?>assets/activos/qr/<?php echo $activo->activofijo; ?>.png" height="145px" width="145px" />
                                                </a>
                                                <a class="btn btn-info btn-flat" onclick="qr('<?php echo $activo->descripcionact; ?>','<?php echo $activo->nombreEmpresa; ?>','<?php echo $activo->numserie; ?>','<?php echo $activo->procesador; ?>','<?php echo $activo->ram; ?>','<?php echo $activo->nombreFamilia; ?>','<?php echo $activo->activofijo; ?>','<?php echo $activo->bateria; ?>','<?php echo $activo->cargador; ?>','<?php echo $activo->color; ?>','<?php echo $activo->fechaCompra; ?>','<?php echo $activo->facturafisico; ?>');">Generar QR</a>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info" onclick="historial(<?php echo $activo->idActivo; ?>);"><i class="fa fa-search"></i></a>
                                                    <a href="<?php echo base_url() ?>activos/activos/edit/<?php echo $activo->idActivo; ?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url(); ?>activos/activos/delete/<?php echo $activo->idActivo; ?>" class="btn btn-danger"><span class="fa fa-trash"></span></a>
                                                    <a class="btn btn-primary" onclick="abre_modal(<?php echo $activo->idActivo; ?>);"><i class="fa fa-hourglass"></i></a>
                                                    <a href="<?php echo base_url() ?>activos/activos/activoconsumible/<?php echo $activo->idActivo; ?>" class="btn btn-info"><i class="fa fa-info-circle"></i></a>
                                                    <a href="<?php echo base_url() ?>reportes/equipos/equipoactivo/<?php echo $activo->idActivo; ?>" class="btn btn-warning"><i class="fa fa-print"></i></a>
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

<!-- Modal -->
<div class="modal fade" id="Historial" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Seleccione un Servicio</h4>
            </div>
            <div class="modal-body">
                <table id="tblbitacora" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Historico</th>
                        <th>Usuario Asignada</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Motivo de Asignacion</th>
                        <th>Hoja de asignacion</th>
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


<div class="modal fade" id="abreModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style=" width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Asignar Activo</h4>
            </div>
            <div class="modal-body">
                <form id="activos_form" action="<?php echo base_url(); ?>activos/activos/updateActivos" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label>Usuarios</label>
                        <select name="acusuario" id="acusuario" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php foreach ($usuarios as $usuario) : ?>
                                <option value="<?php echo $usuario->idUsuario; ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Empresa</label>
                        <select name="acempresa" id="acempresa" class="form-control">
                            <option value="">Seleccione...</option>
                            <?php foreach ($empresas as $empresa) : ?>
                                <option value="<?php echo $empresa->idEmpresa; ?>"><?php echo $empresa->nombreEmpresa ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Observaciones:</label>
                        <textarea type="text" class="form-control" id="acobs" name="acobs"></textarea>
                    </div>
                    <div class="form-group ">
                        <label>Ubicación:</label>
                        <input type="text" class="form-control" id="acubicacion" name="acubicacion">
                    </div>
                    <div class="form-group ">
                        <label>Estatus</label>
                        <select name="acestatus" id="acestatus" class="form-control">
                            <option value="">Seleccione...</option>
                            <option value="ASIGNADO">ASIGNADO</option>
                            <option value="DISPONIBLE">DISPONIBLE</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Factura Fisico:</label>
                        <input type="file" class="form-control" id="acarchivo" name="acarchivo">
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="id" name="id" />
                        <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"> Guardar</span></button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
