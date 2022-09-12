
<?php
        include '../sistema/scripts.php';
 ?>

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
<div class="sidebar-brand-icon d-none d-md-inline">
            <i class="fas fa-bars fa-sm"></i>
    </div>
    <div class="sidebar-brand-text mx-3" href="../principal/principal.php"><img src='../media/img/ventas.png' width="50px" ></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="../principal/principal.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->

<div class="sidebar-heading">
    Interfaces
</div>
<li class="nav-item">
<a class="nav-link collapsed" href="../principal/principal.php" data-toggle="collapse-item" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages">
        <span class="icon-users"></span>
        <span>Inicio</span>
    </a>
   
</li>
<?php if ($_SESSION['perfilesInCa'] == 'Administrador') { ?>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-users"></i>
        <span>Gestión de Usuarios</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestionar Usuarios</h6>
            <a class="collapse-item" href="../crud_usuarios/crear_usuario.php"> <span class="icon-user-plus"></span> Crear Usuarios</a>
            <a class="collapse-item" href="../crud_usuarios/listado_usuarios.php"><span class="icon-users"></span>  Listado De Usuarios</a>
        </div>
    </div>
</li>
<?php } ?>
<?php if ($_SESSION['perfilesInCa'] == 'Administrador' || $_SESSION['perfilesInCa'] == 'Operativo' ) { ?>
  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Gestión de Inventario</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar Inventario</h6>
                        <a class="collapse-item" href="../crud_ventas/crear_producto.php"> Crear Producto</a> 
                        <a class="collapse-item" href="../crud_ventas/listado_productos.php"> Listado Productos</a>
                        <a class="collapse-item"  data-toggle="modal" data-target="#registrarVenta"> Crear Venta</a> 
                        <a class="collapse-item" href="../crud_ventas/listado_ventas.php"> Listado de Ventas</a>
                    </div>
                </div>
    </li>
<?php } ?>

<!-- Divisor-->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->

<!-- Sidebar Message -->

