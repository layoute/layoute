<?php

class CrudParientes {
    public function readPage($emp, $par, $idP) {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM pariente WHERE pa_soc_id = $idP LIMIT $emp, $par ";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        return $res;
    }

    public function encontrar_persona($id) {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM persona WHERE per_id = $id";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }
}

?>