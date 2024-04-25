<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
    exit;
}

// Obtener el ID del usuario que ha iniciado sesión
$id_usuario = $_SESSION['id_usuario'];

// Consultar los contactos asociados con el usuario
$sql = "SELECT * FROM contactos WHERE id_usuario = :id_usuario";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->execute();
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Cerrar la conexión a la base de datos
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
            <td><?php echo $contacto['ind']; ?></td>
            <td><?php echo $contacto['nombre']; ?></td>
            <td><?php echo $contacto['numero']; ?></td>
            <td><?php echo $contacto['correo']; ?></td>
            <td>
            <a href="editar.php?ind=<?php echo $contacto['ind']; ?>">Editar</a>
            <a href="eliminar.php?ind=<?php echo $contacto['ind']; ?>">Eliminar</a>
        </td>
            
            
            
        </tr>
        <?php endforeach; ?>
    </table>

    <br/>
    <style>
        /* Estilos para el botón */
        button {
            width: 110px; /* Ancho del botón */
            height: 30px; /* Altura del botón */
            color: blue;
            background-color: blue;
            border-radius: 10px;
        }
        button a {
        color: white; /* Color del enlace dentro del botón */
        text-decoration: none; /* Quitar subrayado del enlace */
    }
    </style>

    <button type="button"><a href="cerrar.php">Cerrar sesión</a></button>

    
    


</body>

</html>