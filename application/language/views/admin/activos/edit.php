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
                        <?php if ($this->session->flashdata("error")) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <p><i class="icon fa fa-ban"></i><?php echo $this->session->flashdata("error"); ?></p>

                            </div>
                        <?php endif; ?>
                        <form action="<?php echo base_url(); ?>activos/activos/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Dispositivos</label>
                                <select name="actipo" id="actipo" onchange="mostrarActivo(this.value)" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($dispositivos as $dispositivo) : ?>
                                        <?php if ($dispositivo->nombre_dispositivo == $activos->tipo) : ?>
                                            <option value="<?php echo $dispositivo->nombre_dispositivo  ?>" selected><?php echo $dispositivo->nombre_dispositivo ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $dispositivo->nombre_dispositivo  ?>"><?php echo $dispositivo->nombre_dispositivo ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Descripción:</label>
                                <input type="text" class="form-control" id="acdescrip" name="acdescrip" value="<?php echo $activos->descripcionact ?>">
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Fabricantes</label>
                                <select name="acfabricante" id="acfabricante" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($fabricantes as $fabricante) : ?>
                                        <?php if ($fabricante->idFabricante == $activos->idFabricante) : ?>
                                            <option value="<?php echo $fabricante->idFabricante; ?>" selected><?php echo $fabricante->nombreFabricante ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $fabricante->idFabricante; ?>"><?php echo $fabricante->nombreFabricante ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Modelo:</label>
                                <input type="text" class="form-control" id="acmodelo" name="acmodelo" value="<?php echo $activos->modelo ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Numero de Serie:</label>
                                <input type="text" class="form-control" id="acserie" name="acserie" value="<?php echo $activos->numserie ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Procesador:</label>
                                <input type="text" class="form-control" id="acprocesador" name="acprocesador" value="<?php echo $activos->procesador ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Ram:</label>
                                <input type="text" class="form-control" id="acram" name="acram" value="<?php echo $activos->ram ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Familia</label>
                                <select name="acfamilia" id="acfamilia" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($familias as $familia) : ?>
                                        <?php if ($familia->idFamilia == $activos->idFamilia) : ?>
                                            <option value="<?php echo $familia->idFamilia; ?> " selected><?php echo $familia->nombreFamilia ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $familia->idFamilia; ?>"><?php echo $familia->nombreFamilia ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Num. de Activo:</label>
                                <input type="text" class="form-control" id="acactivo" name="acactivo" value="<?php echo $activos->activofijo ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Año de Compra:</label>
                                <input type="text" class="form-control" id="anocompra" name="anocompra" value="<?php echo $activos->anoCompra ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Estado del Dispositivos:</label>
                                <select name="acestado" id="acestado" class="form-control select2">
                                    <?php if ($activos->idFamilia == 'USAD0') : ?>
                                        <option value="">Seleccione...</option>
                                        <option value="USADO" selected>USADO</option>
                                        <option value="NUEVA">NUEVA</option>
                                    <?php else : ?>
                                        <option value="">Seleccione...</option>
                                        <option value="USADO">USADO</option>
                                        <option value="NUEVA" selected>NUEVA</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Color:</label>
                                <input type="text" class="form-control" id="accolor" name="accolor" value="<?php echo $activos->color ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Bateria:</label>
                                <input type="text" class="form-control" id="acbateria" name="acbateria" value="<?php echo $activos->bateria ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Cargador:</label>
                                <input type="text" class="form-control" id="accargador" name="accargador" value="<?php echo $activos->cargador ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Usuarios</label>
                                <select name="acusuario" id="acusuario" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <?php if ($usuario->idUsuario == $activos->idUsuario) : ?>
                                            <option value="<?php echo $usuario->idUsuario; ?>" selected><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $usuario->idUsuario; ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Empresa</label>
                                <select name="acempresa" id="acempresa" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($empresas as $empresa) : ?>
                                        <?php if ($empresa->idEmpresa == $activos->idEmpresa) : ?>
                                            <option value="<?php echo $empresa->idEmpresa; ?>" selected><?php echo $empresa->nombreEmpresa ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $empresa->idEmpresa; ?>"><?php echo $empresa->nombreEmpresa ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Ubicación:</label>
                                <input type="text" class="form-control" id="acubicacion" name="acubicacion" value="<?php echo $activos->ubicacion ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Num. Factura:</label>
                                <input type="text" class="form-control" id="acfactura" name="acfactura" value="<?php echo $activos->factura ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Fecha de Compra:</label>
                                <input type="date" class="form-control" id="acfecha" name="acfecha" value="<?php echo $activos->fechaCompra ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Precio de Compra:</label>
                                <input type="text" class="form-control" id="accompra" name="accompra" value="<?php echo $activos->precioCompra ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Precio de Renta:</label>
                                <input type="text" class="form-control" id="acrenta" name="acrenta" value="<?php echo $activos->precioRenta ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Factura Fisico:</label>
                                <input type="file" class="form-control" id="acarchivo" name="acarchivo">
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Estatus</label>
                                <select name="acestatus" id="acestatus" class="form-control">
                                    <?php if ($activos->estatusActivo == 'ASIGNADO') : ?>
                                        <option value="ASIGNADO" selected>ASIGNADO</option>
                                        <option value="DISPONIBLE">DISPONIBLE</option>
                                    <?php else : ?>
                                        <option value="ASIGNADO">ASIGNADO</option>
                                        <option value="DISPONIBLE" selected>DISPONIBLE</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Observaciones:</label>
                                <textarea type="text" class="form-control" id="acobs" name="acobs"><?php echo $activos->observaciones ;?></textarea>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" value="<?php echo $activos->idActivo; ?>" name="idActivo">
                                <button type="submit" class="btn btn-success btn-flat"><span class="fa fa-save"> Guardar</span></button>
                                <a class="btn btn-danger btn-flat" href="<?php echo base_url(); ?>activos/activos"><span class="fa fa-arrow-circle-left"> Cancelar</span></a>
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