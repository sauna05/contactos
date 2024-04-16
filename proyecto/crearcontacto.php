<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <h1>Crear nuevo contacto</h1>
</head>
<body>
    <form action="insert_contacto.php" method="post">
        <label for=""> Nombre</label><br>
        <input type="text" name="nombre" placeholder="Nombre" require>
        <br>
        <label for=""> Telefono</label>
        <br>
        <input type="text" name="numero" placeholder="Numero de telefono" requiere>
        <br>
        <label for="">Email.</label>
        <br>
        <input type="email" name="correo" placeholder="Su correo" requiere>
        <br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>
