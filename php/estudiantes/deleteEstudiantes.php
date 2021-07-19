<?php
    if (isset($_GET['id'])) {
        include "CrudEstudiantes.php";
        $estudiantes = new CrudEstudiantes();
        $id = intval($_GET['id']);
        $res = $estudiantes->delete($id);
        if ($res) {
            header("Location: listEstudiantes.php");
        } else {
            echo "Error al eliminar el registro";
        }
    }
?>