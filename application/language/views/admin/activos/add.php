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
                        <form action="<?php echo base_url(); ?>activos/activos/store" method="POST" enctype="multipart/form-data">
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Dispositivos</label>
                                <select name="actipo" id="actipo"  class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($dispositivos as $dispositivo) : ?>
                                        <option value="<?php echo $dispositivo->nombre_dispositivo  ?>"><?php echo $dispositivo->nombre_dispositivo ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Descripción:</label>
                                <input type="text" class="form-control" id="acdescrip" name="acdescrip">
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Fabricantes</label>
                                <select name="acfabricante" id="acfabricante" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($fabricantes as $fabricante) : ?>
                                        <option value="<?php echo $fabricante->idFabricante; ?>"><?php echo $fabricante->nombreFabricante ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Modelo:</label>
                                <input type="text" class="form-control" id="acmodelo" name="acmodelo">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Numero de Serie:</label>
                                <input type="text" class="form-control" id="acserie" name="acserie">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Procesador:</label>
                                <input type="text" class="form-control" id="acprocesador" name="acprocesador">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Ram:</label>
                                <input type="text" class="form-control" id="acram" name="acram">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Familia</label>
                                <select name="acfamilia" id="acfamilia" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($familias as $familia) : ?>
                                        <option value="<?php echo $familia->idFamilia; ?>"><?php echo $familia->nombreFamilia ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Num. de Activo:</label>
                                <input type="text" class="form-control" id="acactivo" name="acactivo">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Año de Compra:</label>
                                <input type="text" class="form-control" id="anocompra" name="anocompra">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Estado del Dispositivos:</label>
                                <select name="acestado" id="acestado" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="USADO">USADO</option>
                                    <option value="NUEVA">NUEVA</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Color:</label>
                                <input type="text" class="form-control" id="accolor" name="accolor">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Bateria:</label>
                                <input type="text" class="form-control" id="acbateria" name="acbateria">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Cargador:</label>
                                <input type="text" class="form-control" id="accargador" name="accargador">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Usuarios</label>
                                <select name="acusuario" id="acusuario" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($usuarios as $usuario) : ?>
                                        <option value="<?php echo $usuario->idUsuario; ?>"><?php echo $usuario->usuNombre . " " . $usuario->usuPaterno ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Empresa</label>
                                <select name="acempresa" id="acempresa" class="form-control select2">
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($empresas as $empresa) : ?>
                                        <option value="<?php echo $empresa->idEmpresa; ?>"><?php echo $empresa->nombreEmpresa ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Ubicación:</label>
                                <input type="text" class="form-control" id="acubicacion" name="acubicacion">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Num. Factura:</label>
                                <input type="text" class="form-control" id="acfactura" name="acfactura">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Fecha de Compra:</label>
                                <input type="text" class="form-control datepicker" id="acfecha" name="acfecha" value="<?php echo date("d/m/Y"); ?>">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Precio de Compra:</label>
                                <input type="text" class="form-control" id="accompra" name="accompra">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Precio de Renta:</label>
                                <input type="text" class="form-control" id="acrenta" name="acrenta">
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Factura Fisico:</label>
                                <input type="file" class="form-control" id="acarchivo" name="acarchivo">
                            </div>

                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Estatus</label>
                                <select name="acestatus" id="acestatus" class="form-control">
                                    <option value="">Seleccione...</option>
                                    <option value="ASIGNADO">ASIGNADO</option>
                                    <option value="DISPONIBLE">DISPONIBLE</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <label>Observaciones:</label>
                                <textarea type="text" class="form-control" id="acobs" name="acobs"></textarea>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
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