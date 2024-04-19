<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
    exit;
}


$id_usuario = $_SESSION['id_usuario'];


if(isset($_GET['ind'])) {
    $ind = $_GET['ind'];
} else {
    // Redirigir si no se proporciona un ID válido
    header('Location: formulario.php');
    exit;
}

// Eliminar el contacto de la base de datos
$sql_delete = "DELETE FROM contactos WHERE id_usuario = :id_usuario AND ind = :ind";
$stmt_delete = $conexion->prepare($sql_delete);
$stmt_delete->bindParam(':id_usuario', $id_usuario);
$stmt_delete->bindParam(':ind', $ind);
$stmt_delete->execute();
echo("se elimino el contacto");

header('Location: formulario.php');
exit;
?>
