<?php
    require_once("libs/dao.php");

    function obtenerTodosMensajes(){
        $sqlstr = "Select * from mensajes;";
        return obtenerRegistros($sqlstr);
    }

    function obtenerMensajesConFiltro($contenido){
        $sqlstr = sprintf("select * from mensajes where msgdsc like '%s%'; "
                        , valstr($contenido));
        return obtenerRegistros($sqlstr);
    }

    function obtenerNumeroMensajes(){
        $sqlstr = "select count(*) as NumMensajes from mensajes;";
        return obtenerUnRegistro($sqlstr)["NumMensajes"];
    }



 ?>
