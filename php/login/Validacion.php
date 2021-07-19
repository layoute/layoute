<?php

class Validacion {
    public $conne;
    public function getUser($email, $password) {
        $sql = "SELECT * FROM persona WHERE per_correo = '$email' && per_pass = '$password'";
        $conne = new Conne();
        $res = mysqli_query($conne->connect_db(), $sql);
        $row = $res->num_rows;
        if ($row == 1) {
            return true;
            /* return true; */
        } else {
            return false;
        }
    }

    public function single_record($email) {
        $sql = "SELECT * FROM persona WHERE per_correo = '$email'";
        $conn = new Conne();
        $res = mysqli_query($conn->connect_db(), $sql);
        $return = mysqli_fetch_object($res);
        return $return;
    }

    function calculaedad($fechanacimiento){
        list($ano,$mes,$dia) = explode("-",$fechanacimiento);
        $ano_diferencia  = date("Y") - $ano;
        $mes_diferencia = date("m") - $mes;
        $dia_diferencia   = date("d") - $dia;
        if ($dia_diferencia < 0 || $mes_diferencia < 0)
          $ano_diferencia--;
        return $ano_diferencia;
    }
}