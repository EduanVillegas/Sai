<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Perfil
            <small>Editar</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <!-- /.col -->
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-black" style="background: url('<?php echo base_url() ?>assets/usuarios/imagenes/photo1.png') center center;width: 600 px; height: 600 px;">
                                <h3 class="widget-user-username"><?php echo $this->session->userdata("nombre") ?></h3>
                                <h5 class="widget-user-desc"><?php echo $usuarios->perNombre ?></h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?php echo base_url() ?>assets/usuarios/imagenes/<?php echo $this->session->userdata("imagen") ?>" alt="User Avatar">
                            </div>
                            <div class="box-footer">
                                <form action="<?php echo base_url(); ?>usuarios/usuarios/updateperfil" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="form-group">
                                                <label> Nombres:</label>
                                                <input type="text" class="form-control" id="nomusu" name="nomusu" value="<?php echo $usuarios->usuNombre; ?>">
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="form-group">
                                                <label> Apellido Paterno:</label>
                                                <input type="text" class="form-control" id="pateruno" name="pateruno" value="<?php echo $usuarios->usuPaterno; ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label> Apellido Materno:</label>
                                                <input type="text" class="form-control" id="materusu" name="materusu" value="<?php echo $usuarios->usuMaterno; ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="form-group">
                                                <label> Dirección:</label>
                                                <input type="text" class="form-control" id="usudire" name="usudire" value="<?php echo $usuarios->usudire ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="form-group">
                                                <label> Telefono:</label>
                                                <input type="text" class="form-control" id="usutel" name="usutel" value="<?php echo $usuarios->usutel ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label> Celular:</label>
                                                <input type="text" class="form-control" id="usucel" name="usucel" value="<?php echo $usuarios->usucel ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="form-group">
                                                <label> Email Personal:</label>
                                                <input type="email" class="form-control" id="usucorr" name="usucorr" value="<?php echo $usuarios->usumail ?>">
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="form-group">
                                                <label> Usuario:</label>
                                                <input type="text" class="form-control" id="usuusu" name="usuusu" value="<?php echo !empty(form_error('usuusu')) ? set_value('usuusu') : $usuarios->usuario ?>">
                                                <?php echo form_error("usuusu", "<span class='help-block'>", "</span>"); ?>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label> Password:</label>
                                                <input type="password" class="form-control" id="passusu" name="passusu" value="<?php echo $usuarios->password ?>">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-sm-6 border-right">
                                            <div class="form-group">
                                                <label> Email:</label>
                                                <input type="email" class="form-control" id="correousu" name="correousu" value="<?php echo $usuarios->usucorreo ?>">
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label> Imagen:</label>
                                                <input type="file" class="form-control" id="imagen" name="imagen">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                    <div class="row">
                                        <div class="col-lg-12 col-sm-12  ">
                                            <div class="form-group ">
                                                <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"> Actualizar</span></button>
                                           </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </form>
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->