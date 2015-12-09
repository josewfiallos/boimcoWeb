<?php
require_once("libs/dao.php");

function obtenerProductosTodos(){
  $producto= array();
  $selectQuery="SELECT * FROM productos;";
  $producto= obtenerRegistros($selectQuery);
  return $producto;
}

function obtenerProductos(){
  $producto= array();
  $selectQuery="SELECT * FROM productos WHERE estadoProducto='ACT' AND cantidadProducto>0;";
  $producto= obtenerRegistros($selectQuery);
  return $producto;
}

function buscarProductos($filtro){
  $producto= array();
  $selectQuery="SELECT * FROM productos where nombreProducto like '%$filtro%' and estadoProducto='ACT' AND cantidadProducto>0;";


  $producto= obtenerRegistros($selectQuery);
  return $producto;
}

function insertarNuevoProducto($nuevoProducto){
  $query="INSERT INTO `productos` (`nombreProducto`, `precioUnitarioProducto`, `cantidadProducto`, `estadoProducto`, `imgProducto`)
   VALUES ('%s', '%f', '%d', '%s', '%s');";
  $query=sprintf($query,$nuevoProducto["nombre"], $nuevoProducto["precio"], $nuevoProducto["cantidad"], $nuevoProducto["estado"], $nuevoProducto["imagen"]);
  ejecutarNonQuery($query);
}

function buscarTodoProducto($filtro){
  $producto= array();
  $selectQuery="SELECT * FROM productos where nombreProducto like '%$filtro%';";


  $producto= obtenerRegistros($selectQuery);
  return $producto;
}

function updateProducto($registro, $id){
  $query = "UPDATE productos SET nombreProducto='%s', precioUnitarioProducto='%f', cantidadProducto='%d', estadoProducto='%s' WHERE idProducto='%d';";
  $query = sprintf($query,$registro["modNombreProducto"],$registro["modPrecioProducto"],$registro["modCantidadProducto"],$registro["modEstadoProducto"],$id);
  return ejecutarNonQuery($query);
}

function agregarACarretilla($prdcod,$cantidad){
  $producto=array();
  $consulta = "SELECT * FROM productos WHERE idProducto='%d';";
  $consulta = sprintf($consulta,$prdcod);
  $producto=obtenerUnRegistro($consulta);

  if($producto["cantidadProducto"]>=$cantidad){

  $user=$_SESSION["userName"];

  $consulta = "INSERT INTO `carritos` (`idCorreo`, `idProductos`, `cantidadProductos`, `precioProductos`, `fechaCarrito`) VALUES ('%s', '%d', '%d', '%f',NOW());";
  $consulta = sprintf($consulta,$user,
                      $producto["idProducto"],
                      $cantidad,
                      $producto["precioUnitarioProducto"]
                    );
  ejecutarNonQuery($consulta);
}else{
  redirectWithMessage("Error, No hay suficiente producto en existencia el maximo es de: {{cantidadProducto}}","index.php?page=productos");
}
}

function disminuirStock($prdcod, $cantidad){
  $query = "UPDATE productos set cantidadProducto=cantidadProducto-'%d' WHERE idProducto='%d';";
  $query= sprintf($query,$cantidad,$prdcod);
  ejecutarNonQuery($query);
}

?>
