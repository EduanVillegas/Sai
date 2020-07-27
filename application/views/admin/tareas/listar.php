<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tareas
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
                        <a href="<?php echo base_url(); ?>tareas/tareas/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar tarea</a>
                    </div>
                </div>
                <hr>
                <div class="panel-body">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th>Numero de Tarea</th>

                                    <th>Usuario </th>

                                    <th>Area Solicito</th>

                                    <th>Fecha Tarea</th>

                                    <th>Descripcion de Tarea</th>

                                    <th>Fecha de Entrega</th>

                                    <th>ESTATUS</th>

                                    <th>&nbsp;</th>

                                    <th>Fecha Termino</th>

                                    <th>Comentarios </th>

                                    <th> Adjunto de Usuario</th>

                                    <th> Adjunto de la Tarea</th>

                                    <th>Fecha de Autorizacion</th>

                                    <th>Estatus de Autorizacion</th>

                                    <th>Comentarios Autorizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1?>
                                <?php if (!empty($tareas)) : ?>
                                    <?php foreach ($tareas as $tarea) : ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $tarea->usuario; ?></td>
                                            <td><?php echo $tarea->nombrearea; ?></td>
                                            <td><?php echo $tarea->start; ?></td>
                                            <td><?php echo $tarea->descripcion; ?></td>
                                            <td><?php echo $tarea->end; ?></td>
                                            <td><?php echo $tarea->estatusTarea; ?></td>
                                            <td><?php echo 'Realizar'; ?></td>
                                            <td><?php echo $tarea->fechaTermino; ?></td>
                                            <td><?php echo $tarea->comentariosTarea; ?></td>
                                            <td><?php echo 'tareaFisico'; ?></td>
                                            <td><?php echo 'tareaFisico'; ?></td>
                                            <td><?php echo $tarea->fechaAprobo; ?></td>
                                            <td><?php echo $tarea->estatusAprobo; ?></td>
                                            <td><?php echo $tarea->motivoAprobo; ?></td>
                                            <td><?php echo 'tareaFisico'; ?></td>
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
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Informacion de la tarea</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->