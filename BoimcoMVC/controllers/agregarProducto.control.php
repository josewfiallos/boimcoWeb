<?php

  require_once("libs/template_engine.php");
  require_once("models/productos.model.php");

  function run(){

    if (isset($_POST["btnAñadir"])) {
      if ($_POST["action"] == "upload"){
        $tamano = $_FILES["imgSelect"]['size'];
        $tipo = $_FILES["imgSelect"]['type'];
        $archivo = $_FILES["imgSelect"]['name'];
        $datos=array();
        $datos["nombre"]=$_POST["newNombreProducto"];
        $datos["precio"]=$_POST["newPrecioUnitarioProducto"];
        $datos["cantidad"]=$_POST["newCantidadProducto"];
        $datos["estado"]=$_POST["newEstadoProducto"];
        $datos["imagen"]="public/imgs/productos/$archivo";

        if ($archivo != "") {
          // guardamos el archivo a la carpeta files
          $destino =  "C:/wamp/www/Negocios Web/BoimcoMVC/public/imgs/productos/".$archivo;
          copy($_FILES['imgSelect']['tmp_name'],$destino);

          insertarNuevoProducto($datos);
          redirectWithMessage("Producto Ingresado Exitosamente","index.php?page=agregarProducto");

      }

      }
}

if (isset($_POST["btnSignOut"])) {
  mw_setEstaLogueado("", false, "");
  redirectToUrl("index.php?page=home");
}

  renderizar("agregarProducto",array());

  }
  run();
?>
