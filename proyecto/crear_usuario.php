<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
    <style>
        
        body {
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif; /* Utilizando una fuente legible */
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 400px;
        }

        label, input, a {
            display: block;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            color: #007bff;
            text-decoration: none; /* Quitando el subrayado de los enlaces */
        }

        a:hover {
            text-decoration: underline; /* Subrayando el enlace al pasar el cursor */
        }

        /* Estilo para los campos de entrada */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Asegurando que el padding no afecte el ancho total */
        }
    </style>
</head>
<body>
    <h1>h</h1>
    
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