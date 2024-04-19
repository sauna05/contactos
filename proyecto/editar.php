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

// Verificar si se ha proporcionado un ID de contacto válido
if(isset($_GET['ind'])) {
    $ind = $_GET['ind'];
} else {
    // Redirigir si no se proporciona un ID válido
    header('Location: listarcontactos.php');
    exit;
}

// Consultar el contacto específico para el usuario actual
$sql = "SELECT * FROM contactos WHERE id_usuario = :id_usuario AND ind = :ind";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_usuario', $id_usuario);
$stmt->bindParam(':ind', $ind);
$stmt->execute();
$contacto = $stmt->fetch(PDO::FETCH_ASSOC);

// Verificar si el contacto existe y pertenece al usuario actual
if(!$contacto) {
    // Redirigir si no se encuentra el contacto
    header('Location: listarcontactos.php');
    exit;
}

// Verificar si se envió el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar los datos del formulario
    $nombre = $_POST['nombre'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];

    // Actualizar el contacto en la base de datos
    $sql_update = "UPDATE contactos SET nombre = :nombre, numero = :numero, correo = :correo WHERE ind = :ind";
    $stmt_update = $conexion->prepare($sql_update);
    $stmt_update->bindParam(':nombre', $nombre);
    $stmt_update->bindParam(':numero', $numero);
    $stmt_update->bindParam(':correo', $correo);
    $stmt_update->bindParam(':ind', $ind);
    $stmt_update->execute();

    // Redirigir de vuelta a la lista de contactos después de la edición
    header('Location: formulario.php');
    exit;
}

// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>
</head>
<body>
    <h1>Editar Contacto</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" value="<?php echo $contacto['nombre']; ?>"><br>
        <label for="numero">Teléfono:</label><br>
        <input type="text" id="numero" name="numero" value="<?php echo $contacto['numero']; ?>"><br>
        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" value="<?php echo $contacto['correo']; ?>"><br><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>