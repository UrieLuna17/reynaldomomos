<?php
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //Conexion a base de datos
    $conn = new mysqli('localhost','root','','nutriser');

    $verify_query = mysqli_query($conn, "SELECT Email FROM paciente WHERE email = '$email'");
    if(mysqli_num_rows($verify_query) !=0 ){
        header('Location: correo_duplicado.html');
    }
    else
    {
        if($conn -> connect_error){
            echo "$conn->connect_error";
            die('Conexion fallida : '.$conn -> connect_error);
        } else {
            $stmt = $conn->prepare("insert into paciente(Nombre, email, password) values(?,?,?)");
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
    }
?>
