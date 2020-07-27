<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consumible
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
                        <form action="<?php echo base_url(); ?>activos/consumibleController/update" method="POST">
                            <div class="form-group <?php echo form_error('nombre') == true ? 'has-error' : '' ?>">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $consumibles->nombre; ?>">
                                <?php echo form_error("nombre", "<span class='help-block'>", "</span>"); ?>
                            </div>
                            <div class="form-group">
                                <label>Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $consumibles->descripcion; ?>">
                            </div>
                            <div class="form-group">
                                <label>Marca:</label>
                                <input type="text" class="form-control" id="marca" name="marca" value="<?php echo $consumibles->marca; ?>">
                            </div>
                            <div class="form-group">
                                <label>Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" value="<?php echo $consumibles->modelo; ?>">
                            </div>
                            <div class="form-group">
                                <label>Fecha de compra:</label>
                                <input type="text" class="form-control datepicker" id="fechac" name="fechac" value="<?php echo $consumibles->fecha_compra; ?>">
                            </div>
                            <div class="form-group">
                                <label>Costo:</label>
                                <input type="text" class="form-control" id="costo" name="costo" placeholder="Precio de Costo" value="<?php echo $consumibles->costo; ?>" required pattern="^[0-9]{1,5}(\.[0-9]{0,2})?$" title="Ingresa sólo números con 0 ó 2 decimales" >
                            </div>
                            <div class="form-group">
                                <label>Stock:</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="<?php echo $consumibles->stock; ?>">
                            </div>
                            <div class="form-group">
                                <label>Codigo de Barra:</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $consumibles->codigo_barra; ?>">
                            </div>
                            <div class="form-group">
                                <label>Factura:</label>
                                <input type="file" class="form-control" id="factura" name="factura" >
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="id" id="id" value="<?php echo $consumibles->idconsumible; ?>">
                                <button type="submit" class="btn btn-success btn-flat"> <i class="fa fa-save"></i> Guardar</button>
                                <a href="<?php echo base_url();?>activos/consumibleController" class="btn btn-danger"> <i class="fa fa-trash"></i> Cancelar</a>
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