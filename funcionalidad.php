<?php
include './service/funcionalidadService.php';
$NOMBRE = "";
$URL_PRINCIPAL = "";
$DESCRIPCION = "";
$accion = "Agregar";
$accionm = "Modificar";

if (isset($_POST["accion"]) && ($_POST["accion"] == "Agregar")) {
    insert($_POST["NOMBRE"], $_POST["URL_PRICIPAL"], $_POST["DESCRIPCION"]);
} else if (isset($_POST["accion"]) && ($_POST["accion"] == "Modificar")) {
    update($_POST["NOMBRE"], $_POST["URL_PRINCIPAL"], $_POST["DESCRIPCION"]);
} else if (isset($_GET["update"])) {
    $FUNCIONALIDAD = findByPK($_GET["update"]);
    if ($FUNCIONALIDAD != null) {
        $NOMBRE = $FUNCIONALIDAD["NOMBRE"];
        $URL_PRINCIPAL = $FUNCIONALIDAD["URL_PRINCIPAL"];
        $DESCRIPCION = $FUNCIONALIDAD["DESCRIPCION"];       
        $accion = "Modificar";
    }
} else if (isset($_POST["elimFuncionalidad"])) {
    delete($_POST["elimFuncionalidad"]);
}
?>



<!DOCTYPE html>
<html lang="sp">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Gestion</title>



    <link href=".css/simplebar.css" rel="stylesheet" />
    <link href="./css/bootstrap.min.css" rel="stylesheet" />

    <link href="./css/icons.css" rel="stylesheet" type="text/css" />

    <link href="./css/sidebar-menu.css" rel="stylesheet" />

    <link href="./css/app-style.css" rel="stylesheet" />

</head>

<body class="bg-theme1">
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <div id="wrapper">
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo ">
                <a href="index.html">
                   
                    <h5 class="logo-text">Gestion Modulos</h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol ">
                <li class="sidebar-header">Menu Gestiones</li>
                <li>
                    <a href="./index.php">
                        <i class="zmdi zmdi-grid"></i> <span>Modulos</span>
                    </a>
                </li>
                <li>
                <a href="./funcionalidad.php">
                        <i class="zmdi zmdi-grid"></i> <span>Funcionalidad</span>
                    </a>
                </li>
            </ul>
        </div>
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top">
            </nav>
        </header>
        <div class="clearfix"></div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <form id="forma" name="forma" method="post" action="index.php">
                                    <h5 class="card-title">Funcionalidades</h5>
                                    <div class="table-responsive">
                                        <table>
                                            <tr>
                                                <td scope="col" style="width: 1010px;">&nbsp;</td>
                                               
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="text-align: center;">Nombre</th>
                                                    <th scope="col" style="text-align: center;">Url Principal </th>
                                                    <th scope="col" style="text-align: center;">Descripcion</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $result = findAll();
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <th scope="col" style="text-align: center;"><a href="funcionalidad.php?update=<?php echo $row["NOMBRE"]; ?>"><?php echo $row["NOMBRE"]; ?></a></th>
                                                            <!-- <th scope="col" style="text-align: center;"><?php echo $row["NOMBRE"]; ?></th> -->
                                                            <th scope="col" style="text-align: center;"><?php echo $row["URL_PRINCIPAL"]; ?></th>
                                                            <th scope="col" style="text-align: center;"><?php echo $row["DESCRIPCION"]; ?></th>
                                                          
                                                        </tr>
                                                    <?php
                                                    }
                                                } else {
                                                    ?>
                                                    <tr>
                                                        <th scope="col">No hay Funcionalidades Registradas</th>
                                                    </tr>
                                                <?php  } ?>
                                            </tbody>
                                            
                                        </td>
                                        </tr>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row mt-3">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="COD_MODULO" value="<?php echo $COD_MODULO; ?>" />
                                                                   
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <td><label id="lblnombre" for="nombre">Nombre:</label></td>
                                            <td><input type="text" name="NOMBRE" value="<?php echo $NOMBRE; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><label id="lblestado">Url:</label></td>
                                            <td><input type="text" name="URL_PRINCIPAL" value="<?php echo $URL_PRINCIPAL; ?>" /></td>
                                        </tr>
                                        <tr>
                                            <td><label id="lblestado">Descripcion:</label></td>
                                            <td><input type="text" name="DESCRIPCION" value="<?php echo $DESCRIPCION; ?>" /></td>
                                        </tr>
                    
                                        <tr>
                                            <td><input type="submit" class=" btn btn-light btn-round px-5 " name="accion" value="<?php echo $accion; ?>" /></td>
                                            <td><input type="submit" class=" btn btn-light btn-round px-5 " name="accion" value="<?php echo $accionm; ?>" /></td>
                                        <td><input type="button" name="eliminar" class=" btn btn-light btn-round px-4 " value="Eliminar" onclick="eliminarFuncionalidad();"></td>
                                        </tr>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   <footer class="footer">
        <div class="container">
            <div class="text-center">
                ESPE
            </div>
        </div>
    </footer> -->
</body>
<script>
    function eliminarFuncionalidad() {
        document.getElementById('forma').submit();
    }
</script>

</html>