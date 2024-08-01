<?php
class conectar{
  	private $servidor="localhost";
  	private $usuario ="root";
  	private $password = "";
  	private $nombredb= "sena";

    public function conexion() {
        $con = mysqli_connect(
            $this->servidor,
            $this->usuario,
            $this->password,
            $this->nombredb
        );
        return $con;
    }
}




 ?>