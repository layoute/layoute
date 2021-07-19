<?php
class CrudSolicitud {
    public function create($titulo, $desc, $tipo, $fecha, $estado, $idP) {
        $sql = "INSERT INTO solicitud (sol_titulo, sol_desc, sol_tipo, sol_fecha, sol_estado, sol_soc_id)
        VALUES ('$titulo', '$desc', '$tipo', '$fecha', '$estado', '$idP')";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }

    public function read() {
        $sql = "SELECT * FROM solicitud";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        return $res;
    }

    public function single_record($idS) {
        $sql = "SELECT * FROM solicitud WHERE sol_soc_id = '$idS'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }

    public function encontrar_socio($id) {
        $sql = "SELECT * FROM socio WHERE soc_id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function update($nombres, $estado, $f_nac, $id) {
        $sql = "UPDATE persona
        SET nombre = '$nombres', estado = '$estado', fecha_nac = '$f_nac'
        WHERE id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM persona WHERE per_id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function generate_string() {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for($i = 0; $i < 5; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}
