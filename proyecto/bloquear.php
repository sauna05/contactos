<?php 
include('conexion.php');
/*Trarme el nombre del usuario que inicio session */
session_start();
//verificar que el usuario ya haya iniciado session de lo contrario lo enviara al login 
if(isset($_SESSION['id_usuario'])){
    header('location:login.php');
    exit;
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bloqueo de sesion</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Contraseña</label><br>
        <input type="password" name="contrasenia" placeholder="Ingrese su conraseña" required>
        <br>
        <input type="submit" value="iniciar session">


    </form>
    
</body>
</html>