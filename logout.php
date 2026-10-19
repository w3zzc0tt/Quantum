<?php
session_start(); // Iniciar la sesión

// Destruir la sesión actual
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a cualquier otra página
header("Location: index.html"); // Cambia esto a la página de inicio de sesión
exit();
?>
