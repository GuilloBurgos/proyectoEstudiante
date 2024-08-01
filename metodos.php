<?php
class Metodos
{
    public function insertarDatos($datos)
    {
        $c = new conectar();
        $conexion = $c->conexion();
        $stmt = $conexion->prepare("INSERT INTO estudiante(nombre,edad,email,password,programas,imagen) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sissss", $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5]);
        return $stmt->execute();
    }
}
?>