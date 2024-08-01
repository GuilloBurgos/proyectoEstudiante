<?php
include 'conexion.php';
include 'metodos.php';

$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$email = $_POST["email"];
$password = $_POST["password"];
$repetirPassword = $_POST["repetirPassword"];
$programa = $_POST["programa"];
$imagen = $_FILES["imagen"];
$extensionesPermitidas = array("jpg", "jpeg", "png");
$nombreImagen = $imagen["name"];//CERTIFICADO.JPG 
$extensionImagen = strtolower(pathinfo($nombreImagen, PATHINFO_EXTENSION));
$path = $_SERVER['DOCUMENT_ROOT'] . "/84/23_07_24/validaciones/img/" . $nombreImagen;

if (
    isset($nombre) && !empty($nombre) && isset($edad) && !empty($edad) && isset($email) &&
    !empty($email) && isset($password) && !empty($password)
) {
    if (!preg_match('/^[a-zA-Z\s]+$/', $nombre)) {
        $resultado = "<strong>Digite solo letras</strong>";
        header('location:index.php?var=' . urlencode($resultado));
    } else if (!is_numeric($edad)) {
        $resultado = "<strong>Digite solo números</strong>";
        header('location:index.php?var=' . urlencode($resultado));
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $resultado = "<strong>Formato inválido</strong>";
        header('location:index.php?var=' . urlencode($resultado));
    } else if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $password)) {
        $resultado = "<strong>La contraseña debe contener como minimo 8 caracteres, una letra minuscula,<br>
                               una letra mayuscula, un numero y un <br>
                               caracter especial
                     </strong>";
        header('location:index.php?var=' . urlencode($resultado));
    } else if ($password !== $repetirPassword) {
        $resultado = "<strong>El password no coincide</strong>";
        header('location:index.php?var=' . urlencode($resultado));
    } else if ($programa === "") {
        $resultado = "<strong>Escoga una opción</strong>";
        header('location:index.php?var=' . urlencode($resultado));
    } else if (!in_array($extensionImagen, $extensionesPermitidas)) {
        $resultado = "<strong>Formato invalido</strong>";
        header('location:index.php?var=' . urlencode($resultado));
        //La función in_array comprueba si un valor existe en un array.
    } else {
        if (move_uploaded_file($imagen['tmp_name'], $path)) {
            $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);
            $datos = [$nombre, $edad, $email, $passwordEncriptada, $programa, $nombreImagen];
            $obj = new Metodos();
            if ($obj->insertarDatos($datos) == 1) {
                $resultado = "Registro exitoso";
                header('location:index.php?var=' . urlencode($resultado));
            } else {
                $resultado = "Fallo al registrar";
                header('location:index.php?var=' . urlencode($resultado));
            }
        } else {
            $resultado = "<strong>Error al subir la imagen</strong>";
            header('location:index.php?var=' . urlencode($resultado));
        }
    }

} else {
    $resultado = "<strong>Campos obligatorios</strong>";
    header('location:index.php?var=' . urlencode($resultado));
}


?>