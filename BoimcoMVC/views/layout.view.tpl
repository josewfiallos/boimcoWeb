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
    <script type="text/javascript" src="public/js/login.js"></script>
  </head>
  <link rel="stylesheet" href="public/css/estilo1.css">
  <body>
        <!-- Login Starts Here -->
        <div id="loginContainer">
            <a href="#" id="loginButton"><span>Log in</span><em></em></a>
            <a href="index.php?page=registro" id="signUpButton"><span>Sign Up</span><em></em></a>
            <div style="clear:both"></div>
            <div id="loginBox">
                <form id="loginForm">
                    <fieldset id="body">
                        <fieldset>
                            <label for="email">Correo Electronico</label>
                            <input type="email" name="email" id="email" />
                        </fieldset>
                        <fieldset>
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" />
                        </fieldset>
                        <input type="submit" id="login" value="Sign in" />
                    </fieldset>
                    <span><a href="#">Forgot your password?</a></span>
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
