<?php
if (!empty($_POST['email']) && !empty($_POST['password'])) {
    require_once('conexion.php');
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta SQL para obtener el nombre de usuario correspondiente al correo y contraseña proporcionados
    $consulta = "SELECT user FROM users WHERE email = ? AND password = ?";
    
    // Usar consultas preparadas para prevenir la inyección SQL
    $stmt = $mysqli->prepare($consulta);
    $stmt->bind_param("ss", $email, $password);
    
    if ($stmt->execute()) {
        $stmt->store_result();

        // Verificar si se encontraron resultados
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($username);
            $stmt->fetch();
            session_start();
            $_SESSION['email'] = $email; // Establecer el correo electrónico en la sesión
            $_SESSION['user_username'] = $username; // Establecer el nombre de usuario en la sesión
            header("Location: home.php"); // Redirigir al usuario a la página de inicio
            exit(); // Asegúrate de salir después de redirigir para evitar ejecución adicional
        } else {
            echo '<script language=javascript>
                alert("Contraseña incorrecta o usuario no identificado");
                self.location="index.html";
            </script>';
        }
    } else {
        echo '<script language=javascript>
            alert("Error en la consulta SQL");
            self.location="index.html";
        </script>';
    }
} else {
    echo '<script language=javascript>
        alert("Debe llenar todos los campos");
        self.location="index.html";
    </script>';
}
?>
