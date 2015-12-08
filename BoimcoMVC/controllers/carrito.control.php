<?php

  require_once("libs/template_engine.php");
  require_once("models/carrito.model.php");

  function run(){

    $productos =  array();

    $resultados= array();
    $resultado["subtotal"]="";
    $resultado["impuesto"]="";
    $resultado["total"]="";

   $productos = mostrarCarretilla();

    if (isset($_POST["btnSignOut"])) {
      mw_setEstaLogueado("", false, "");
      redirectWithMessage("Saliendo","index.php?page=home");
    }

    if($productos){
      foreach ($productos as $value) {
        $resultado["subtotal"]+= $value["cantidadProductos"]*$value["precioProductos"];
      }

        $resultado["impuesto"]=  number_format($resultado["subtotal"]*0.12, 2, '.', '');
      $resultado["total"]=number_format($resultado["subtotal"]+$resultado["impuesto"], 2, '.', '');
      $resultado["subtotal"]= number_format($resultado["subtotal"], 2, '.', '');
    }
    renderizar("carrito",array("productos" =>$productos,"subtotal"=>$resultado["subtotal"],"impuesto"=>$resultado["impuesto"],"total"=>$resultado["total"]));

  }
  run();
?>
