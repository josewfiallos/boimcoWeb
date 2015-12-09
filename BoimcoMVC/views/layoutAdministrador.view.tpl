<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width">
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:Bold">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:Thin">
    <script type="text/javascript" src="public/js/jquery-2.1.4.min.js"></script>
      <script type="text/javascript" src="public/js/boimcoAbout.js"></script>
    <script type="text/javascript" src="public/js/login.js"></script>
    <script type="text/javascript" src="public/js/validarTelefono.js"></script>
    <script type="text/javascript" src="public/js/validarTexto.js"></script>
  </head>
  <link rel="stylesheet" href="public/css/estilo1.css">
  <body>
        <!-- Login Starts Here -->
        <div id="loginContainer">
            <a href="#" id="loginButton"><span>{{userName}}</span><em></em></a>
            <form method="post">
              <button id="signOutButton" type="submit" name="btnSignOut">Sign Out</button>
            </form>
            <div style="clear:both"></div>
            <div id="loginBox">
                <form id="loginForm" method="post">
                    <fieldset id="body">
                      <a href="index.php?page=productosAdmin"><span>Mantenimiento de Productos</span></a>
                      <a href="index.php?page=usuarioAdmin"><span>Control de Usuarios</span></a>
                    </fieldset>
                </form>
            </div>
        </div>
        <!-- Login Ends Here -->
    <div class="HomeHeader">
          <div class="LogoHome"></div>
        <div class="Menu">
          <li><a href="index.php?page=home">Inicio</a></li>
          <li><a href="index.php?page=about">Sobre Nososotros</a></li>
          <li><a href="index.php?page=gallery">Galería</a></li>
          <li><a href="index.php?page=services">Servicios</a></li>
          <li><a href="index.php?page=productos">Productos</a></li>
          <li><a href="index.php?page=contactus">Contáctanos</a></li>
        </div>
    </div>
    <div class="contenido">
        {{{page_content}}}
    </div>
    <div class="Footer">
      <p>
        Derechos Reservados 2015, Creado por Estudiantes Portales Web
      </p>
      <a href="https://www.twitter.com"> <div class="Twitter"></div></a>
      <a href="https://www.facebook.com"><div class="Facebook"></div></a>
      <a href="https://www.googleplus.com"><div class="GooglePlus"></div></a>
    </div>
  </body>
</html>
