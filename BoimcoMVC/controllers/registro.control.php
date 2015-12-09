<?php
require_once("libs/template_engine.php");
require_once("models/registro.model.php");
require_once("models/login.model.php");
require_once("models/validaciones.model.php");

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

    if (!verificarCorreo($_POST["emailUsuario"])) {
      if(!validar('email',$_POST["emailUsuario"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Ingrese correo correctamente, Ejemplo: correo@electroni.co');</script>";
    }
    if(!validar('nombre',$_POST["nombreUsuario"]) ) {
      $boolValidar=false;
      echo "<script>alert('Error! Nombre ingresado con caracteres no permitidos');</script>";
    }
    if(!validar('numero',$_POST["telefonoUsuario"]) ) {
      $boolValidar=false;

    }

    if ($boolValidar) {
      $lastID = insertarUsuario($_POST);
      $selUsuario = obtenerUsuario($_POST["emailUsuario"]);
      $lastID2 = insertarCliente($_POST, $selUsuario["idUsuario"]);
      if ($lastID) {
        redirectWithMessage("Usuario Registrado Correctamente","index.php?page=home");
      }
    } //if boolValidar

    else {
      $htmlRegistro["emailUsuario"]=$_POST["emailUsuario"];
      $htmlRegistro["nombreUsuario"]=$_POST["nombreUsuario"];
      $htmlRegistro["apellidoUsuario"]=$_POST["apellidoUsuario"];
      $htmlRegistro["telefonoUsuario"]=$_POST["telefonoUsuario"];
    }

    }// if verificarCorreo

    else{
      $htmlRegistro["nombreUsuario"]=$_POST["nombreUsuario"];
      $htmlRegistro["apellidoUsuario"]=$_POST["apellidoUsuario"];
      $htmlRegistro["telefonoUsuario"]=$_POST["telefonoUsuario"];
      echo "<script>alert('El correo electrónico ingresado ya existe.');</script>";
    }


  } // if registrarse


  if (isset($_POST["btnLogin"])){
    $correo=$_POST['email'];
    $Contrasenia=$_POST['password'];
    $estado=verificacionDeUsuario($correo);
    if ($estado=='ACT') {
      if (compararDatos($correo,$Contrasenia)){
        $rol = obtenerRol($correo);
        mw_setEstaLogueado($correo,true,$rol);
          redirectToUrl("index.php?page=home");
      }
      else{
        $errores[] = array("errmsg"=>"Usuario o Contraseña Incorrecta");
        redirectWithMessage("Error Usuario o Contraseña Incorrecta","index.php?page=home");
      }
    } // if verificacionDeUsuario
  else {
    $errores[] = array("errmsg"=>"Usuario Inactivo");
    redirectWithMessage("Su Cuenta de Usuario se encuentra Inactiva, Enviar mensaje para reactivacion de cuenta","index.php?page=contactus");
  }
} // if Login


  renderizar("registro",$htmlRegistro);
} //if function run
run();
 ?>
