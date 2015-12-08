<?php
require_once("libs/dao.php");
$time=time();

function verificarCorreo($correo){
  $query = "SELECT count(*)'contador' FROM usuarios WHERE correoUsuario='%s';";
  $query = sprintf($query,$correo);
  $resultado = obtenerUnRegistro($query);
  if($resultado['contador']>0){
    return true;
  }else {
    return false;
  }
}

function insertarUsuario($usuario){
  if($usuario && is_array($usuario)){
     $sqlInsert = "INSERT INTO usuarios(`contraseniaUsuario`,`correoUsuario`,`fechaIngresoUsuario`)VALUES('%s','%s', curdate());";
     $sqlInsert = sprintf($sqlInsert,
                    md5(valstr($usuario["passUsuario"])),
                    valstr($usuario["emailUsuario"])
                  );

     if(ejecutarNonQuery($sqlInsert)){
       return getLastInserId();
     }
  }
  return false;
}

function obtenerUsuario($correo){
  $query = "SELECT * FROM usuarios WHERE correoUsuario='%s';";
  $query = sprintf($query,$correo);
  $usuario = obtenerUnRegistro($query);

  return $usuario;
}

function insertarCliente($cliente, $id){
  if($cliente && is_array($cliente)){
     $sqlInsert = "INSERT INTO clientes(`idUsuario`,`primerNombreCliente`,`primerApellidoCliente`,`telefonoCliente`)VALUES('%d','%s','%s','%s');";
     $sqlInsert = sprintf($sqlInsert,
                    $id,
                    valstr($cliente["nombreUsuario"]),
                    valstr($cliente["apellidoUsuario"]),
                    valstr($cliente["telefonoUsuario"])
                  );

     if(ejecutarNonQuery($sqlInsert)){
       return getLastInserId();
     }
  }
  return false;
}
?>
