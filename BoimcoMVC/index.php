<?php

    session_start();

    require_once("libs/utilities.php");

    $pageRequest = "home";

    if(isset($_GET["page"])){
        $pageRequest = $_GET["page"];
    }

    //Incorporando los midlewares son codigos que se deben ejecutar
    //Siempre
    require_once("controllers/verificar.mw.php");
    require_once("controllers/site.mw.php");

    if(isset($_SESSION["userRol"])){
      mw_estaLogueado($_SESSION["userRol"]);
    }else{
      mw_estaLogueado("");
    }
    //Este switch se encarga de todo el enrutamiento

    switch($pageRequest){
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            break;
        case "about":
            require_once("controllers/about.control.php");
            break;
        case "services":
            require_once("controllers/services.control.php");
            break;
        case "gallery":
            require_once("controllers/gallery.control.php");
            break;
        case "contactus":
            require_once("controllers/contactus.control.php");
            break;
        case "registro":
            require_once("controllers/registro.control.php");
            break;
        case "productos":
            require_once("controllers/productos.control.php");
            break;
        case 'perfil':
            require_once("controllers/perfil.control.php");
          break;
        case 'carrito':
            require_once("controllers/carrito.control.php");
          break;
        case 'compras':
            require_once("controllers/compras.control.php");
          break;
        case 'productosAdmin':
            require_once("controllers/productosAdmin.control.php");
        break;
        case 'carritoVacio':
            require_once("controllers/carritoVacio.control.php");
        break;
        case 'facturar':
            require_once("controllers/facturar.control.php");
        break;
        case 'comprasDetalles':
            require_once("controllers/compras.control.php");
          break;
        case 'comprasVacia':
            require_once("controllers/comprasVacia.control.php");
          break;
        // case "althome":
        //     require_once("controllers/althome.control.php");
        //     break;
        // case "formulario":
        //     require_once("controllers/formulario.control.php");
        //     break;
        // case "mensajes":
        //     require_once("controllers/mensajes.control.php");
        //     break;
        default:
            require_once("controllers/error.control.php");

    }
?>
