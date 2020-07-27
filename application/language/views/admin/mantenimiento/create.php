<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mantenimiento
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
                        <form action="<?php echo base_url(); ?>tickets/MantenimientoController/store" method="POST">
                            <div class="form-group">
                                <label>Dispositivos</label>
                                <select name="catalogo" id="catalogo" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($catalogos as $catalogo) : ?>
                                        <option value="<?php echo $catalogo->idcatalagomanto  ?>"><?php echo $catalogo->nombremanto ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Asunto:</label>
                                <input type="text" class="form-control" id="asunto" name="asunto" placeholder="Ingrese el asunto">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Ingrese la descripcion">
                            </div>
                            <div class="form-group">
                                <label>Estatus</label>
                                <select name="estatus" id="estatus" class="form-control" required>
                                    <option value="En Proceso">En Proceso</option>
                                    <option value="Atendido">Atendido</option>
                                    <option value="Regresado">Regresado</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Guardar</button>
                                <a href="<?php echo base_url(); ?>tickets/MantenimientoController" class="btn btn-danger"><i class="fa fa-trash"></i> Cancelar</a>
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