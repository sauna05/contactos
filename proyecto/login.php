
<?php
include('conexion.php');

session_start();

//validar que se envie la informacion por el metodo post
if($_SERVER['REQUEST_METHOD']=="POST"){
    $correo=$_POST["correo"];
    $contrasenia=$_POST["contrasenia"];
    
    $sql="SELECT id FROM usuarios WHERE correo = :correo AND contrasenia = :contrasenia";
    $stm=$conexion->prepare($sql);
    $stm->bindParam(':correo',$correo);
    $stm->bindParam(':contrasenia',$contrasenia);

    $stm->execute();
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    
    if($usuario){
        $_SESSION['id_usuario'] = $usuario['id'];
        header('Location: formulario.php');
        exit;
    
    } else {
        echo "Correo electrónico o contraseña incorrectos";
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
        <input type="text" name="correo" placeholder="Ingrese su correo" required><br>
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