<?php
require_once("libs/template_engine.php");
require_once("models/registro.model.php");
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
      if ($lastID) {
        redirectWithMessage("Usuario Registrado Correctamente","index.php?page=home");
      }
  }


  renderizar("registro",$htmlRegistro);
}
run();
 ?>
