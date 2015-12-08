<?php

  require_once("libs/template_engine.php");
  require_once("models/carrito.model.php");
  require_once("models/login.model.php");

  function run(){

    if (isset($_POST["btnLogin"])){
      $correo=$_POST['email'];
      $Contrasenia=$_POST['password'];
      $estado=verificacionDeUsuario($correo);
      if ($estado=='ACT') {
        if (compararDatos($correo,$Contrasenia)){
          $rol = obtenerRol($correo);
          mw_setEstaLogueado($correo,true,$rol);
          if ($rol=='CLT') {
          redirectWithMessage("Ingresando","index.php?page=carrito");
          }
          else {
          redirectWithMessage("Ingresando","index.php?page=home");
          }
        }
        else{
          $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
          redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=carrito");
        }
      }
    else {
      $errores[] = array("errmsg"=>"Usuario Inactivo");
      redirectWithMessage("Su Cuenta de Usuario se encuentra Inactiva, Enviar mensaje para reactivacion de cuenta","index.php?page=contactus");
    }
  }

  if (isset($_POST["btnSignOut"])) {
    mw_setEstaLogueado("", false, "");
    redirectWithMessage("Saliendo","index.php?page=home");
  }

    renderizar("carritoVacio",array());

  }
  run();
?>
