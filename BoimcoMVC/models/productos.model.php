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


function buscarTodoProducto($filtro){
  $producto= array();
  $selectQuery="SELECT * FROM productos where nombreProducto like '%$filtro%';";


  $producto= obtenerRegistros($selectQuery);
  return $producto;
}

function updateProducto($registro, $id){
  $query = "UPDATE productos SET nombreProducto='%s', precioUnitarioProducto='%d', cantidadProducto='%d', estadoProducto='%s' WHERE idProducto='%d';";
  $query = sprintf($query,$registro["modNombreProducto"],$registro["modPrecioProducto"],$registro["modCantidadProducto"],$registro["modEstadoProducto"],$id);
  return ejecutarNonQuery($query);
}

?>
