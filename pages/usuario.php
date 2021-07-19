<?php

include "../php/login/Validacion.php";

session_start();

if (isset($_POST['cerrar'])) {
    unset($_SESSION['persona']);
    header('Location: index.php');
}
?>

<?php
if (isset($_SESSION['persona'])) {
    $lista = $_SESSION['persona'];
?>

<?php
    include ("../layout/links.php")
?>

<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">

    <?php
        /* $pagina = isset($_GET["p"]) ? strtolower($_GET["p"]): "hogar"; */
    ?>

    <div class="wrapper">
        <?php
            include ("../layout/navbar.php");
        ?>
        <div class="content-wrapper pt-3">
            <div class="content">
                <div class="container">
                    <div class="row text-dark">
                        <div class="col">
                            <div class="callout callout-info">
                                <h5><i class="fas fa-info"></i> Nota:</h5>
                                Recuerda que la información debe de ser personal, no comparta su información con nadie
                                más.
                            </div>
                            <div class="row">
                                <div class="col-md-4 my-3">
                                    <a href="../php/updateSocios.php?id=<?php echo $lista->per_id;?>" type="button" class="btn btn-primary btn-block"><i class="fas fa-edit"></i>
                                        Editar
                                        información</a>
                                </div>
                                <div class="col-md-4 my-3">
                                    <form action="" method="POST">
                                        <button type="submit" name="cerrar" class="btn btn-info btn-block"><i
                                                class="fas fa-file-export"></i> Cerrar Sesión </button>
                                        </from>
                                </div>
                                <div class="col-md-4 my-3">
                                    <a href="solicitudes.php" type="button" class="btn btn-danger btn-block"><i
                                            class="fas fa-eye-slash"></i> Desactivar
                                        usuario</a>
                                </div>
                            </div>
                            <div class="invoice p-3 mb-3">
                                <?php
            $lista = $_SESSION['persona'];
        ?>
                                <div class="row">
                                    <div class="col-12">
                                        <h4>
                                            <i class="far fa-user"></i> <?php echo $lista->per_nombres ?>
                                            <small
                                                class="float-right"><?php $fechaActual = date('d-m-Y H:i:s'); echo $fechaActual ?></small>
                                        </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <strong>Datos</strong> <br> Nombres y Apellidos:
                                            <?php echo $lista->per_nombres ?> <?php echo $lista->per_apellidos ?>
                                            <br>
                                            Edad: <?php
                            $val = new Validacion();
                            $edad = $val->calculaedad($lista->per_fecha_nac);
                            echo $edad;
                            ?><br>
                                            Dirección: <?php echo $lista->per_dir?><br>
                                            DNI: <?php echo $lista->per_dni ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <address>
                                            <strong>Socio</strong><br>
                                            Estado: -<br>
                                            Rango: <?php
                        $rangoRow = $lista->per_rango;

                        if ($rangoRow == 1) {
                            echo $rangoRow = "Administrador";
                        } else {
                            echo $rangoRow = "Socio";
                        }
                        ?> <br>
                                            Celular: <?php echo $lista->per_celular ?><br>
                                            Email: <?php echo $lista->per_correo ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Código: <?php echo $lista->per_codigo ?></b><br>
                                        <b>ID orden:</b> <?php echo $lista->per_id ?><br>
                                        <b>fecha de creación:</b> <?php echo $lista->per_fecha ?><br>
                                    </div>
                                    <!-- /.col -->
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
} else {
    header('Location: ../index.php');
}
?>