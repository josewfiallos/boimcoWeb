<?php

  require_once("libs/template_engine.php");
  require_once("models/carrito.model.php");
  require_once("models/login.model.php");

  function run(){

  if (isset($_POST["btnSignOut"])) {
    mw_setEstaLogueado("", false, "");
    redirectToUrl("index.php?page=home");
  }

    renderizar("carritoVacio",array());

  }
  run();
?>
