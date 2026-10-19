<?php
session_start(); // Iniciar la sesión

if (!empty($_POST['nombre']) && !empty($_POST['apellido1']) && !empty($_POST['apellido2']) 
    && !empty($_POST['descripcion']) && !empty($_POST['intereses']) && !empty($_POST['fecha_nacimiento'])) {
    
    require_once('conexion.php'); // Asegúrate de tener esta parte correctamente

    // Recupera el nombre de usuario de la sesión
    $username = $_SESSION['user_username'];

    // Resto del código sigue igual
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $descripcion = $_POST['descripcion'];
    $intereses = $_POST['intereses'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    
    // Consulta SQL para actualizar los datos del usuario basado en el nombre de usuario
    $sql = "UPDATE users SET nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', descripcion = '$descripcion', intereses = '$intereses', fecha_nacimiento = '$fecha_nacimiento' WHERE user = '$username'";
    $stmt = $mysqli->prepare($sql); // Utiliza la variable $mysqli aquí

    if ($stmt->execute()) {
        // Actualización exitosa
        echo '<script language=javascript>
        alert("Registro exitoso, recuerde su correo y contraseña para iniciar sesión");
        self.location="index.html";
        </script>';
        exit(); // Asegúrate de salir para evitar ejecución adicional del código
    } else {
        echo "Error en la ejecución de la consulta: " . $stmt->error;
    }
    

    $stmt->close();
} else {
    echo "Por favor, completa todos los campos.";
}

?>
