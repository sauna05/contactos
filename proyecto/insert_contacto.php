<?php
include("conexion.php");

session_start();

$id_usuario = $_SESSION['id_usuario'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = htmlspecialchars($_POST['nombre']);
    $numero = htmlspecialchars($_POST['numero']);
    $correo = htmlspecialchars($_POST['correo']);

 
    $sql = "INSERT INTO contactos (nombre, numero, correo, id_usuario) VALUES (:nombre, :numero, :correo, :id_usuario)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':id_usuario', $id_usuario);

    try {
        $stmt->execute();
    
        echo "<script>alert ('Contacto agregado exitosamente.')</script>";
        header('Location: formulario.php');
        exit();
    } catch (PDOException $e) {
       
        echo "Error al agregar contacto: " . $e->getMessage();
    }
}
?>