<?php
require_once("libs/dao.php");

function obtenerRol($correo){
  $query = "SELECT idRol FROM usuarios WHERE correoUsuario='%s';";
  $query = sprintf($query,$correo);
  $usuario= obtenerUnRegistro($query);

  return $usuario["idRol"];
}

function verificacionDeUsuario($correo){
  $query = "SELECT estadoUsuario from usuarios where correoUsuario='$correo';";
  $usuario = obtenerUnRegistro($query);
  return $usuario["estadoUsuario"];
}

function compararDatos($correo,$contrasenia){
    $datos = array();
    $selectQuery = "SELECT contraseniaUsuario from usuarios where correoUsuario='$correo';";
    $datos = obtenerUnRegistro($selectQuery);
    if(isset($datos['contraseniaUsuario'])){
      $contrasenia=md5($contrasenia);
    if($contrasenia==$datos['contraseniaUsuario']){
      return true;
    }else{
      return false;
    }
  }else{
    return false;
  }

}

?>
