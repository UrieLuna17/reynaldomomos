<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $fecha = $_POST['fecha'];

    //Conexion a base de datos
    $conn = new mysqli('localhost','root','','agenda');
    if($conn -> connect_error){
        echo "$conn->connect_error";
        die('Conexion fallida : '.$conn -> connect_error);
    } else {
        $stmt = $conn->prepare("insert into cita(nombre, email, fecha) values(?,?,?)");
        $stmt->bind_param("sss", $nombre, $email, $fecha);
        $execval = $stmt->execute();
        if (!$execval) {
            echo "Error al registrar la cita: " . $conn->error;
        } else {
            header('Location: confirmacion.html');
            exit();
        }
        $stmt->close();
        $conn->close();
    }
?>
