<?php
require_once("libs/template_engine.php");
require_once("models/registro.model.php");
  require_once("models/login.model.php");
//VALIDACIONES
//require_once("models/validaciones.model.php");

function run(){

  $htmlRegistro = array();
  $htmlRegistro["nombreUsuario"] = "";
  $htmlRegistro["apellidoUsuario"] = "";
  $htmlRegistro["emailUsuario"] = "";
  $htmlRegistro["telefonoUsuario"] = "";
  $htmlRegistro["passUsuario"] = "";
  $boolValidar=true;

  //AGREGAR SESIONES AQUI
  if (isset($_POST["btnRegistrarse"])){
      $lastID = insertarUsuario($_POST);
      $selUsuario = obtenerUsuario($_POST["emailUsuario"]);
      $lastID2 = insertarCliente($_POST, $selUsuario["idUsuario"]);
      if ($lastID) {
        redirectWithMessage("Usuario Registrado Correctamente","index.php?page=home");
      }
  }

  if (isset($_POST["btnLogin"])){
    $correo=$_POST['email'];
    $Contrasenia=$_POST['password'];
    if (compararDatos($correo,$Contrasenia)){
      $rol = obtenerRol($correo);
      mw_setEstaLogueado($correo,true,$rol);
        redirectWithMessage("Ingresando","index.php?page=registro");
  }
  else{
    $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
    redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=registro");
  }
}

if (isset($_POST["btnSignOut"])) {
  mw_setEstaLogueado("", false, "");
  redirectWithMessage("Saliendo","index.php?page=registro");
}

  renderizar("registro",$htmlRegistro);
}
run();
 ?>
