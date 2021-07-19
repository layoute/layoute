<?php

include "../conne.php";

class CrudEstudiantes {
    public function create($nombres, $estado, $f_nac) {
        $sql = "INSERT INTO estudiantes (nombre, estado, fecha_nac)
        VALUES ('$nombres', '$estado', '$f_nac')";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }

    public function read() {
        $sql = "SELECT * FROM estudiantes";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }

    public function single_record($id) {
        $sql = "SELECT * FROM estudiantes WHERE id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function update($nombres, $estado, $f_nac, $id) {
        $sql = "UPDATE estudiantes
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
        $sql = "DELETE FROM estudiantes WHERE id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
