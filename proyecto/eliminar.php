<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
    exit;
}

// Obtener el ID del usuario que ha iniciado sesión
$id_usuario = $_SESSION['id_usuario'];

// Verificar si se ha proporcionado un ID de contacto válido
if(isset($_GET['id'])) {
    $ind = $_GET['id'];
} else {
    // Redirigir si no se proporciona un ID válido
    header('Location: formulario.php');
    exit;
}

// Eliminar el contacto de la base de datos
$sql_delete = "DELETE FROM contactos WHERE id_usuario = :id_usuario AND id = :id";
$stmt_delete = $conexion->prepare($sql_delete);
$stmt_delete->bindParam(':id_usuario', $id_usuario);
$stmt_delete->bindParam(':id', $ind);
$stmt_delete->execute();
echo("se elimino el contacto");
// Redirigir de vuelta a la lista de contactos después de la eliminación
header('Location: formulario.php');
exit;
