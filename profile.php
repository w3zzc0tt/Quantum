<?php
session_start();

if (!$_SESSION || empty($_SESSION['email'])) {
    // El usuario no está autenticado, o la variable de sesión 'email' está vacía
    // Puedes redirigir al usuario a la página de inicio de sesión u otra acción apropiada
    header("Location: index.html");
    exit();
}

require_once('conexion.php');

$email = $_SESSION['email'];
$query = "SELECT * FROM users WHERE email='$email'";
$result = mysqli_query($mysqli, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $registros = mysqli_fetch_assoc($result); // Obtener los datos del usuario
} else {
    // No se encontraron datos de usuario, puedes manejar esto de acuerdo a tu lógica
    // Por ejemplo, redirigir al usuario a una página de error
    header("Location: error.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quantum - Tu perfil</title>
    <link rel="stylesheet" href="styles/profile.css">
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" 
    crossorigin="anonymous"/>
</head>

<body>
    <section class="seccion-perfil-usuario">
        <!-- Resto de tu código -->
    </section>
</body>
    <section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img class="img-responsive" src="<?php echo $registros['logo_url']; ?>" alt="img-avatar">
                </div>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"></h3>
                <p class="texto"><span><?php echo $registros['descripcion']; ?></span></p> 
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li>ID de usuario: <span><?php echo $registros['id_user']; ?></span></li>
                    <li>Nombre de usuario: <span><?php echo $registros['user']; ?></span> </li>
                    <li>Nombre: <span><?php echo $registros['nombre']; ?></span></li>
                    <li>Primer apellido: <span><?php echo $registros['apellido1']; ?></span></li>
                    <li>Segundo apellido: <span><?php echo $registros['apellido2']; ?></span> </li>
                </ul>
                <ul class="lista-datos">
                    <li></i> Fecha de nacimiento: <span><?php echo $registros['fecha_nacimiento']; ?></span></li>
                    <li></i> Interesado/a en: <span><?php echo $registros['intereses']; ?></span></li>
                </ul>
            </div>
        </div>
        <div class="logout-container">
                <form action="logout.php" method="post">
                    <button class="logout-button">Cerrar Sesi&oacute;n</button>
                </form>
        </div>

        <div class="editarp_container">
            <form action="editar_perfil.php">
                <button class="editarp_button">Editar Perfil</button>
            </form>
        </div>
        
    </section>
</html>
