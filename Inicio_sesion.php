<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

// Conexión a la base de datos
$conn = new mysqli('localhost','root','','nutriser');

$result = mysqli_query($conn, "SELECT * FROM paciente WHERE email = '$email' AND password='$password'");
$row = mysqli_fetch_assoc($result);

if(is_array($row) && !empty($row)){
    $_SESSION['valid'] = $row['email'];
    // Verificar si la clave 'nombre' existe en $row antes de acceder a ella
    $_SESSION['nombre'] = isset($row['nombre']) ? $row['nombre'] : '';
    // Verificar si la clave 'ID' existe en $row antes de acceder a ella
    $_SESSION['ID'] = isset($row['ID']) ? $row['ID'] : '';
    
    // Redirigir a la página de inicio
    header('Location: agendar_cita.php');
    exit; // Terminar la ejecución del script después de redirigir
}else {
    header('Location: correo_duplicado.html');
    exit; // Terminar la ejecución del script después de redirigir
}
?>
