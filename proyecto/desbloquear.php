<?php
include_once("conexion.php");


// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Consultar el usuario usando el ID almacenado en la cookie
    $sql = "SELECT * FROM usuarios WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $_COOKIE["id"]);
    $stmt->execute();
    $usuarioExtraido = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si la contraseña ingresada coincide con la del usuario
    if($usuarioExtraido && password_verify($_POST["contrasenia"], $usuarioExtraido["contrasenia"])){
        // Iniciar una nueva sesión y redirigir a la página de formulario
        session_start();
        $_SESSION["id_usuario"] = $_COOKIE["id"];
        header('location: formulario.php');
        exit();
    } else {
        // Contraseña incorrecta
        $error = "Contraseña incorrecta.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desbloquear la sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 300px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Desbloquear la sesión</h2>
        <form method="POST">
            <label for="contrasenia">Ingrese su contraseña</label>
            <input type="password" id="contrasenia" name="contrasenia" placeholder="Contraseña" required>
            <input type="submit" value="Iniciar sesión">
            <?php if(isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        </form>
    </div>
</body>
</html>