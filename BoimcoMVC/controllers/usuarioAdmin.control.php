<?php

  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");

  function run(){

    $usuarios=array();
    $usuarios=obtenerUsuarios();

    if (obtenerUsuarios()) {
      if (isset($_POST["btnCambiarEstado"])) {
        if ($_POST["estadoUsuario"]=='ACT') {
        deshabilitarUsuario($_POST["idUsuario"]);
        redirectToUrl("index.php?page=usuarioAdmin");
        }
        habilitarUsuario($_POST["idUsuario"]);
        redirectToUrl("index.php?page=usuarioAdmin");
      }

    }
    else {
      redirectToUrl("index.php?page=usuarioAdminVacio");
    }

    if (isset($_POST["btnSignOut"])) {
      mw_setEstaLogueado("", false, "");
    redirectToUrl("index.php?page=home");
    }

  renderizar("usuarioAdmin",array("usuarios"=>$usuarios));

  }
  run();
?>
