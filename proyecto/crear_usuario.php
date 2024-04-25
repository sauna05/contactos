<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <style>
        body {
            background-color: #f2f2f2; /* Color de fondo */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background-color: white;
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
            color: blue;
            font-style: normal;
        }
    </style>
</head>
<body>
    
    <form action="insertUsua.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" placeholder="Su nombre" required>
        
        <label for="numero">Número de teléfono:</label>
        <input type="text" name="numero" placeholder="Número de teléfono" required>
        
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" placeholder="Su correo electrónico" required>
        
        <label for="contrasenia">Contraseña:</label>
        <input type="password" name="contrasenia" placeholder="Su contraseña" required>
        
        <input type="submit" value="Registrar">
        
        <a href="login.php">Inicio</a>
    </form>
</body>
</html>