<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerUsuario($userName){
        $usuario = array();
        $sqlstr = sprintf("SELECT * FROM usuarios where correoUsuario='%s';",$userName);

        $usuario = obtenerUnRegistro($sqlstr);
        return $usuario;
    }

    function insertUsuario($userName, $userEmail,
                           $timestamp, $password){
        $strsql = "INSERT INTO usuarios
                    (usuarioemail, usuarionom, usuariopwd,
                    usuarioest, usuariofching,  usuariolstlgn,
                    usuariofatm, usuariofchlp)
                   VALUES
                    ('%s', '%s','%s','ACT', FROM_UNIXTIME(%s) , null, 0, null);";
        $strsql = sprintf($strsql, valstr($userEmail),
                                    valstr($userName),
                                    $password,
                                    $timestamp);

        if(ejecutarNonQuery($strsql)){
            return getLastInserId();
        }
        return 0;
    }

    function obtenerCliente($idUsuario){
      $query=sprintf("SELECT * from clientes where idUsuario='%d';",$idUsuario);
      $cliente=obtenerUnRegistro($query);
      return $cliente;
    }

    function modificarCliente($registro,$idCliente){
      $query = "UPDATE clientes SET primerNombreCliente='%s', segundoNombreCliente='%s', primerApellidoCliente='%s', segundoApellidoCliente='%s', direccionCliente='%s',
      telefonoCliente='%d' WHERE idCliente='%d';";
      $query = sprintf($query,$registro["nuevoPrimerNombre"],$registro["nuevoSegundoNombre"],$registro["nuevoPrimerApellido"],$registro["nuevoSegundoApellido"],
      $registro["nuevaDireccion"],$registro["nuevoTelefono"],$idCliente);
      return ejecutarNonQuery($query);
    }

    function desavilitarUsuario($id){
      $estado="INA";
      $query = "UPDATE usuarios SET estadoUsuario='%s' WHERE idUsuario='%d';";
      $query = sprintf($query,$estado,$id);
      return ejecutarNonQuery($query);
    }
?>
