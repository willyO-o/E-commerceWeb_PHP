<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../index.php" class="brand-link">
        <img src="img/store.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Tienda</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/admin.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="stock.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Stock
                            <span class="alerta-stock right badge "></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Productos
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="ver-productos.php" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Ver Productos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="agregar-producto.php" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Agregar Productos</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="crud-pedidos.php" class="nav-link">
                        <i class="nav-icon fas fa-boxes"></i>
                        <p>
                            pedidos

                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="crud-ventas.php" class="nav-link">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>
                            Ventas

                        </p>
                    </a>
                </li>



                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Usuarios
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="ver-usuarios.php" class="nav-link">
                                <i class="fas fa-list nav-icon"></i>
                                <p>Ver Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="agregar-usuario.php" class="nav-link">
                                <i class="fas fa-plus-circle nav-icon"></i>
                                <p>Agregar Usuarios</p>
                            </a>
                        </li>

                    </ul>
                </li>



                <li class="nav-item has-treeview">
                    <a href="crud-clientes.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Clientes

                        </p>
                    </a>
                </li>



                <li class="nav-item has-treeview">
                    <a href="crud-categorias.php" class="nav-link">
                        <i class="nav-icon fas fa-asterisk"></i>
                        <p>
                            Categorias

                        </p>
                    </a>
                </li>



                <li class="nav-item has-treeview">
                    <a href="crud-marcas.php" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Marcas

                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="contacto.php" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contacto
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">