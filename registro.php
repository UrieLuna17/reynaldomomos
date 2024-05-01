<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Conexion a base de datos
    $conn = new mysqli('localhost','root','','usuario');
    if($conn -> connect_error){
        echo "$conn->connect_error";
        die('Conexion fallida : '.$conn -> connect_error);
    } else {
        $stmt = $conn->prepare("insert into registrado(nombre, email, password) values(?,?,?)");
        $stmt->bind_param("sss", $nombre, $email, $password);
        $execval = $stmt->execute();
        if (!$execval) {
            echo "Error al registrar el usuario: " . $conn->error;
        } else {
            header('Location: registro_Exitoso.html');
            exit();
        }
        $stmt->close();
        $conn->close();
    }
?>
