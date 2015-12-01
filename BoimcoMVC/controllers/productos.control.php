<?php

  require_once("libs/template_engine.php");
  require_once("models/productos.model.php");


  function run(){
    $imagen = array();
    $filtro="";

//APLICAR FILTRO DE BUSQUEDAD CON BOTON!!
    if (isset($_POST["btnBuscar"])){
      $filtro = $_POST["txtBuscar"];
      $imagen = buscarProductos($filtro);

    }else {
      $imagen = obtenerProductos();
    }
//PASAR A DETALE PRODUCTO
    renderizar("productos",array("imagen"=> $imagen,"buscar"=>$filtro));
  }
  run();
?>
