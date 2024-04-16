<?php
include("conexion.php");

session_start();

$id_usuario = $_SESSION['id_usuario'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibir y validar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $numero = htmlspecialchars($_POST['numero']);
    $correo = htmlspecialchars($_POST['correo']);

    // Insertar el contacto en la base de datos
    $sql = "INSERT INTO contactos (nombre, numero, correo, id_usuario) VALUES (:nombre, :numero, :correo, :id_usuario)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':numero', $numero);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':id_usuario', $id_usuario);

    try {
        $stmt->execute();
        // Mostrar mensaje de éxito y redirigir
        echo "<script>alert ('Contacto agregado exitosamente.')</script>";
        header('Location: formulario.php');
        exit();
    } catch (PDOException $e) {
        // Mostrar mensaje de error en caso de que ocurra un error durante la inserción
        echo "Error al agregar contacto: " . $e->getMessage();
    }
}
?>