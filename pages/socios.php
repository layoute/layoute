<?php session_start(); ?>

<?php
if (isset($_SESSION['persona'])) {
    $lista = $_SESSION['persona'];
?>
<?php
    include ("../layout/links.php")
?>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <?php
            include ("../layout/navbar.php");
        ?>
        <div class="content-wrapper pt-3">
            <div class="content">
                <div class="container">
                    <nav class="navbar navbar-expand navbar-success navbar-dark rounded-top">
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-sm-inline-block active">
                                <a href="socios.php" class="nav-link">Socios</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="parientes.php" class="nav-link">Parientes</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="solicitudes.php" class="nav-link">Solicitudes</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="actividades.php" class="nav-link">Actividades</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="text-dark my-3" id="contenido-base">
                        <div class="row">
                            <div class="col">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Socios:</h5>
                                    En el registro de abajo se muestran todos los socios registrados.
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-2">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" id="buscar"
                                        placeholder="Type your keywords here">
                                    <div class="input-group-append">
                                        <button onclick="buscar_socio($('#buscar').val())"
                                            class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="roq">
                            <div class="col">
                                <a href="../php/excel.php" type="button" class="btn btn-outline-success btn-block my-3">
                                    Exportar socios
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%">
                                                        Código
                                                    </th>
                                                    <th style="width: 30%">
                                                        Socio
                                                    </th>
                                                    <th>
                                                        Celular
                                                    </th>
                                                    <th>
                                                        DNI
                                                    </th>
                                                    <th style="width: 8%" class="text-center">
                                                        Estado
                                                    </th>
                                                    <th style="width: 30%">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <?php
                                            include "../php/CrudSocios.php";
                                            $p = new CrudSocios();
                                            ?>
                                            <tbody id=bodyTable>
                                                <?php
                                                    $par_pagina = 5;
                                                    if (isset($_GET["pagina"])) {
                                                        $pagina = $_GET["pagina"];
                                                    } else $pagina = 1;

                                                    $empieza = ($pagina-1) * $par_pagina;
                                                    $listaP = $p->readPage($empieza, $par_pagina);

                                                    /* $listaS = $p->read(); */
                                                    while ($row = mysqli_fetch_object($listaP)) {
                                                        $id = $row->per_id;
                                                        $codigo = $row->per_codigo;
                                                        $nombres = $row->per_nombres;
                                                        $fecha = $row->per_fecha;
                                                        $celular = $row->per_celular;
                                                        $dni = $row->per_dni;
                                                ?>
                                                <tr id="<?php echo $id ?>">
                                                    <td>
                                                        <?php  echo $codigo ?>
                                                    </td>
                                                    <td>
                                                        <a>
                                                            <?php  echo $nombres ?>
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Creado: <?php  echo $fecha ?>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <?php  echo $celular ?>
                                                    </td>
                                                    <td>
                                                        <?php  echo $dni ?>
                                                    </td>
                                                    <td class="project-state">
                                                        <?php
                                                            $sociol = $p->encontrar_socio($id);
                                                            $estado = $sociol->soc_estado;
                                                            $estadoColor = "";
                                                            $estadog = "";
                                                            if ($estado == '1') {
                                                                $estadoColor = "success";
                                                                $estadog = "Activo";
                                                            } else {
                                                                $estadoColor = "danger";
                                                                $estadog = "Inactivo";
                                                            }
                                                        ?>
                                                        <span class="badge badge-<?php echo $estadoColor ?>">
                                                            <?php echo $estadog ?>
                                                        </span>
                                                    </td>
                                                    <td class="project-actions text-right" id="<?php echo $id ?>">
                                                        <a class="btn btn-primary btn-sm" href="javascript:;" onclick="
                                                            var fila = $(this).parent().attr('id');
                                                            $('#'+fila).on('click', function(){
                                                                var fila = $(this).attr('id');
                                                                console.log(fila);
                                                                verUsuario(fila);
                                                            });">
                                                            <i class="far fa-eye"></i>
                                                            Ver
                                                        </a>
                                                        <a href="../php/updateSocios.php?id=<?php echo $id;?>"
                                                            class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Editar
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="solicitudes.php">
                                                            <i class="fas fa-eye-slash"></i>
                                                            </i>
                                                            Desactivar
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <?php
                                        $pagina = $p->numRowsP();
                                        $totalP = ceil($pagina / $par_pagina);
                                        ?>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination d-flex justify-content-end my-3">
                                                <li class="page-item">
                                                    <a class="page-link" href="socios.php?pagina=1">Inicio</a>
                                                </li>
                                                <?php for ($i = 1; $i<=$totalP; $i++) {?>
                                                <li class="page-item">
                                                    <?php if ($i == $pagina) {
                                                        $ter = "active";
                                                    } ?>
                                                    <a class="page-link <?php echo $ter ?>"
                                                        href="socios.php?pagina=<?php echo $i ?>"><?php echo $i ?></a>
                                                </li>
                                                <?php }?>
                                                <li class="page-item">
                                                    <a class="page-link"
                                                        href="socios.php?pagina=<?php echo $totalP ?>">Ultima</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    include ("../layout/footerv2.php")
                ?>
            </div>
            <?php
            include ("../layout/footer.php")
        ?>
        </div>
        <?php
        include ("../layout/scripts.php");
    ?>
</body>

</html>
<?php
}
?>