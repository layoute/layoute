<?php
    if (isset($_POST['idS'])) {
        $idS = $_POST['idS'];
        echo "Hola esta bien" . $idS;
    } else {
        echo "Socios..";
    }
?>

<div class="row text-dark">
    <div class="col">
        <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Nota:</h5>
            Recuerda que la información debe de ser personal, no comparta su información con nadie más.
        </div>
        <div class="row">
            <div class="col-md-4 my-3">
                <a href="../php/updateSocios.php?id=<?php echo $idS;?>" type="button" class="btn btn-primary btn-block"><i class="fas fa-edit"></i> Editar
                    información</a>
            </div>
            <div class="col-md-4 my-3">
                    <form action="" method="post">
                        <button id="btnR" name="btnR" type="submit" class="text-light btn btn-warning btn-block"
                        onclick=""><i class="fas fa-arrow-alt-circle-left"></i> Regresar</button>
                    </form>
                    <?php if (isset($_POST['btnR'])) {
                        header('Location:  socios.php;');
                    }?>
            </div>
            <div class="col-md-4 my-3">
                <button type="button" class="btn btn-danger btn-block"><i class="fas fa-eye-slash"></i> Desactivar
                    usuario</button>
            </div>
        </div>
        <div class="invoice p-3 mb-3">
            <?php
            include "CrudSocios.php";
            include "login/Validacion.php";
            $socio = new CrudSocios();
            $lista = $socio->single_record($idS);
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
                        <strong>Datos</strong> <br> Nombres y Apellidos: <?php echo $lista->per_nombres ?>
                        <?php echo $lista->per_apellidos ?>
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