<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Autorizacion Bitacora
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
                        <a href="<?php echo base_url(); ?>BitacoraController/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Bitacora</a>
                    </div>
                </div>
                <hr>
                <?php if ($this->session->userdata("idArea") == 4) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Motivo</th>
                                        <th>Hora de Entrada</th>
                                        <th>Hora de Salida</th>
                                        <th>Autorizacion RH</th>
                                        <th>Autorizacion Jefe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($bitacoras)) : ?>
                                        <?php foreach ($bitacoras as $bitacora) : ?>
                                            <?php
                                                        if ($bitacora->autRH == 0) {
                                                            $rh = "Pendiente";
                                                            $rhc = "label bg-blue";
                                                        } elseif ($bitacora->autRH == 1) {
                                                            $rh = "Autorizado";
                                                            $rhc = "label bg-green";
                                                        } else {
                                                            $rh = "Rechazado";
                                                            $rhc = "label bg-red";
                                                        }

                                                        if ($bitacora->autJF == 0) {
                                                            $jf = "Pendiente";
                                                            $jfc = "label bg-blue";
                                                        } elseif ($bitacora->autJF == 1) {
                                                            $jf = "Autorizado";
                                                            $jfc = "label bg-green";
                                                        } else {
                                                            $jf = "Rechazado";
                                                            $jfc = "label bg-orange";
                                                        }

                                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $bitacora->bitFecha; ?></td>
                                                <td><?php echo $bitacora->bitFecha; ?></td>
                                                <td><?php echo $bitacora->bitObservaciones; ?></td>
                                                <td><?php echo $bitacora->bitSalida; ?></td>
                                                <td><?php echo $bitacora->bitSalida; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" onclick="btnrh(<?php echo $bitacora->idBitacora; ?>)">
                                                        <span class="fa fa-question"> <?php echo $rh ?></span>
                                                    </button>
                                                </td>
                                                <td><span class="<?php echo $jfc; ?>"><?php echo $jf; ?></span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php elseif ($this->session->userdata("idPerfil") == 1) : ?>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Motivo</th>
                                        <th>Hora de Entrada</th>
                                        <th>Hora de Salida</th>
                                        <th>Autorizacion RH</th>
                                        <th>Autorizacion Jefe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php if (!empty($jfs)) : ?>
                                        <?php foreach ($jfs as $jf) : ?>
                                            <?php
                                                        if ($jf->autRH == 0) {
                                                            $rh = "Pendiente";
                                                            $rhc = "label bg-blue";
                                                        } elseif ($jf->autRH == 1) {
                                                            $rh = "Autorizado";
                                                            $rhc = "label bg-green";
                                                        } else {
                                                            $rh = "Rechazado";
                                                            $rhc = "label bg-red";
                                                        }

                                                        if ($jf->autJF == 0) {
                                                            $jff = "Pendiente";
                                                            $jfc = "label bg-blue";
                                                        } elseif ($jf->autJF == 1) {
                                                            $jff = "Autorizado";
                                                            $jfc = "label bg-green";
                                                        } else {
                                                            $jff = "Rechazado";
                                                            $jfc = "label bg-orange";
                                                        }

                                                        ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo $jf->bitFecha; ?></td>
                                                <td><?php echo $jf->usuNombre." ".$jf->usuPaterno." ".$jf->usuPaterno; ?></td>
                                                <td><?php echo $jf->bitObservaciones; ?></td>
                                                <td><?php echo $jf->bitSalida; ?></td>
                                                <td><?php echo $jf->bitSalida; ?></td>
                                                <td><span class="<?php echo $rhc; ?>"><?php echo $rh; ?></span></td>
                                                <td>
                                                    <button type="button" class="btn btn-info" onclick="btnjf(<?php echo $jf->idBitacora; ?>,'<?php echo $jf->usucorreo; ?>')">
                                                        <span class="fa fa-question"><?php echo $jff ?></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<div class="modal fade" id="recursos-humanos">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>BitacoraController/storeRH" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Autorizacion de la Bitacora Recursos Humanos</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Autorizacion</label>
                        <select name="autorizacion" id="autorizacion" class="form-control">
                            <option value="1">SI</option>
                            <option value="2">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" cols="3" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" name="emailusu" id="emailusu">
                    <input type="text" name="idbrh" id="idbrh">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="jefe-inmediato">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url(); ?>BitacoraController/storeJF" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Autorizacion de la Bitacora Jefe Inmediato</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Autorizacion</label>
                        <select name="autorizacion" id="autorizacion" class="form-control">
                            <option value="1">SI</option>
                            <option value="2">NO</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" cols="3" rows="3" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" name="emailusujf" id="emailusujf">
                    <input type="text" name="idbjf" id="idbjf">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->