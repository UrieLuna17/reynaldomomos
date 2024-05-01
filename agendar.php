<?php
// Obtener la información ingresada por el usuario desde el formulario
$email = $_POST['email'];
$fecha = $_POST['fecha'];
$medicoID = $_POST['medicoID']; // Cambio de "medico" a "medicoID"

// Conexión a la base de datos
$conn = new mysqli('localhost','root','','nutriser');

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener el ID del paciente usando el correo electrónico
$sql = "SELECT PacienteID FROM paciente WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Si se encuentra el paciente, obtener su ID
    $row = $result->fetch_assoc();
    $PacienteID = $row['PacienteID']; // Cambio de "ID" a "PacienteID"

    // Guardar la cita en la base de datos
    $sql_insert = "INSERT INTO cita (PacienteID, fecha, medicoID) VALUES ('$PacienteID', '$fecha', '$medicoID')"; // Cambio de "medico" a "medicoID"

    if ($conn->query($sql_insert) === TRUE) {
        header('Location: Agenda_Exitosa.html');
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
} else {
    echo "No se encontró ningún paciente con ese correo electrónico.";
}

// Cerrar la conexión
$conn->close();
?>
