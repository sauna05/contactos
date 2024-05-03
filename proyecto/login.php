
<?php
include('conexion.php');

session_start();

$mensaje = ''; // Variable para almacenar los mensajes

// Validar que se envíe la información por el método POST mediante el protocolo HTTP
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $correo = $_POST["correo"];
    $contrasenia = $_POST["contrasenia"];
    
    // Consulta SQL para buscar el usuario por correo electrónico
    $sql = "SELECT id, contrasenia FROM usuarios WHERE correo = :correo";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si se encontró el usuario y si la contraseña coincide
    if($usuario && password_verify($contrasenia, $usuario["contrasenia"])) {
        // Iniciar sesión
        $_SESSION["id_usuario"] = $usuario['id'];
        // Redirigir a la página principal
        header("Location: formulario.php");
        exit;
    } else {
        // Credenciales incorrectas
        $mensaje = "Correo o contraseña incorrectos. Si no estás registrado, <a href='crear_usuario.php'>¡Regístrate aquí!</a>";
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
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }

        label, input, a {
            display: block;
            margin-bottom: 15px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .mensaje {
            color: red;
            margin-top: 10px;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <form method="post"> 
        <label for="correo">Correo electrónico</label>
        <input type="text" name="correo" placeholder="Ingrese su correo" required>
        <label for="contrasenia">Contraseña</label>
        <input type="password" name="contrasenia" placeholder="Ingrese su contraseña" required>
        <input type="submit" value="Iniciar sesión">
        <a href="crear_usuario.php">¿No tienes una cuenta?</a>
        
        <div class="mensaje"><?php echo $mensaje; ?></div> <!-- Mostrar mensaje de error aquí -->
    </form>
</body>
</html>
