<?php
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
    } else {
        header('Location: listEstudiantes.php');
    }
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>php</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php
    include "CrudEstudiantes.php";
?>

    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Actualizar <b>estudiante</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="listEstudiantes.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i>
                            Regresar</a>
                    </div>
                </div>
            </div>
            <?php
                $conn = new Conne();
                $estudiantes = new CrudEstudiantes();
                if (isset($_POST) && !empty($_POST)) {
                    $var = $_POST['estado'];
                    if ($var === "Bien" || $var === "Normal" || $var === "Mal") {
                        $nombre = $conn->sanitize($_POST['nombres']);
                        $estado = $conn->sanitize($_POST['estado']);
                        $f_nac = $conn->sanitize($_POST['fecha']);
                        $id = intval($_POST['id_estudiante']);
                        if ($estado === "Bien") {
                            $estado = '1';
                        } else if ($estado === "Normal") {
                            $estado = '2';
                        } else {
                            $estado = '3';
                        }
                        $res = $estudiantes->update(
                            $nombre,
                            $estado,
                            $f_nac,
                            $id
                        );
                        if($res){
                            $message= "Datos insertados con éxito";
                            $class="alert alert-success";
                        }else{
                            $message="No se pudieron insertar los datos";
                            $class="alert alert-danger";
                        }
                    } else {
                        $message= "Ingrese el estado correctamente";
						$class="alert alert-danger";
                    }
            ?>
            <div class="<?php echo $class?>">
                <?php echo $message;?>
            </div>
            <?php
                }
                $datos_estudiante = $estudiantes->single_record($id);
            ?>
            <form method="post">
                <div class="row">
                    <div class="col-md-12 my-2">
                        <label>Nombres:</label>
                        <input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required
                            value="<?php echo $datos_estudiante->nombre;?>"">
                        <input type=" hidden" name="id_estudiante" id="id_estudiante" class="form-control"
                            value="<?php echo $datos_estudiante->id;?>">
                    </div>
                    <div class="col-md-6 my-2">
                        <label>Estado:</label>
                        <?php
                            $e = $datos_estudiante->estado;
                            if ($e === "1") {
                                $e = "Bien";
                            } else if ($e === "2") {
                                $e = "Normal";
                            } else if ($e === "3") {
                                $e = "Mal";
                            } else {
                                $e = "";
                            }
                        ?>
                        <select name="estado" id="estado" , class='form-control' , required>
                            <option value="null">Elige un estado</option>
                            <option value="Bien" <?php if ($e === "Bien") echo "selected" ?>>Bien</option>
                            <option value="Normal" <?php if ($e === "Normal") echo "selected" ?>>Normal</option>
                            <option value="Mal" <?php if ($e === "Mal") echo "selected" ?>>Mal</option>
                        </select>
                    </div>
                    <div class="col-md-6 my-2">
                        <label>Fecha Nacimiento:</label>
                        <input type="date" name="fecha" id="fecha" class='form-control' required
                            value="<?php echo $datos_estudiante->fecha_nac;?>">
                    </div>
                    <div class="col-md-12 pull-right">
                        <button type="submit" class="btn btn-success">Guardar datos</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>