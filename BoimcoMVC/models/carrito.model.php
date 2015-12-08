<?php
require_once("libs/dao.php");

function mostrarCarretilla(){

  if(isset($_SESSION["userName"])){

    $correo= $_SESSION["userName"];
    $query = "SELECT idCarrito,imgProducto,idProductos,nombreProducto,cantidadProductos,precioProductos,cantidadProductos*precioProductos subtotal
    FROM carritos C JOIN productos p ON C.idProductos=p.idProducto WHERE idCorreo='". $correo."'";

  }

  $productos = array();

  $productos = obtenerRegistros($query);
  return $productos;
}

function eliminarProductoDeCarretilla($cod){
  $query ="SELECT * FROM carritos WHERE idCarrito = '%d';";
  $query= sprintf($query,$cod);
  $producto = obtenerUnRegistro($query);
  $query="DELETE FROM carritos WHERE idCarrito='%d';";
  $query= sprintf($query,$cod);
  if (ejecutarNonQuery($query)){
    $query= "UPDATE productos SET cantidadProducto=cantidadProducto + '%d' WHERE idProducto = '%d';";
    $query = sprintf($query, $producto["cantidadProductos"], $producto["idProductos"]);
  }

  if(ejecutarNonQuery($query)){
    return true;
  }else {
    return false;
  }
}

function borrarMiCarretilla($correo){
  $query = "DELETE FROM carritos WHERE idCorreo='%s';";
  $query = sprintf($query,$correo);
  ejecutarNonQuery($query);
}

function borrarMiCarretillaCompleta($correo,$productos){
  $query = "DELETE FROM carritos WHERE idCorreo='%s';";
  $query = sprintf($query,$correo);
  ejecutarNonQuery($query);

  foreach ($productos as $key => $value) {
    $query= "UPDATE productos SET cantidadProducto=cantidadProducto + '%d' WHERE idProducto = '%d';";
    $query = sprintf($query, $value["cantidadProductos"], $value["idProductos"]);
    ejecutarNonQuery($query);
  }

}

?>
