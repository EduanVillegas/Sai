<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bitacoras
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
                        <form action="<?php echo base_url(); ?>BitacoraController/store" method="POST">
                            <div class="form-group">
                                <label>Fecha:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control datepicker" id="fecha" name="fecha">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group">
                                <label>Motivo:</label>
                                <input type="text" class="form-control" id="motivo" name="motivo">
                            </div>
                            <div class="form-group ">
                                <label>Hora de Final:</label>
                                <div class="input-group">
                                    <input type="text" id="hi" name="hi" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hora de Final:</label>
                                <div class="input-group">
                                    <input type="text"  id="hf" name="hf" class="form-control timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jefe de Areas</label>
                                <select name="acusuario" id="acusuario" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <option value="<?php echo $usuario->idUsuario; ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno . " " . $usuario->usuMaterno ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="emailjf" id="emailjf">
                                <button type="submit" class="btn btn-success"><i  class="fa fa-save"></i> Guardar</button>
                                <a class="btn btn-danger" href="<?php echo base_url(); ?>BitacoraController"><span class="fa fa-arrow-circle-left"> Cancelar</span></a>
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