<?php
session_start();
if (!isset($_SESSION['user_username'])) {
    echo '<script language="javascript">
    alert("Usuario no autenticado");
    self.location = "index.html";
    </script>';
}
$username = $_SESSION['user_username']; // Recupera el nombre de usuario desde la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <link rel="stylesheet" href="styles/home.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans&family=Quicksand&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Quantum</title>
</head>

<body>
  <header>
    <nav class="nav">
      <div class="logo" href="home.php">Quantum</div>
      <ul class="menu">
        <li><a href="home.php">Home</a></li>
        <li><a href="about-us.html">Sobre Quantum</a></li>
        <li><a href="contacto.html">Cont&aacute;ctanos</a></li>
        <li><a href="faq.html">FAQ</a></li>
        <li><a href="profile.php" class="welcome-message">Bienvenido,
            <?php echo $username; ?>
          </a></li>
      </ul>
    </nav>
  </header>
  <div class="content">
    <section id="blog">
      <!--blog-heading--------------->
      <div class="blog-heading">
        <h3>Espacios</h3>
      </div>


      <!--container---------------->
      <div class="blog-container">

        <!--box-1------------->
        <div class="blog-box">

          <!--img---->
          <div class="blog-img">
            <img alt="blog" src="src/math-space.jpg">
          </div>
          <!--text--->
          <div class="blog-text">
            <span>Creador del espacio: Jose Pablo</span>
            <a href="#" class="blog-title">Matem&aacute;ticas</a>
            <p>Espacio dedicado meramente a las matem&aacute;ticas,
              para personas interesadas en esta &aacute;rea.
            </p>
            <a class="button" href="math.html">Entrar</a>
          </div>

        </div>

        <!--box-2------------->
        <div class="blog-box">

          <!--img---->
          <div class="blog-img">
            <img alt="blog" src="src/astrophysics-space.jpg">
          </div>
          <!--text--->
          <div class="blog-text">
            <span>Creador del espacio: Jose Pablo</span>
            <a href="#" class="blog-title">F&iacute;sica</a>
            <p>Enfocado en las leyes de la naturaleza del mundo y el espacio,
              tambi&eacute;n hay un espacio dedicado a la F&iacute;sica. </p>
            <a class="button" href="physics.html">Entrar</a>
          </div>

        </div>

        <!--box-3------------->
        <div class="blog-box">

          <!--img---->
          <div class="blog-img">
            <img alt="blog" src="src/astronomy-space.jpg">
          </div>
          <!--text--->
          <div class="blog-text">
            <span>Creador del espacio: Jose Pablo</span>
            <a href="#" class="blog-title">Astronom&iacute;a</a>
            <p>Si te gustan las estrellas o cuerpos celestes, este espacio es el indicado para usted.</p>
            <a class="button" href="astronomy.html">Entrar</a>
          </div>

        </div>
        <!--box-4------------->
        <div class="blog-box">

          <!--img---->
          <div class="blog-img">
            <img alt="blog" src="src/chemistry-space.jpg">
          </div>
          <!--text--->
          <div class="blog-text">
            <span>Creador del espacio: Jose Pablo</span>
            <a href="#" class="blog-title">Qu&iacute;mica</a>
            <p>Para los amantes de compuestos y de reacciones qu&iacute;micas
              (Y fans de Breaking Bad)</p>
            <a class="button" href="chemistry.html">Entrar</a>
          </div>

        </div>

      </div>

    </section>
  </div>

  <script>
    const nav = document.querySelector('.nav');
    window.addEventListener('scroll', function () {
      nav.classList.toggle('active', window.scrollY > 0);
    });
  </script>
</body>

</html>