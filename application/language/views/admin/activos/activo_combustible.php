<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Activos
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
                        <form action="<?php echo base_url(); ?>activos/activos/storeactivoconsimible" method="post">
                            <?php if ($this->session->flashdata("error")) : ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>
                                </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <label for="">&nbsp;</label>
                                    <button type="button" onclick="asigcombus(<?php echo $id ?>);" class="btn btn-success btn-flat btn-block"><span class="fa fa-plus"></span> Agregar</button>
                                </div>
                            </div>
                            <br><br><br><br>
                            <table id="tblactivocomsumible" class="table table-striped table-bordered table-condensed table-hover">
                                <thead>
                                    <th>nombre</th>
                                    <th>stock</th>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Guardar</button>
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

<!-- Modal -->
<div class="modal fade" id="asigconsumible" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 80% !important;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Seleccione un Consumible</h4>
            </div>
            <div class="modal-body">
                <table id="tblbitacora" class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>nombre</th>
                        <th>descripcion</th>
                        <th>marca</th>
                        <th>modelo</th>
                        <th>stock</th>
                    </thead>
                    <tbody id="cuerpoconsumible">
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