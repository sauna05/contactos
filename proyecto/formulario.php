<?php
session_start();
include("conexion.php");
if(!isset($_SESSION['id_usuario'])){
    header('Location:login.php');
    exit;
}
$sql = "SELECT * FROM contactos ";
$stmt = $conexion->prepare($sql);

$stmt->execute();
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTA de Contactos</title>
</head>
<body>
    <!-- Lista de contactos -->
    <h1>Contactos Registrados</h1>
    <table>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Correo</th>
            <th></th>
        </tr>
        <?php foreach ($contactos as $contacto): ?>
        <tr>
            <td><?php echo $contacto['id']; ?></td>
            <td><?php echo $contacto['nombre']; ?></td>
            <td><?php echo $contacto['numero']; ?></td>
            <td><?php echo $contacto['correo']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <br/>
    <a href="crearcontacto.php">Agregar nuevo contacto</a> 
    <br>
    <a href="login.php"> ir al inicio </a> 


</body>

</html>
