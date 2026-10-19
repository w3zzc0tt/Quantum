<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conectar a la base de datos (MODIFICAR ESTO)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "quantum";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión a la base de datos
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtener el email del usuario desde la sesión
    $email = $_SESSION['email'];

    // Obtener los datos del formulario
    $descripcion = $_POST["descripcion"];
    $username = $_POST["username"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $intereses = $_POST["intereses"];
    
    // Procesar la imagen de perfil solo si se proporciona un archivo
    if ($_FILES["imagefile"]["error"] === 0) {
        $target_dir = "uploads/"; // Directorio donde se guardará la imagen en el directorio raíz
        $original_file_name = basename($_FILES["imagefile"]["name"]);
        
        // Obtener la extensión del archivo
        $file_extension = pathinfo($original_file_name, PATHINFO_EXTENSION);
        
        // Crear un nombre de archivo único utilizando una ID de usuario o un sello de tiempo
        $unique_file_name = $email . '_' . time() . '.' . $file_extension;
        
        $target_file = $target_dir . $unique_file_name;
        
        move_uploaded_file($_FILES["imagefile"]["tmp_name"], $target_file);
    }

    // Construir la consulta SQL dinámicamente
    $sql = "UPDATE users SET ";
    $updates = [];

    if (!empty($username)) {
        $updates[] = "user = '$username'";
    }
    if (!empty($nombre)) {
        $updates[] = "nombre = '$nombre'";
    }
    if (!empty($apellido1)) {
        $updates[] = "apellido1 = '$apellido1'";
    }
    if (!empty($apellido2)) {
        $updates[] = "apellido2 = '$apellido2'";
    }
    if (!empty($descripcion)) {
        $updates[] = "descripcion = '$descripcion'";
    }
    if (!empty($intereses)) {
        $updates[] = "intereses = '$intereses'";
    }
    if (!empty($fecha_nacimiento)) {
        $updates[] = "fecha_nacimiento = '$fecha_nacimiento'";
    }
    if (!empty($target_file)) {
        $updates[] = "logo_url = '$target_file'";
    }

    if (!empty($updates)) {
        $sql .= implode(", ", $updates);
        $sql .= " WHERE email = '$email'";
        
        if ($conn->query($sql) === TRUE) {
            echo '<script language=javascript>
                alert("Los datos se actualizaron correctamente.");
                self.location="profile.php";
            </script>';
        } else {
            echo "Error al actualizar los datos: " . $conn->error;
        }
    } else {
        echo "No se proporcionaron datos para actualizar.";
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>
