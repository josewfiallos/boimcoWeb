<?php
require_once("libs/dao.php");

function insertarUsuario($usuario){
  if($usuario && is_array($usuario)){
     $sqlInsert = "INSERT INTO usuarios(`idUsuario`,`correoUsuario`,`contraseniaUsuario`,
     `nameUsuario`,`apellidoUsuario`,`telefonoUsuario`)VALUES('%s','%s','%s','%s','%s');";

     $sqlInsert = sprintf($sqlInsert,
                    valstr($usuario["emailUsuario"]),
                    md5(valstr($usuario["passUsuario"])),
                    valstr($usuario["nombreUsuario"]),
                    valstr($usuario["apellidoUsuario"]),
                    valstr($usuario["telefonoUsuario"])
                  );

     if(ejecutarNonQuery($sqlInsert)){
       return getLastInserId();
     }
  }
  return false;

}
?>
