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
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Listado de <b>Estudiantes</b></h2>
                    </div>
                    <div class="col-sm-4">
                        <a href="createEstudiantes.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar
                            estudiante</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombres</th>
                        <th>Estado</th>
                        <th>Fecha de nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include "CrudEstudiantes.php";
                        $e = new CrudEstudiantes();
                        $lista = $e->read();

                    ?>
                    <?php
                        while ($row = mysqli_fetch_object($lista)) {
                        $id = $row->id;
                        $nombres = $row->nombre;
                        $estado = $row->estado;
                        $fecha_nac = $row->fecha_nac;

                        if ($estado === "1") {
                            $estado = "Bien";
                        } else if ($estado === "2") {
                            $estado = "Normal";
                        } else {
                            $estado = "Mal";
                        }
                    ?>
                    <tr>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $estado;?></td>
                        <td><?php echo $fecha_nac;?></td>
                        <td>
                            <a href="updateEstudiantes.php?id=<?php echo $id;?>" class="edit" title="Editar"
                                data-toggle="tooltip"><i class="material-icons text-success">&#xE254;</i></a>
                            <a href="deleteEstudiantes.php?id=<?php echo $id;?>" class="delete" title="Eliminar"
                                data-toggle="tooltip"><i class="material-icons text-danger">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>