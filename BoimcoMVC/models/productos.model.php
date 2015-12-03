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

?>
