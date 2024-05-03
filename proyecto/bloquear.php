<?php
session_start();

include('conexion.php');

if(!isset($_SESSION['id_usuario'])){
    header('location: login.php');
    exit;
}

$id_usuario = $_SESSION['id_usuario'];

// Verificar si había un ID de usuario de la tabla contactos almacenado
if(isset($id_usuario)){
    
    setcookie('id', $id_usuario, time() + 20000);
}

header('Location: desbloquear.php');

// Destruir la sesión después de redirigir al usuario
session_destroy();
exit();