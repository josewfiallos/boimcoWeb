<?php
require_once("libs/dao.php");

function mostrarCarretilla(){

  if(isset($_SESSION["userName"])){

    $correo= $_SESSION["userName"];
    $query = "SELECT imgProducto,idProductos,nombreProducto,cantidadProductos,precioProductos,cantidadProductos*precioProductos subtotal
    FROM carritos C JOIN productos p ON C.idProductos=p.idProducto WHERE idCorreo='". $correo."'";

  }else {
    $query = "SELECT imgProducto,idProductos,nombreProducto,precioProductos,cantidadProductos,precioProductos*cantidadProducts subtotal
    FROM carritos C JOIN productos p ON C.idProductos=p.idProducto WHERE idCorreo='". session_id()."'";
  }

  $productos = array();

  $productos = obtenerRegistros($query);
  return $productos;
}

?>
