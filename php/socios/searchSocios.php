<?php

$buscar = $_POST['buscar'];

include "../CrudSocios.php";
$p = new CrudSocios();
$socioB = $p->buscarSocio($buscar);
while ($row = mysqli_fetch_object($socioB)) {
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
        $sociol = $p->encontrar_socioR($id);
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
<?php
    }
?>