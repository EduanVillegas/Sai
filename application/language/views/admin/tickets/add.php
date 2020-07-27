<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Tickets
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
                        <form action="<?php echo base_url(); ?>tickets/TicketsController/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Catalago de Servicios:</label>
                                <select name="catalogo" id="catalogo" class="form-control select2">
                                    <?php foreach ($catalagos as $catalago) : ?>
                                        <option value="<?php echo $catalago->idServSoporte ?>"><?php echo $catalago->servSoporte; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Asunto:</label>
                                <textarea name="asunto" id="asunto" cols="5" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Descripcion:</label>
                                <textarea name="descripcion" id="descripcion" cols="5" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Estatus:</label>
                                <select name="estatus" id="estatus" class="form-control">
                                    <option value="ASIGNADO">Asignado</option>
                                    <option value="CERRADO">Cerrado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cargar Archivo:</label>
                               <input type="file" name="archivo" id="archivo" class="form-control">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"> Guardar</span></button>
                                <a class="btn btn-danger btn-flat" href="<?php echo base_url(); ?>tickets/TicketsController"><span class="fa fa-arrow-circle-left"> Cancelar</span></a>
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