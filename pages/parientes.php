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
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="socios.php" class="nav-link">Socios</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block active">
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
                    <div class="text-dark my-3">
                        <div class="row">
                            <div class="col">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Tus parientes:</h5>
                                    En el registro de abajo se muestran tus parientes registrados, recuenda si no tienes
                                    ninguno no se mostrarán, ¡Registralos ahora!.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-outline-success btn-block my-3"><i
                                        class="fas fa-plus-circle"></i> Agregar
                                    pariente
                                </button>
                                <button type="button" class="btn btn-outline-info btn-block my-3"><i
                                        class="fas fa-search"></i> Buscar pariente
                                </button>
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                                title="Collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove"
                                                title="Remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr class="">
                                                    <th style="width: 5%">
                                                        Código
                                                    </th>
                                                    <th style="width: 30%">
                                                        Socio
                                                    </th>
                                                    <th>
                                                        Nombres
                                                    </th>
                                                    <th style="width: 8%" class="text-center">
                                                        Estado
                                                    </th>
                                                    <th style="width: 30%">
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            include "../php/CrudParientes.php";
                                            $p = new CrudParientes();
                                            ?>
                                            <tbody id=bodyTable>
                                                <?php
                                                    $par_pagina = 5;
                                                    if (isset($_GET["pagina"])) {
                                                        $pagina = $_GET["pagina"];
                                                    } else $pagina = 1;

                                                    $empieza = ($pagina-1) * $par_pagina;
                                                    $listaP = $p->readPage($empieza, $par_pagina, $lista->per_id);
                                                    /* $listaS = $p->read(); */
                                                    while ($row = mysqli_fetch_object($listaP)) {

                                                        $perS = $p->encontrar_persona($row->pa_per_id);
                                                        $id = $row->pa_id;
                                                        $pariente = $row->pa_pariente;
                                                        $fecha = $row->pa_fecha;
                                                ?>
                                                <tr id="<?php echo $id ?>">
                                                    <td>
                                                        <?php  echo $id ?>
                                                    </td>
                                                    <td>
                                                        <a>
                                                            <?php  echo $pariente ?>
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Creado: <?php  echo $fecha ?>
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <?php  echo $perS->per_nombres ?>
                                                    </td>
                                                    <td class="project-state">
                                                        <?php
                                                            $estado = $row->pa_estado;
                                                            if ($estado == '1') {
                                                                $estadoColor = "success";
                                                                $estadog = "Bien";
                                                            } else if ($estado == '2') {
                                                                $estadoColor = "danger";
                                                                $estadog = "Regular";
                                                            } else if ($estado == '3') {
                                                                $estadoColor = "danger";
                                                                $estadog = "Mal";
                                                            } else {
                                                                $estadog = "";
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
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination d-flex justify-content-end my-3">
                                                <li class="page-item">
                                                    <a class="page-link">Anterior</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link " href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Siguiente</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Parientes:</h5>
                                    En el registro de abajo se muestran todos los parientes registrados.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr class="">
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
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        <a>
                                                            Saul David Ytucayasi Savina
                                                        </a>
                                                        <br />
                                                        <small>
                                                            Creado: 25/07/2021
                                                        </small>
                                                    </td>
                                                    <td>
                                                        921493575
                                                    </td>
                                                    <td>
                                                        23112452
                                                    </td>
                                                    <td class="project-state">
                                                        <span class="badge badge-success">Activo</span>
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="#">
                                                            <i class="far fa-eye"></i>
                                                            Ver
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Editar
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination d-flex justify-content-end my-3">
                                                <li class="page-item">
                                                    <a class="page-link">Anterior</a>
                                                </li>
                                                <li class="page-item active"><a class="page-link " href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#">Siguiente</a>
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