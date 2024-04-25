
<?php
include('conexion.php');

session_start();

//validar que se envie la informacion por el metodo post mediante el protocolo http
if($_SERVER['REQUEST_METHOD']=="POST"){
    $correo=$_POST["correo"];
    $contrasenia=$_POST["contrasenia"];
    
    $sql="SELECT id FROM usuarios WHERE correo = :correo AND contrasenia = :contrasenia";
    $stm=$conexion->prepare($sql);
    $stm->bindParam(':correo',$correo);
    $stm->bindParam(':contrasenia',$contrasenia);
    /*Validar para que no se repitan los usuarios  */
    $stm->execute();
    $usuario = $stm->fetch(PDO::FETCH_ASSOC);
    
    if($usuario){
        $_SESSION['id_usuario'] = $usuario['id'];
        header('Location: formulario.php');
        exit;
    
    } else {
        echo "Correo electrónico o contraseña incorrectos. Si no estás registrado, <a href='crear_usuario.php'>!Registrate aqui¡</a>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #f2f2f2; /* Color de fondo */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: auto;
            margin: 0;
        }

        form {
            background-color: blue;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%; /* Tamaño del formulario */
            max-width: 400px; /* Tamaño máximo del formulario */
        }

        label, input, a {
            display: block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff; /* Color del botón */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3; /* Color del botón al pasar el cursor */
        }

        a {
            color: white;
            font-style: normal;
        }
       
    </style>
</head>
<body>
    
    <form method="post"> 
        <label for="correo">Usuario</label>
        <input type="text" name="correo" placeholder="Ingrese su correo" required>
        <label for="contrasenia">Contraseña</label>
        <input type="password" name="contrasenia" placeholder="Ingrese su contraseña" required>
        <input type="submit" value="Iniciar sesión">
        <a href="crear_usuario.php">¿No tienes una cuenta?</a>
    </form>
</body>
</html>