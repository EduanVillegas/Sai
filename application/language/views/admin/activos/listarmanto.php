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
                                            <a download="<?php echo $activo->usuario; ?>" href="<?php echo base_url() ?>assets/activos/qr/<?php echo $activo->activofijo; ?>.png" title="<?php echo $activo->activofijo; ?>">
                                                <img class="box-center" src="<?php echo base_url() ?>assets/activos/qr/<?php echo $activo->activofijo; ?>.png" height="145px" width="145px" />
                                            </a>
                                            <a class="btn btn-info btn-flat" onclick="qr('<?php echo $activo->descripcionact; ?>','<?php echo $activo->nombreEmpresa; ?>','<?php echo $activo->numserie; ?>','<?php echo $activo->procesador; ?>','<?php echo $activo->ram; ?>','<?php echo $activo->nombreFamilia; ?>','<?php echo $activo->activofijo; ?>','<?php echo $activo->bateria; ?>','<?php echo $activo->cargador; ?>','<?php echo $activo->color; ?>','<?php echo $activo->fechaCompra; ?>','<?php echo $activo->facturafisico; ?>');">Generar QR</a>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a class="btn btn-info" onclick='modalmanto("<?php echo $activo->idActivo; ?>","<?php echo $activo->descripcionact; ?>","<?php echo $activo->activofijo; ?>");'><i class="fa fa-cogs"></i></a>
                                                <a class="btn btn-primary" onclick="historialmanto(<?php echo $activo->idActivo; ?>);"><i class="fa fa-info-circle"></i></a>
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

<div class="modal fade" id="abreModalManteniento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Realizar Manteniento</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>activos/activos/storemanto" method="POST" enctype="multipart/form-data">
                    <div class="form-group ">
                        <label>Equipo:</label>
                        <input type="text" class="form-control" id="equipo" name="equipo" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Activo:</label>
                        <input type="text" class="form-control" id="activo" name="activo" readonly>
                    </div>
                    <div class="form-group ">
                        <label>Fecha:</label>
                        <input type="text" class="form-control datepicker" id="fecha" name="fecha">
                    </div>
                    <div class="form-group ">
                        <label>Funcion:</label>
                        <select name="funcion" id="funcion" class="form-control">
                            <option value="Buena">Buena</option>
                            <option value="Mala">Mala</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Comentarios:</label>
                        <textarea type="text" class="form-control" id="comentarios" name="comentarios"></textarea>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="idactivo" name="idactivo" />
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

<!-- Modal -->
<div class="modal fade" id="historialmanto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Seleccione un Servicio</h4>
            </div>
            <div class="modal-body">
                <table id="tblbitacora" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>#</th>
                        <th>Usuario para Manteniento</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                        <th>Hoja de Manteniento</th>
                    </thead>
                    <tbody id="cuerpomanto">
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