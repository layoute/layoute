<?php

include "CrudSocios.php";
$p = new CrudSocios();
$per = $p->read();
header('Content-type:application/xls');
header('Content-Disposition: attachment; filename=socios.xlsx');

?>

<table border="1">
<tr>
    <th>id</th>
    <th>Codigo</th>
    <th>Nombres</th>
    <th>Apellidos</th>
    <th>dni</th>
    <th>celular</th>
    <th>fecha de creación</th>
    <th>Dirección</th>
    <th>Correo</th>
    <th>Fecha de nacimiento</th>
</tr>
<?php
    while ($row = mysqli_fetch_object($per)) {
        $id = $row->per_id;
        $codigo = $row->per_codigo;
        $nombres = $row->per_nombres;
        $apellidos = $row->per_apellidos;
        $fecha = $row->per_fecha;
        $celular = $row->per_celular;
        $dni = $row->per_dni;
        $dir = $row->per_dir;
        $correo = $row->per_dir;
        $nac = $row->per_fecha_nac;
    ?>
<tr>
    <td><?php echo $id ?></td>
    <td><?php echo $codigo ?></td>
    <td><?php echo $nombres ?></td>
    <td><?php echo $apellidos ?></td>
    <td><?php echo $dni ?></td>
    <td><?php echo $celular ?></td>
    <td><?php echo $fecha ?></td>
    <td><?php echo $dir ?></td>
    <td><?php echo $correo ?></td>
    <td><?php echo $nac ?></td>
</tr>
<?php } ?>
</table>
