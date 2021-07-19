<?php

class CrudSocios {
    public function createP(
        $nm, $ap, $dni, $cel,
        $ge, $dir, $correo, $pass,
        $rango, $codigo, $nac, $fecha) {
        $sql = "INSERT INTO persona (per_nombres, per_apellidos, per_dni, per_celular, per_genero, per_dir, per_correo, per_pass, per_rango, per_codigo, per_fecha_nac, per_fecha) VALUES ('$nm', '$ap', '$dni', '$cel', '$ge', '$dir', '$correo', '$pass', '$rango', '$codigo', '$nac', '$fecha')";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }

    public function createS($estado, $idP) {
        include_once "../php/conne.php";
        $sql = "INSERT INTO socio (soc_estado, soc_per_id) VALUES ('$estado', '$idP')";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }

    public function read() {
        include_once "../php/conne.php";
        $por_pagina = 5;
        $sql = "SELECT * FROM persona";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        return $res;
    }

    public function readPage($emp, $par) {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM persona LIMIT $emp, $par";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        return $res;
    }

    public function numRowsP() {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM persona";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        $total = mysqli_num_rows($res);
        return $total;
    }

    public function countPersona() {
        include_once "../php/conne.php";
        $sql = "SELECT count(per_id) FROM persona";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function estadoPersona() {
        include_once "../php/conne.php";
        $sql = "SELECT count(soc_id) FROM socio WHERE soc_estado = '2'";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function single_record($idS) {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM persona WHERE per_id = '$idS'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function encontrar_socio($id) {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM socio WHERE soc_per_id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function encontrar_socioR($id) {
        include_once "../conne.php";
        $sql = "SELECT * FROM socio WHERE soc_per_id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function updateP(
        $nm, $ap, $dni, $cel,
        $ge, $dir, $correo, $pass,
        $nac, $idP
    ) {
        include_once "../php/conne.php";
        $sql = "UPDATE persona SET per_nombres = '$nm', per_apellidos = '$ap', per_dni = '$dni', per_celular = '$cel', per_genero = '$ge', per_dir = '$dir', per_correo = '$correo', per_pass = '$pass', per_fecha_nac = '$nac' WHERE per_id = '$idP'";
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

    public function getPersona() {
        $sql = "SELECT * FROM persona ORDER BY per_id DESC LIMIT 1";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function dniPersona($dni) {
        include_once "../php/conne.php";
        $sql = "SELECT * FROM persona WHERE per_dni = '$dni'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    public function socioDescU($id) {
        $sql = "UPDATE socio
        SET soc_estado = '2'
        WHERE soc_id = '$id'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    public function buscarSocio($buscar) {
        include_once "../conne.php";
        $sql = "SELECT * FROM persona WHERE per_nombres LIKE '%$buscar%' OR per_apellidos LIKE '%$buscar%' OR per_dni LIKE '%$buscar%'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        return $res;
    }
}
