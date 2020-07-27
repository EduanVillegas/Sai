<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Mobiliarios
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
                        <form action="<?php echo base_url(); ?>mobiliarios/mobiliariosController/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tipo:</label>
                                <input type="text" class="form-control" id="tipo" name="tipo">
                            </div>
                            <div class="form-group">
                                <label>Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion">
                            </div>
                            <div class="form-group">
                                <label>Medida:</label>
                                <input type="text" class="form-control" id="medida" name="medida" value="N/A">
                            </div>
                            <div class="form-group">
                                <label>Ubicacion:</label>
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion">
                            </div>
                            <div class="form-group">
                                <label>Observaciones:</label>
                                <input type="text" class="form-control" id="observaciones" name="observaciones">
                            </div>
                            <div class="form-group ">
                                <label>Usuarios</label>
                                <select name="idusuario" id="idusuario" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <option value="<?php echo $usuario->idUsuario; ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Numero de Activo:</label>
                                <input type="text" class="form-control" id="numactivo" name="numactivo">
                            </div>
                            <div class="form-group">
                                <label>Fecha de Compra:</label>
                                <input type="text" class="form-control datepicker" id="fecompra" name="fecompra" value="<?php echo date("d/m/Y"); ?>">
                            </div>
                            <div class="form-group">
                                <label>Factura:</label>
                                <input type="file" class="form-control" id="factura" name="factura" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <label>Costo:</label>
                                <input type="number" class="form-control" id="costo" name="costo">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a class="btn btn-danger btn-flat" href="<?php echo base_url(); ?>mobiliarios/mobiliariosController"><span class="fa fa-arrow-circle-left"> Cancelar</span></a>
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