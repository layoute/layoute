<?php session_start(); ?>

<?php
if (isset($_SESSION['persona'])) {
    $lista = $_SESSION['persona'];

    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
    } else {
        header('Location: listEstudiantes.php');
    }
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
                                <a href="../pages/socios.php" class="nav-link">Socios</a>
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
                                    Recuerda que tamién puedes actualizar tu estado.
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?php
                                include "../php/CrudSocios.php";
                                $socioE = new CrudSocios();
                                if (isset($_POST['enviarT'])) {
                                    $nombres = $_POST['nombres'];
                                    $ape = $_POST['apellidos'];
                                    $dni = $_POST['dni'];
                                    $celular = $_POST['celular'];
                                    $genero = $_POST['genero'];
                                    $dir = $_POST['dir'];
                                    $correo = $_POST['correo'];
                                    $pass = $_POST['pass'];
                                    $nac = $_POST['nac'];

                                    if ($genero == 'Masculino') {
                                        $genero = '1';
                                    } else if ($genero == 'Femenino') {
                                        $genero = '2';
                                     } else {
                                        $genero = '0';
                                    }
                                    $res = $socioE->updateP(
                                        $nombres,
                                        $ape,
                                        $dni,
                                        $celular,
                                        $genero,
                                        $dir,
                                        $correo,
                                        $pass,
                                        $nac,
                                        $id
                                    );
                                    if ($res) {
                                        
                                    } else {
                                        
                                    }
                                }
                                ?>
                                <?php
                                    $datos_socio = $socioE->single_record($id);
                                 ?>
                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="row">
                                                <div class="col">
                                                    <label>Ingresar sus nombres:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" required value="<?php echo $datos_socio->per_nombres ?>" name="nombres" class="form-control" placeholder="Nombres">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Ingresar sus apellidos:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" required value="<?php echo $datos_socio->per_apellidos ?>" name="apellidos" type="text" class="form-control"
                                                            placeholder="Apellidos">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Ingresar el DNI:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" required value="<?php echo $datos_socio->per_dni ?>" name="dni" type="text" class="form-control"
                                                            placeholder="DNI">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Ingresa su celular:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" required value="<?php echo $datos_socio->per_celular ?>" name="celular" type="text" class="form-control"
                                                            placeholder="Celular">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Ingrese su genero:</label>
                                                    <div class="input-group mb-3">
                                                        <select  name="genero" class="form-control select2">
                                                            <option selected="selected" disabled="disabled">Ingrese su
                                                                genero</option>
                                                                <?php
                                                                    $e = $datos_socio->per_genero;
                                                                    if ($e === "1") {
                                                                        $e = "Masculino";
                                                                    } else if ($e === "2") {
                                                                        $e = "Femenino";
                                                                    } else {
                                                                        $e = "";
                                                                    }
                                                                ?>
                                                            <option value="Masculino" <?php if ($e === "Masculino") echo "selected"?>>Masculino</option>
                                                            <option value="Femenino" <?php if ($e === "Femenino") echo "selected"?>>Femenino</option>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user-friends"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Ingrese su dirección:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="text" required value="<?php echo $datos_socio->per_dir ?>" name="dir" type="text" class="form-control"
                                                            placeholder="Dirección">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label>Ingrese su correo:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="email" required value="<?php echo $datos_socio->per_correo ?>" name="correo" type="text" class="form-control"
                                                            placeholder="Correo">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label>Ingrese su contraseña:</label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" required value="<?php echo $datos_socio->per_pass?>" name="pass" type="text" class="form-control"
                                                            placeholder="Contraseña">
                                                        <div class="input-group-append">
                                                            <div class="input-group-text">
                                                                <span class="fas fa-user"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <label>Ingrese su fecha de nacimiento:</label>
                                            <div class="input-group mb-3">
                                                <input required value="<?php echo $datos_socio->per_fecha_nac?>" name="nac" type="date" class="form-control" placeholder="Fecha de nacimiento">
                                                <div class="input-group-append">
                                                    <div class="input-group-text">
                                                        <span class="fas fa-user"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" name="enviarT"
                                                class="text-center btn btn-success btn-block">
                                                Actualizar
                                            </button>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col">
                                            <a type="submit"  href="../pages/socios.php"
                                                class="text-center btn btn-warning btn-block text-light">
                                                Regresar
                                            </a>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                </form>
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