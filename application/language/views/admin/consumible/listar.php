
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Consumibles
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
                        <a href="<?php echo base_url();?>activos/consumibleController/create" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Consumibles</a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Fecha de Compra</th>
                                    <th>Costo</th>
                                    <th>Stock</th>
                                    <th>Codigo de Barra</th>
                                    <th>Factura</th>
                                    <th>opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i=1;?>
                                <?php if(!empty($consumibles)):?>
                                    <?php foreach($consumibles as $consumible):?>
                                        <tr>
                                            <td><?php $i++;?></td>
                                            <td><?php echo $consumible->nombre;?></td>
                                            <td><?php echo $consumible->descripcion;?></td>
                                            <td><?php echo $consumible->marca;?></td>
                                            <td><?php echo $consumible->modelo;?></td>
                                            <td><?php echo $consumible->fecha_compra;?></td>
                                            <td><?php echo $consumible->costo;?></td>
                                            <td><?php echo $consumible->stock;?></td>
                                            <td><?php echo $consumible->codigo_barra;?></td>
                                            <td><?php echo $consumible->factura;?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url()?>activos/consumibleController/edit/<?php echo $consumible->idconsumible;?>" class="btn btn-warning"><span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>activos/consumibleController/delete/<?php echo $consumible->idconsumible;?>" class="btn btn-danger btn-remove"><span class="fa fa-remove"></span></a>
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
