
<?php
include('conexion.php');

session_start();


if($_SERVER['REQUEST_METHOD']=="POST"){
    $correo=$_POST["correo"];
    $contrasenia=$_POST["contrasenia"];
    
    $sql="SELECT * FROM usuarios WHERE correo = :correo AND contrasenia = :contrasenia";
    $stm=$conexion->prepare($sql);
    $stm->bindParam(':correo',$correo);
    $stm->bindParam(':contrasenia',$contrasenia);

    $stm->execute();
    if($stm->rowCount() >0){

        $id_usuario=1;
        
        $_SESSION['id_usuario']=$id_usuario;
        header('Location:formulario.php');
        exit;
    }else{
        echo("Correo electronico o contraseña incorrectos");
    }
    
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form  method="post"> 
        <label for="correo">Usuario</label><br>
        <input type="text" name="correo" placeholder="Ingrese su usuario" required><br>
        <label for="contrasenia">Contraseña</label><br>
        <input type="password" name="contrasenia" placeholder="Ingrese su contraseña" required><br>
        <input type="submit" value="Iniciar sesión"><br>
        <a href="crear_usuario.php">¿No tienes una cuenta?</a><br>
      
    </form>
</body>
<style>
    a {
        color: blue;
        font-style: normal;
    }
</style>
</html>