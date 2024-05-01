<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['valid']) && isset($_SESSION['nombre']) && isset($_SESSION['ID'])) {
    // Obtener información del usuario de las variables de sesión
    $nombre = $_SESSION['nombre'];
    $email = $_SESSION['valid'];
    $PacienteID = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Cita - Nutriser</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="text"], input[type="email"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #016565;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #005151;
        }
        .navbar {
            background-color: #016565;
            overflow: hidden;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .navbar img {
            display: block;
            float: left;
            height: 50px;
            padding: 10px;
        }
        .navbar a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }
        .navbar a:hover {
            background-color: #005151;
        }
        select#medico {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px; /* Cambiar el tamaño del texto */
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="Inicio.html">Inicio</a>
        <a href="registro.html">Registro</a>
        <a href="agendar_cita.php">Agendar Cita</a>
        <a href="Expertos.html">Nuestros expertos destacados</a>
    </div>

<div class="container">
    <h1>Agendar Cita</h1>
    <img src="banner.png" alt="Nutriser Logo">
    <form action="agendar.php" method="post">
        <!-- Campo oculto para el ID del usuario -->
        <input type="hidden" name="PacienteID" value="<?php echo $PacienteID; ?>">
        <label for="email">Correo electrónico:</label>
        <!-- Mostrar el correo electrónico del usuario -->
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" readonly>
        
        <label for="fecha">Fecha de la cita:</label>
        <input type="date" class="form-control" id="fecha" name="fecha" required>
        
        <label for="medico">Selecciona un médico:</label>
        <select id="medico" name="medicoID"> <!-- Cambio de "medico" a "medicoID" -->
            <option value="1">Angel Quiñones</option>
            <option value="2">Uriel Luna</option>
            <option value="3">Adrian Gutierrez</option>
            <option value="4">Vivian Morales</option>
        </select>
        
        <input type="submit" value="Agendar Cita">
    </form>
</div>

</body>
</html>
<?php
} else {
    // Si el usuario no ha iniciado sesión, redirigir a la página de inicio de sesión
    header('Location: inicio_sesion.html');
    exit;
}
?>
