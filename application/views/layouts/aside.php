        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url() ?>assets/usuarios/imagenes/<?php echo $this->session->userdata("imagen") ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata("usuario") ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MENU DE NAVEGACION</li>
                    <li>
                        <a href="<?php echo base_url(); ?>dashboard">
                            <i class="fa fa-home"></i> <span>Inicio</span>
                        </a>
                    </li>
                    <?php if ($this->session->userdata("tarea") == 1) : ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-tasks"></i> <span>Tareas</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>tareas/tareas"><i class="fa fa-circle-o"></i> Asignar Tarea</a></li>
                                <li><a href="<?php echo base_url(); ?>tareas/tareas"><i class="fa fa-circle-o"></i> Tareas Admin</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("bitacora") == 1) : ?>

                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-eye"></i> <span>Bitacora</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <!--||-->
                                <?php if ($this->session->userdata("idPerfil") == 1 or $this->session->userdata("idArea") == 4) : ?>
                                    <li><a href="<?php echo base_url(); ?>BitacoraController"><i class="fa fa-circle-o"></i> Crear Bitacora</a></li>
                                    <li><a href="<?php echo base_url(); ?>BitacoraController/autorizacion"><i class="fa fa-circle-o"></i> Autorizar Bitacora</a></li>
                                <?php else : ?>
                                    <li><a href="<?php echo base_url(); ?>BitacoraController"><i class="fa fa-circle-o"></i> Crear Bitacora</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("pagina") == 1) : ?>
                        <li>
                            <a href="">
                                <i class="fa fa-file"></i> <span>Pagina</span>
                            </a>
                        </li>
					<?php endif; ?>
					<?php if ($this->session->userdata("mantenimiento") == 1) : ?>
						<li><a href="<?php echo base_url(); ?>tickets/MantenimientoController"><i class="fa fa-circle-o"></i> Mantenimiento</a></li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("soporte") == 1) : ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-wrench"></i> <span>Soporte</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>tickets/TicketsController"><i class="fa fa-circle-o"></i> Tickets</a></li>
                             </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("calendario") == 1) : ?>
                        <li>
                            <a href="">
                                <i class="fa fa-calendar"></i> <span>Calendario</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("RH") == 1) : ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-balance-scale"></i> <span>Recursos Humanos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>rh/fichalaboral"><i class="fa fa-circle-o"></i> Ficha Laboral</a></li>
                                <li><a href="<?php echo base_url(); ?>salacitas/SalacitasController/listar"><i class="fa fa-circle-o"></i> #</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("sala") == 1) : ?>
                        <li>
                            <a href="<?php echo base_url(); ?>salacitas/SalacitasController"><i class="fa fa-address-book"></i> Sala de Juntas</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("mobiliario") == 1) : ?>
                        <li>
                            <a href="<?php echo base_url(); ?>mobiliarios/mobiliariosController">
                                <i class="fa fa-archive"></i> <span>Mobiliarios</span>
                            </a>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("activo") == 1) : ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i> <span>Activos</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if ($this->session->userdata("idPerfil") == 1 || $this->session->userdata("idArea") == 1) : ?>
                                    <li><a href="<?php echo base_url(); ?>activos/activos"><i class="fa fa-circle-o"></i> Activos</a></li>
                                    <li><a href="<?php echo base_url(); ?>activos/ConsumibleController"><i class="fa fa-circle-o"></i> Consumibles</a></li>
                                    <li><a href="<?php echo base_url(); ?>activos/activos/addmantenimiento"><i class="fa fa-circle-o"></i> Plan de Manteniento</a></li>
                                    <li><a href="<?php echo base_url(); ?>activos/activos/disponibles"><i class="fa fa-circle-o"></i> Disponibles</a></li>
                                 <?php else : ?>
                                    <li><a href="<?php echo base_url(); ?>activos/activos"><i class="fa fa-circle-o"></i> Ver Activos</a></li>
                                    <li><a href="<?php echo base_url(); ?>activos/activos/generarpdf"><i class="fa fa-circle-o"></i> Consumibles</a></li>
                                    <li><a href="<?php echo base_url(); ?>activos/activos/disponibles"><i class="fa fa-circle-o"></i> Disponibles</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata("administrador") == 1) : ?>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-user-circle-o"></i> <span>Administrador</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="<?php echo base_url(); ?>usuarios/usuarios"><i class="fa fa-circle-o"></i> Ver Usuarios</a></li>
                                <li><a href="<?php echo base_url(); ?>mantenimiento/clientes"><i class="fa fa-circle-o"></i> Ver Graficas</a></li>

                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->
