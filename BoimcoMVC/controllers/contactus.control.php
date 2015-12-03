<?php
/* Home Controller
 * 2014-10-14
 * Created By OJBA
 * Last Modification 2014-10-14 20:04
 */
  require_once("libs/template_engine.php");
    require_once("models/login.model.php");

  function run(){
    if (isset($_POST["btnLogin"])){
      $correo=$_POST['email'];
      $Contrasenia=$_POST['password'];
      if (compararDatos($correo,$Contrasenia)){
        $rol = obtenerRol($correo);
        mw_setEstaLogueado($correo,true,$rol);
          redirectWithMessage("Ingresando","index.php?page=contactus");
        }
        else{
          $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
          redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=contactus");
        }
      }

      if (isset($_POST["btnSignOut"])) {
        mw_setEstaLogueado("", false, "");
        redirectWithMessage("Saliendo","index.php?page=contactus");
      }
    renderizar("contactus",array());
  }


  run();
?>
