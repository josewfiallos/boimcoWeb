<?php
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  function run(){
    $cliente = array();

    $correo = $_SESSION["userName"];
    $usuario = obtenerUsuario($correo);
    $idUsuario = $usuario["idUsuario"];
    $cliente = obtenerCliente($idUsuario);

    if (isset($_POST["btnSignOut"])) {
      mw_setEstaLogueado("", false, "");
      redirectWithMessage("Saliendo","index.php?page=home");
    }

    if (isset($_POST["btnModificar"])) {
      //VALIDACIONES AQUI
      if (modificarCliente($_POST,$cliente["idCliente"])){
      redirectWithMessage("Perfil Actualizado","index.php?page=perfil");
      }
}
    renderizar("perfil",$cliente);
  }
  run();
?>
