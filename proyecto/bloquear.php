<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
    exit();
}


$id_usuario = $_SESSION['id_usuario'];

// Verificar si había un ID de usuario de la tabla contactos almacenado
if(isset($id_usuario)){
 
    setcookie('id', $id_usuario, time() + 20000);
}


session_destroy();

// Redirigir a la página de desbloqueo
header('Location: desbloquear.php');
exit();

