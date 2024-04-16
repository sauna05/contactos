

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
</head>
<body>
    <h1>Registro de usuarios</h1>
    <form  action="insertUsua.php" method="post">
        <label for="">Nombre:</label>
        <br>
        <input type="text" name="nombre" placeholder="su nombre" required>
        <br>
        <label for="">Número de teléfono:</label>
        <br>
        <input type="text" name="numero" placeholder="número de teléfono" required>
        <br>
        <label for="">Correo electrónico:</label>
        <br>
        <input type="email" name="correo" placeholder="su correo electrónico" required>
        <br>
        <label for="">Contraseña:</label>
        <br>
        <input type="password" name="contrasenia" placeholder="su contraseña" required>
        <br>
        <input type="submit" value="Registrar">
        <br>
        <a href="login.php"> inicio</a>
    </form>
</body>
</html>