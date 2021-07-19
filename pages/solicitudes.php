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
                <div class="container" id=>
                    <nav class="navbar navbar-expand navbar-success navbar-dark rounded-top">
                        <ul class="navbar-nav">
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="socios.php" class="nav-link">Socios</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block">
                                <a href="parientes.php" class="nav-link">Parientes</a>
                            </li>
                            <li class="nav-item d-none d-sm-inline-block active">
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
                                    <h5><i class="fas fa-info"></i> Verifique al socio:</h5>
                                    Antes de crear a un socio verifique si este ya se registró anteriormente
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                                include "../php/CrudSocios.php";
                                $s = new CrudSocios();
                                $listaS = $s->countPersona();
                                $socioId = $s->encontrar_socio($lista->per_id);
                            ?>
                            <?php
                                $men = "";
                                include "../php/CrudSolicitud.php";
                                $soli = new CrudSolicitud();
                                if (isset($_POST['enviar'])) {
                                    if (isset($_POST['tc']) && $_POST['tc'] == '1'){
                                        if ($_POST['titulo'] != "" && $_POST['desc'] != "") {
                                            $titulo = $_POST['titulo'];
                                            $desc = $_POST['desc'];
                                            $fecha = date('Y-m-d');
                                            $estado = '1';
                                            $tipo = $_POST['tipo'];
                                            $res = $soli->create(
                                                $titulo,
                                                $desc,
                                                $tipo,
                                                $fecha,
                                                $estado,
                                                $socioId->soc_id
                                            );
                                            if ($res) {
                                            } else {
                                                $men = "<div class='alert alert-danger alert-dismissible'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                                <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                                No se pudo crear la solicitud, intentelo nuevamente!.
                                                </div>";
                                            }
                                        } else {
                                            $men = "<div class='alert alert-danger alert-dismissible'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                                <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                                No ingresó datos en el titulo o descripción.
                                                </div>";
                                        }
                                    } else{
                                        $men = "<div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                        <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                        Acepte los terminos y condiciones antes de continuar
                                        </div>";
                                    }
                                } else {
                                    $men = "";
                                }
                            ?>
                            <div class="col">
                                <?php echo $men ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-6">
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h6>Socios: <?php foreach ($listaS as $value)
                                            {
                                                echo $value;
                                            }
                                            ?></h6>
                                        <h2 class="display-5">Crear socio</h2>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-plus"></i>
                                    </div>
                                    <a type="button" class="small-box-footer" data-bs-toggle="modal"
                                        href="#exampleModal">
                                        <i class="fas fa-arrow-circle-right"></i>
                                        Siguiente
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade text-dark" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Crear solicitud
                                                        </h5>
                                                        <button type="button" class=" btn btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times fa-lg text-success"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Ingrese
                                                                el titulo:</label>
                                                            <input name="titulo" type="text" class="form-control"
                                                                id="recipient-name" placeholder="titulo">
                                                            <input name="tipo" type="hidden" class="form-control"
                                                                value="1" placeholder="tipo">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Ingrese una
                                                                pequeña descripción: </label>
                                                            <textarea name="desc" class="form-control" id="message-text"
                                                                placeholder="descripción"></textarea>
                                                        </div>
                                                        <div class="form-group clearfix mb-3">
                                                            <div class="icheck-success d-inline">
                                                                <input name="tc" type="checkbox" id="checkboxDanger2"
                                                                    value="1">
                                                                <label for="checkboxDanger2">
                                                                    Aceptar <span class="text-success">terminos y
                                                                        condiciones</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-success"
                                                            name="enviar">Crear</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php
                                $listaS = $s->countPersona();
                                $socioId = $s->encontrar_socio($lista->per_id);
                                
                            ?>
                            <?php
                                $men = "";
                                $soli = new CrudSolicitud();
                                if (isset($_POST['enviar3'])) {
                                    if ($_POST['titulo'] != "" && $_POST['desc'] != "" && $_POST['dni']) {
                                        $dni = $_POST['dni'];
                                        
                                        $personaDni = $s->dniPersona($dni);
                                        if ($personaDni ==! null) {
                                            $dniP = $personaDni->per_dni;
                                            $socioli = $s->encontrar_socio($personaDni->per_id);
                                            $resTo = $s->socioDescU($socioli->soc_id);
                                            if ($resTo) {
                                                $estado = $socioli->soc_estado;
                                                if ($dni == $dniP) {
                                                    $titulo = $_POST['titulo'];
                                                    $desc = $_POST['desc'];
                                                    $fecha = date('Y-m-d');
                                                    $estado = '1';
                                                    $tipo = $_POST['tipo'];
                                                    $res = $soli->create(
                                                        $titulo,
                                                        $desc,
                                                        $tipo,
                                                        $fecha,
                                                        $estado,
                                                        $socioId->soc_id
                                                    );
                                                    if ($res) {
                                                    } else {
                                                        $men = "<div class='alert alert-danger alert-dismissible'>
                                                        <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                                        <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                                        No se pudo crear la solicitud, intentelo nuevamente!.
                                                        </div>";
                                                    }
                                                }
                                            } else {
                                                $men = "<div class='alert alert-danger alert-dismissible'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                                <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                                No se pudo crear la solicitud, algo sucedió con el id del socio!.
                                                </div>";
                                            }
                                        } else {
                                            $men = "<div class='alert alert-danger alert-dismissible'>
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                                <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                                Ingrese bien el DNI de la persona
                                                </div>";
                                        }
                                    } else {
                                        $men = "<div class='alert alert-danger alert-dismissible'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden'true'>×</button>
                                            <h5><i class='icon fas fa-ban'></i> Error!</h5>
                                            No ingresó datos en el titulo, descripción o DNI.
                                            </div>";
                                    }
                                } else {
                                    $men = "";
                                }
                            ?>
                            <div class="col">
                                <?php echo $men ?>
                            </div>
                        </div>
                        <div class="row">
                            <input type="hidden" value="2">
                            <div class="col-lg-12 col-6">
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <?php $estadoSocio = $s->estadoPersona(); ?>
                                        <h6>Socios desactivados: <?php foreach ($estadoSocio as $value)
                                            {
                                                echo $value;
                                            }
                                            ?></h6>
                                        <h2 class="display-5">Desactivar socio</h2>
                                    </div>
                                    <div class="icon">
                                        <i class="far fa-eye-slash"></i>
                                    </div>
                                    <a type="button" class="small-box-footer" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal2">
                                        <i class="fas fa-arrow-circle-right"></i>
                                        Siguiente
                                    </a>
                                    <!-- Modal -->
                                    <div class="modal fade text-dark" id="exampleModal2" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="post">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Crear solicitud
                                                        </h5>
                                                        <button type="button" class=" btn btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close">
                                                            <i class="fas fa-times fa-lg text-danger"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">Ingrese
                                                                el titulo:</label>
                                                            <input name="titulo" type="text" class="form-control"
                                                                placeholder="titulo">
                                                            <input name="tipo" type="hidden" class="form-control"
                                                                value="2" placeholder="tipo">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Ingrese una
                                                                pequeña descripción: </label>
                                                            <textarea name="desc" class="form-control"
                                                                placeholder="descripción"></textarea><!-- 1232422 -->
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="message-text" class="col-form-label">Ingrese el DNI de la persona a desactivar: </label>
                                                            <input name="dni" class="form-control"
                                                                placeholder="dni">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-success"
                                                            name="enviar3">Crear</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        <?php
                                                                if (isset($_POST['enviar2'])) {
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
                                                                    $fecha = date('Y-m-d');
                                                                    $codigo = $soli->generate_string();

                                                                    $res = $s->createP(
                                                                        $nombres,
                                                                        $ape,
                                                                        $dni,
                                                                        $celular,
                                                                        $genero,
                                                                        $dir,
                                                                        $correo,
                                                                        $pass,
                                                                        2,
                                                                        $codigo,
                                                                        $nac,
                                                                        $fecha
                                                                    );
                                                                    $resultP = $s->getPersona();
                                                                    $res2 = $s->createS(1, $resultP->per_id);
                                                                    if ($res) {
                                                                        
                                                                    } else {
                                                                    }
                                                                } else {
                                                                    
                                                                }
                                                            ?>
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-text-width"></i>
                                            Mis solicitudes
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <?php
                                            $lista = $_SESSION['persona'];
                                            $listaSolicitud = $soli->single_record($lista->per_id);
                                            $idSo = "";
                                            while ($row = mysqli_fetch_object($listaSolicitud)) {
                                                $idSo = $row->sol_id;
                                                $titulo = $row->sol_titulo;
                                                $desc = $row->sol_desc;
                                                $tipo = $row->sol_tipo;
                                                $idSocio = $row->sol_soc_id;
                                                $colorA = "";
                                                $socioM = "";
                                            ?>
                                        <dl class="row">
                                            <dt class="col-sm-4"><?php echo $titulo ?></dt>
                                            <dd class="col-sm-4"><?php echo $desc ?>
                                            </dd>
                                            <?php if ($tipo == '1') {
                                                    $colorA = "success";
                                                    $tipo = "Crear Socio";
                                                    if ($row->sol_estado == '1') {
                                                        $socioM = "<button type='button' class='btn btn-success btn-block'
                                                        href='#crearPersona' data-bs-toggle='modal'
                                                        data-bs-dismiss='modal'>Crear Socio</button>";
                                                    } else {
                                                        $socioM = "<button type='button' class='btn btn-danger btn-block' disabled>Terminado</button>";
                                                    }
                                                } else {
                                                    $colorA = "danger";
                                                    $tipo = "Deshabilitar Socio";
                                                } ?>
                                            <dd class="col-sm-2"><span
                                                    class="badge badge-<?php echo $colorA ?>"><?php echo $tipo ?></span>
                                            </dd>
                                            <dd class="col-sm-2" id="<?php echo $idSo ?>">
                                                <?php echo $socioM ?>
                                            </dd>
                                        </dl>
                                        <?php } ?>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fas fa-text-width"></i>
                                            Todas las solicitudes
                                        </h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                    
                                        <?php
                                            $listaSolicitud = $soli->read();
                                            while ($row = mysqli_fetch_object($listaSolicitud)) {
                                                $idS = $row->sol_id;
                                                $titulo = $row->sol_titulo;
                                                $desc = $row->sol_desc;
                                                $tipo = $row->sol_tipo;
                                                $idSocio = $row->sol_soc_id;
                                                $colorA = "";
                                                $socioM = "";
                                        ?>
                                        <dl class="row" id="<?php echo $idS ?>">
                                            <dt class="col-sm-4"><?php echo $titulo ?></dt>
                                            <dd class="col-sm-4"><?php echo $desc ?>
                                            </dd>
                                            <?php if ($tipo == '1') {
                                                    $colorA = "success";
                                                    $tipo = "Crear Socio";
                                                    if ($row->sol_estado == '1') {
                                                        $socioM = "<button type='button' class='btn btn-success btn-block'
                                                        data-bs-target='#crearPersona' data-bs-toggle='modal'
                                                        data-bs-dismiss='modal'>Crear Socio</button>";
                                                    } else {
                                                        $socioM = "<button type='button' class='btn btn-danger btn-block' disabled>Terminado</button>";
                                                    }
                                                } else {
                                                    $colorA = "danger";
                                                    $tipo = "Deshabilitar Socio";
                                                } ?>
                                            <dd class="col-sm-2"><span
                                                    class="badge badge-<?php echo $colorA ?>"><?php echo $tipo ?></span>
                                            </dd>
                                            <dd class="col-sm-2">
                                                <?php echo $socioM ?>
                                                <div class="modal fade text-dark" id="crearPersona" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            
                                                            <form method="post">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                                        Crear
                                                                        socio</h5>
                                                                    <button type="button" class=" btn btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <i class="fas fa-times fa-lg text-success"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input name="nombres" type="text"
                                                                            class="form-control"
                                                                            placeholder="Ingrese sus nombres">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="apellidos" type="text"
                                                                            class="form-control"
                                                                            placeholder="Ingrese sus apellidos">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="dni" type="text"
                                                                            class="form-control"
                                                                            placeholder="Ingrese su DNI">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="celular" type="text"
                                                                            class="form-control"
                                                                            placeholder="Ingrese su celular">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <select name="genero" type="text"
                                                                            class='form-control' required>
                                                                            <option selected value="null">Elige su genero</option>
                                                                            <option>Masculino</option>
                                                                            <option>Femenino</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="dir" type="text"
                                                                            class="form-control"
                                                                            placeholder="Ingrese su dirección">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="correo" type="email"
                                                                            class="form-control"
                                                                            placeholder="Ingrese su correo">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="pass" type="password"
                                                                            class="form-control"
                                                                            placeholder="Ingrese su contraseña">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input name="nac" type="date"
                                                                            class="form-control"
                                                                            placeholder="Ingrese su fecha de nacimiento">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger"
                                                                        data-bs-dismiss="modal">Cerrar</button>
                                                                    <button type="submit" class="btn btn-success"
                                                                        name="enviar2">Siguiente</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </dd>
                                        </dl>
                                        <?php } ?>
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