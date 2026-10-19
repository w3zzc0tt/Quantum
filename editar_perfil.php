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
<html>
<head>
    <title>Quantum - Editar Perfil</title>
    <style>
        /* Estilos generales */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Estilos del encabezado */
        .perfil-usuario-header {
            background-color: #20507b;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .perfil-usuario-avatar{
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto;
        }
        .perfil-usuario-avatar img {
            width: 150px;
            height: 150px;
            object-fit: cover; /* Esto ajustará la imagen al contenedor sin distorsionarla */
            position: relative;
            border-radius: 50%;
        }

        /* Estilos del cuerpo */
        .perfil-usuario-bio {
            background-color: #fff;
            padding: 20px;
            margin-top: -50px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* Estilos del formulario */
        form {
            text-align: left;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
        }
        /* Estilo para el botón de selección de archivo */
        .form-group input[type="file"] {
            display: none; /* Oculta el campo de entrada de archivo original */
        }
        
        .form-group label {
            background-color: #20507b;
            color: #fff;
            padding: 10px 15px; /* Ajusta el espacio del botón (10px arriba/abajo y 15px izquierda/derecha) */
            border: none;
            border-radius: 5px 0 0 5px; /* Recorta el borde derecho del botón */
            font-size: 18px;
            cursor: pointer;
        }
        
        .form-group label:hover {
            background-color: #1b2530;
        }




        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Estilos del botón */
        .button {
            background-color: #1b2530;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #20507b;
        }

        /* Estilos de la lista de datos */
        .lista-datos {
            list-style-type: none;
            padding: 0;
        }

        .lista-datos li {
            margin-bottom: 10px;
        }

        /* Estilos del pie de página */
        .perfil-usuario-footer {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
<section class="seccion-perfil-usuario">
    <div class="perfil-usuario-header">
        <div class="perfil-usuario-portada">
            <div class="perfil-usuario-avatar">
                <img id="preview-image" class="img-responsive" src="<?php echo $registros['logo_url']; ?>" alt="img-avatar">
            </div>
        </div>
    </div>
    <div class="perfil-usuario-body">
        <form action="guardar_cambios.php" method="post" enctype="multipart/form-data">
            <div class="perfil-usuario-bio">
                <h3 class="titulo">Editar Perfil</h3>
                <p class="texto">
                    <label for="descripcion">Descripción:</label>
                    <textarea name="descripcion" id="descripcion"></textarea>
                </p>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <div class="form-group">
                        <label for="imagefile" class="custom-file-label">Seleccionar imagen de perfil</label>
                        <input type="file" name="imagefile" id="imagefile" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <li>
                        <label for="">ID de usuario:</label><span><?php echo $registros['id_user']; ?></span>

                    </li>
                    <li>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username">
                    </li>
                    <li>
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre">
                    </li>
                    <li>
                        <label for="apellido1">Primer apellido:</label>
                        <input type="text" name="apellido1" id="apellido1">
                    </li>
                    <li>
                        <label for="apellido2">Segundo apellido:</label>
                        <input type="text" name="apellido2" id="apellido2">
                    </li>
                </ul>
                <ul class="lista-datos">
                    <li>
                        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
                    </li>
                    <li>
                        <label for="intereses">Interesado/a en:</label>
                        <input type="text" name="intereses" id="intereses">
                    </li>
                </ul>
            </div>
            <div class="container" style="text-align: center; margin-top: 20px;">
                <button class="button" type="submit">Guardar cambios</button>
            </div>
        </form>
    </div>
</section>

<script>
    function previewImage(event) {
        const preview = document.getElementById('preview-image');
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>
