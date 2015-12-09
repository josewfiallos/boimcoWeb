<?php
    //modelo de datos de productos
    require_once("libs/dao.php");

    function obtenerUsuario($userName){
        $usuario = array();
        $sqlstr = sprintf("SELECT * FROM usuarios where correoUsuario='%s';",$userName);

        $usuario = obtenerUnRegistro($sqlstr);
        return $usuario;
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

    function deshabilitarUsuario($id){
      $estado="INA";
      $query = "UPDATE usuarios SET estadoUsuario='%s' WHERE idUsuario='%d';";
      $query = sprintf($query,$estado,$id);
      return ejecutarNonQuery($query);
    }

    function habilitarUsuario($id){
      $estado="ACT";
      $query = "UPDATE usuarios SET estadoUsuario='%s' WHERE idUsuario='%d';";
      $query = sprintf($query,$estado,$id);
      return ejecutarNonQuery($query);
    }

    function obtenerUsuarios(){
      $usuarios= array();
      $selectQuery="SELECT U.idUsuario,primerNombreCliente, primerApellidoCliente, telefonoCliente,
                    correoUsuario, fechaIngresoUsuario, estadoUsuario FROM usuarios U JOIN
                    clientes C ON U.idUsuario=C.idUsuario;";
      $usuarios= obtenerRegistros($selectQuery);
      return $usuarios;
    }
?>
