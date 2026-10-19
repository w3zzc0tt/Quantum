<?php
session_start();
$username = $_SESSION['user_username']; // Recupera el nombre de usuario desde la sesión
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/registerpt2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Quantum - Registro</title>
</head>
<body>
    <div class="wrapper">
        <form action="registerpt2.php" method="post">
            <h1>Registro</h1>
            <input type="hidden" name="username" id="username" value="<?php echo $username; ?>">
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="nombre" id="nombre" 
                    placeholder="Nombre completo"required>
                </div>

                <div class="input-field">
                    <input type="text" name="apellido1" id="apellido1" 
                    placeholder="Primer apellido"required>
                </div>
            </div>
            
            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="apellido2" id="apellido2" 
                    placeholder="Segundo apellido"required>
                </div>

                <div class="input-field">
                    <input type="text" name="descripcion" id="descripcion" 
                    placeholder="Descripci&oacute;n"required>
                </div>  
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" name="intereses" id="intereses" 
                    placeholder="Intereses"required>
                </div>

                <div class="input-field">
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" 
                    placeholder="Fecha de nacimiento"required>
                </div>  
            </div>
            
            <label><input type="checkbox">Declaro que la informaci&oacute;n que
            ingres&eacute; en este formulario es ver&iacute;dica</label>

            <button type="submit" class="btn">Crear perfil</button>
        </form>
    </div>
</body>
</html>