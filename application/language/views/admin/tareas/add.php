<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            tareas
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
                        <form action="<?php echo base_url(); ?>tareas/tareas/store" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="categoria">Usuarios:</label>
                                <select name="usuariot" id="usuariot" class="form-control">
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <option value="<?php echo $usuario->idUsuario ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categoria">Area:</label>
                                <select name="areat" id="areat" class="form-control">
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <option value="<?php echo $usuario->idUsuario ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de alta:</label>
                                <input type="date" class="form-control" id="fechaat" name="fechaat" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-group" <?php echo form_error('titulot') == true ? 'has-error' : '' ?>">
                                <label for="">Titulo de Tarea:</label>
                                <input type="text" class="form-control" id="titulot" name="titulot">
                                <?php echo form_error("titulot", "<span class='help-block'>", "</span>"); ?>
                            </div>
                            <div class="form-group">
                                <label for="">Descripcion de Tarea:</label>
                                <input type="text" class="form-control" id="descripciont" name="descripciont" >
                            </div>
                            <div class="form-group">
                                <label for="">Fecha de Entrega:</label>
                                <input type="date" class="form-control" id="fechaet" name="fechaet" value="<?php echo date("Y-m-d"); ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Estatus:</label>
                                <select name="estatust" id="estatust" class="form-control" required>

                                    <option value="0">Selecciona Estatus..</option>

                                    <option value="ASIGNADO">ASIGNADO</option>

                                    <option value="EN PROCESO">EN PROCESO</option>

                                    <option value="CANCELADO">CANCELADO</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Cargar Archivo:</label>
                                <input type="file" name="archivot" id="archivot" class="form-control" />
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">Guardar</button>
                                <a href="<?php echo base_url(); ?>tareas/tareas" class="btn btn-danger">Cancelar</a>
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