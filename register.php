<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // Verifica si el formulario se envió y los campos no están vacíos
    if (!empty($username) && !empty($email) && !empty($password)) {
        // Hash de la contraseña
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Realiza la inserción en la base de datos (asegúrate de tener una conexión a la base de datos configurada)
        $dbHost = "localhost";
        $dbUser = "root";
        $dbPassword = "";
        $dbName = "quantum";

        $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Consulta SQL para insertar la contraseña con hash
        $defaultProfileImage = "uploads/profile.png";

        $sql = "INSERT INTO users (user, email, user_password_hash, logo_url) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $email, $hashedPassword, $defaultProfileImage);
        if ($stmt->execute()) {
            // Registro con contraseña hasheada exitoso
            // Continuar con la siguiente consulta
        } else {
            echo "Error en la ejecución de la consulta: " . $stmt->error;
        }

        // Consulta SQL para insertar la contraseña normal
        $sql = "UPDATE users SET password= ? WHERE user = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $password, $username);

        if ($stmt->execute()) {
            $_SESSION['user_username'] = $username; // Establece el nombre de usuario en la sesión
            // Redirige al usuario al segundo formulario
            header("Location: register2.php");
        exit();
            exit();
        } else {
            echo "Error en la ejecución de la consulta: " . $stmt->error;
        }
        
        $stmt->close();
        $conn->close();
    } else {
        echo "Por favor, completa todos los campos.";
    }}
?>