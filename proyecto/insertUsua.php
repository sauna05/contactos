<?php
include('conexion.php');

$nombre = $_POST["nombre"];
$numero = $_POST["numero"];
$correo = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];
//encriptar la contraseña
$contrasenia_encriptada = password_hash($contrasenia, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, numero, correo, contrasenia) VALUES (:nombre, :numero, :correo, :contrasenia)";
$stm = $conexion->prepare($sql);

$stm->bindParam(':nombre', $nombre);
$stm->bindParam(':numero', $numero);
$stm->bindParam(':correo', $correo);
$stm->bindParam(':contrasenia', $contrasenia_encriptada);


$stmvalidar="SELECT COUNT(*) as count FROM usuarios WHERE correo = :correo";
$stmvalidar=$conexion->prepare($stmvalidar);
$stmvalidar->bindParam(':correo',$correo);
$stmvalidar->execute();
$count=$stmvalidar->fetchColumn();
if($count > 0){
    echo("usuario ya existe");
    exit;

}
else{
    try {
        $stm->execute();
        echo "<script>alert ('Usuario creado con éxito, agregado exitosamente.');</script>";
        header('Location: formulario.php');
       
    } catch (PDOException $e) {
        echo "Error al agregar usuario: " . $e->getMessage();
    }

}


?>