<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Bitacora
        <small>Listado</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <a href="<?php echo base_url();?>BitacoraController/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Bitacora</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Motivo</th>
                                    <th>Hora de Entrada</th>
                                    <th>Hora de Salida</th>
                                    <th>Autorizacion RH</th>
                                    <th>Autorizacion Jefe</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                                <?php if(!empty($bitacoras)):?>
                                    <?php foreach($bitacoras as $bitacora):?>
                                    <?php 
                                    if ($bitacora->autRH==0) {
                                        $rh="Pendiente";
                                        $rhc="label bg-blue";
                                    }
                                    elseif ($bitacora->autRH==1) {
                                        $rh="Autorizado";
                                        $rhc="label bg-green";
                                    }
                                    else {
                                        $rh="Rechazado";
                                        $rhc="label bg-red";
                                    }

                                    if ($bitacora->autJF==0) {
                                        $jf="Pendiente";
                                        $jfc="label bg-blue";
                                    }
                                    elseif ($bitacora->autJF==1) {
                                        $jf="Autorizado";
                                        $jfc="label bg-green";
                                    }
                                    else {
                                        $jf="Rechazado";
                                        $jfc="label bg-orange";
                                    }
                                    
                                    ?>
                                        <tr>
                                            <td><?php echo $i++;?></td>
                                            <td><?php echo $bitacora->bitFecha;?></td>
                                            <td><?php echo $bitacora->bitObservaciones;?></td>
                                            <td><?php echo $bitacora->bitSalida;?></td>
                                            <td><?php echo $bitacora->bitSalida;?></td>
                                            <td><span class="<?php echo $rhc;?>"><?php echo $rh;?></span></td>
                                            <td><span class="<?php echo $jfc;?>"><?php echo $jf;?></span></td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </tbody>
                        </table>
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
