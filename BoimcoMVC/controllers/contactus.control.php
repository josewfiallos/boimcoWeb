<?php
  require_once("libs/template_engine.php");
  require_once("models/login.model.php");
  require_once("models/validaciones.model.php");

  function run(){

    $htmlContacto = array();
    $htmlContacto["txtName"] = "";
    $htmlContacto["txtEmail"] = "";
    $htmlContacto["txtTel"] = "";
    $htmlContacto["txtMsg"] = "";
    $boolValidar = true;

    if (isset($_POST["btnEnviar"])) {

      if(!validar('email',$_POST["txtEmail"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Ingrese correo correctamente, Ejemplo: correo@electroni.co');</script>";
    }
      if(!validar('nombre',$_POST["txtName"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Nombre ingresado con caracteres no permitidos');</script>";
      }
      if(!validar('numero',$_POST["txtTel"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Teléfeno ingresado con caracteres no permitidos');</script>";
      }

      if ($boolValidar) {
        redirectWithMessage("¡Gracias por sus comentarios! Su mensaje ha sido enviado correctamente","index.php?page=home");
      }


    }//IF Enviar




    if (isset($_POST["btnLogin"])){
      $correo=$_POST['email'];
      $Contrasenia=$_POST['password'];
      $estado=verificacionDeUsuario($correo);
      if ($estado=='ACT') {
        if (compararDatos($correo,$Contrasenia)){
          $rol = obtenerRol($correo);
          mw_setEstaLogueado($correo,true,$rol);
            redirectToUrl("index.php?page=contactus");
        }
        else{
          $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
          redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=contactus");
        }
      }
    else {
      $errores[] = array("errmsg"=>"Usuario Inactivo");
      redirectWithMessage("Su Cuenta de Usuario se encuentra Inactiva, Enviar mensaje para reactivacion de cuenta","index.php?page=contactus");
    }
      }

      if (isset($_POST["btnSignOut"])) {
        mw_setEstaLogueado("", false, "");
        redirectToUrl("index.php?page=contactus");
      }
    renderizar("contactus",array());
  } // if function run
  run();
?>
