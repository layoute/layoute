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
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="parientes.php" class="nav-link">Parientes</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block ">
                                <a href="solicitudes.php" class="nav-link">Solicitudes</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block active">
                                <a href="actividades.php" class="nav-link">Actividades</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="text-dark my-3">
                        <div class="row">
                            <div class="col">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info"></i> Actividad:</h5>
                                    Al crear una actividad recuerde primero buscar la actividad, talvez ya se haya
                                    creado anteriormente.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="button" class="btn btn-outline-success btn-block my-3"><i
                                        class="fas fa-file-medical"></i> Agregar
                                    actividad
                                </button>
                                <button type="button" class="btn btn-outline-info btn-block my-3"><i
                                        class="fas fa-search"></i> Buscar actividad
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
                                                    <th style="width: 20%">
                                                        Actividad
                                                    </th>
                                                    <th>
                                                        Estado
                                                    </th>
                                                    <th>
                                                        Apoyo
                                                    </th>
                                                    <th style="width: 28%" class="text-center">
                                                        Descripción
                                                    </th>
                                                    <th style="width: 20%">
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
                                                            Arar la chacra
                                                        </a>
                                                        <br />
                                                        <small>
                                                            fecha inicio: 25/07/2021
                                                        </small> <br>
                                                        <small>
                                                            fecha fin: 25/07/2021
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success">Activo</span>
                                                    </td>
                                                    <td>
                                                        Sí
                                                    </td>
                                                    <td class="project-state">
                                                        Vamos a harar la chacra de mi amigo Juan necesitamos ayuda,
                                                        dependiendo si tienen tiempo es en la calle Puno
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Editar
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash"></i>
                                                            Eliminar
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
                                <div class="row">
                                    <div class="col">
                                        <div class="callout callout-info">
                                            <h5><i class="fas fa-info"></i> Actividades de los socios:</h5>
                                            En la siguiente tabla se muestra todas las actividades de los socios.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr class="">
                                                    <th style="width: 5%">
                                                        Código
                                                    </th>
                                                    <th style="width: 20%">
                                                        Actividad
                                                    </th>
                                                    <th>
                                                        Estado
                                                    </th>
                                                    <th>
                                                        Apoyo
                                                    </th>
                                                    <th style="width: 28%" class="text-center">
                                                        Descripción
                                                    </th>
                                                    <th style="width: 20%">
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
                                                            Arar la chacra
                                                        </a>
                                                        <br />
                                                        <small>
                                                            fecha inicio: 25/07/2021
                                                        </small> <br>
                                                        <small>
                                                            fecha fin: 25/07/2021
                                                        </small>
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-success">Activo</span>
                                                    </td>
                                                    <td>
                                                        Sí
                                                    </td>
                                                    <td class="project-state">
                                                        Vamos a harar la chacra de mi amigo Juan necesitamos ayuda,
                                                        dependiendo si tienen tiempo es en la calle Puno
                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-info btn-sm" href="#">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Editar
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="#">
                                                            <i class="fas fa-trash"></i>
                                                            Eliminar
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