<?php
  require_once("libs/template_engine.php");
  require_once("models/usuarios.model.php");
  require_once("models/validaciones.model.php");
  function run(){
    $cliente = array();

    $correo = $_SESSION["userName"];
    $usuario = obtenerUsuario($correo);
    $idUsuario = $usuario["idUsuario"];
    $cliente = obtenerCliente($idUsuario);
    $boolValidar = true;

    if (isset($_POST["btnDesactivar"])) {
        deshabilitarUsuario($idUsuario);
        mw_setEstaLogueado("", false, "");
        redirectWithMessage("Usuario Inhabilitado","index.php?page=home");
    }

    if (isset($_POST["btnSignOut"])) {
      mw_setEstaLogueado("", false, "");
      redirectToUrl("index.php?page=home");
    }

    if (isset($_POST["btnModificar"])) {

      if(!validar('nombre',$_POST["nuevoPrimerNombre"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Nombre ingresado con caracteres no permitidos');</script>";
      }
      if(!validar('nombre',$_POST["nuevoPrimerApellido"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Apellido ingresado con caracteres no permitidos');</script>";
      }
      if(!validar('numero',$_POST["nuevoTelefono"]) ) {
        $boolValidar=false;
        echo "<script>alert('Error! Teléfeno ingresado con caracteres no permitidos');</script>";
      }

      if ($boolValidar) {
        if (modificarCliente($_POST,$cliente["idCliente"])){
        redirectWithMessage("Perfil Actualizado","index.php?page=perfil");
        }

      }

} //if btnModificar
    renderizar("perfil",$cliente);
  }
  run();
?>
