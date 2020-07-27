
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Sala de Juntas
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
                        <a href="<?php echo base_url();?>salacitas/salacitasController/save" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Cita</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titulo</th>
                                    <th>Descripcion</th>
                                    <th>Color</th>
                                    <th>Fecha de Inicio</th>
                                    <th>Fecha de Final</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($salas)):?>
                                    <?php foreach($salas as $sala):?>
                                        <tr>
                                            <td><?php echo $sala->id;?></td>
                                            <td><?php echo $sala->titulo;?></td>
                                            <td><?php echo $sala->descripcion;?></td>
                                            <td><?php echo $sala->color;?></td>
                                            <td><?php echo $sala->fecha_inicio;?></td>
                                            <td><?php echo $sala->fecha_final;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>mantenimiento/categorias/edit/<?php echo $sala->id;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/categorias/delete/<?php echo $sala->id;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
                                                </div>
                                            </td>
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

