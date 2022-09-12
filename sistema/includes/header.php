
<?php
        include '../sistema/scripts.php';
 ?>

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Search -->


<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
            aria-labelledby="searchDropdown">
            <form class="form-inline mr-auto w-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small"
                        placeholder="Search for..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </li>

    
 
    <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <h6 class="h6 mb-0 text-gray-800"><?php echo $_SESSION['nombres']?></h6> 
        </a>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <h6 class="h6 mb-0 text-gray-800"><?php echo $_SESSION['perfilesInCa']?></h6> 
            <div class="topbar-divider d-none d-sm-block"></div>
            <img class="img-profile rounded-circle" src="../media/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Perfil
            </a>
            <a class="dropdown-item" href="#">
                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                Configuraciones
            </a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
               Cerrar Sesión
            </a>
        </div>
    </li>

</ul>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Estas segura/o <?php echo $_SESSION['nombres']?> </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Los cambios que no guardes se perderán</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../config/logout.php">Salir</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="registrarVenta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona el Producto a Vender: </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <form method="POST" action="../crud_ventas/crear_venta">  
                        <div class="form-group" id="cont-titulo">
                                         
                                         <label for="productoAVender"> Producto a vender</label> 
                                         <div class="col-sm-12">
                                          <select name="productoAVender" style="width:100%;" class="form-control" id="productoAVender" onchange="habilitarSelect2(this)">
                                                 <option value="" hidden>Seleccione una opcion</option>
                                                 <?php $qsql = $con -> query( "SELECT ProId, tblproducto_NombreProducto FROM tblproducto") or die ("Fue imposible ejecutar la consulta");
                                                 foreach ($qsql as $row) { ?>

                                                 <option value="<?php echo $row['ProId']; ?>"><?php echo $row['tblproducto_NombreProducto']; ?></option>
                                                     
                                                 <?php } ?>    
                                             </select>
                                                     <script type="text/javascript"> // Script para funcion de buscar en el selector
                                                             $('select').select2();

                                                             $('#productoAVender').select2({/* Placeholder*/
                                                                 placeholder: "Buscar Producto",
                                                             });
                                                     </script>
                                     </div>
                                     <br>
                                            <button type="submit" class="btn btn-success" >Consultar</button>
                        </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

