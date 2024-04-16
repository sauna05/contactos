<?php
include('conexion.php');

$nombre = $_POST["nombre"];
$numero = $_POST["numero"];
$correo = $_POST["correo"];
$contrasenia = $_POST["contrasenia"];

$sql = "INSERT INTO usuarios (nombre, numero, correo, contrasenia) VALUES (:nombre, :numero, :correo, :contrasenia)";
$stm = $conexion->prepare($sql);

$stm->bindParam(':nombre', $nombre);
$stm->bindParam(':numero', $numero);
$stm->bindParam(':correo', $correo);
$stm->bindParam(':contrasenia', $contrasenia);

try {
    $stm->execute();
    echo "<script>alert ('Usuario creado con éxito, agregado exitosamente.');</script>";
    header('Location: login.php');
   
} catch (PDOException $e) {
    echo "Error al agregar usuario: " . $e->getMessage();
}
?>