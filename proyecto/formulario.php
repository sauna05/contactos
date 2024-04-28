<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if(!isset($_SESSION['id_usuario'])){
    header('Location: login.php');
    exit();
}

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
    <title>Lista de Contactos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin-top: 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-transform: uppercase;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Contactos Registrados</h1>
        <?php if (empty($contactos)): ?>
            <p>No hay contactos registrados.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Correo</th>           
                    <th>Acciones</th>
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
        <?php endif; ?>

        <br>
        <a class="btn" href="crearcontacto.php">Agregar nuevo contacto</a> 
        <a class="btn" href="cerrar.php">Cerrar sesión</a>
        <a class="btn" href="bloquear.php">Bloquear la sesión</a>
    </div>
</body>
</html>