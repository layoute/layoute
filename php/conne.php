<?php

class Conne {
    private $connect;
    private $dbhost = 'localhost';
    private $dbuser = 'root';
    private $dbpass = '';
    private $dbname = 'aspdev';

    public function connect_db() {
        $this->connect = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
        if (mysqli_connect_error()) {
            die('Conexión a la base de datos falló' . mysqli_connect_error() . mysqli_connect_errno());
        }
        return $this->connect;
    }

    public function sanitize($var) {
        $return = mysqli_real_escape_string($this->connect_db(), $var);
        return $return;
    }
}
