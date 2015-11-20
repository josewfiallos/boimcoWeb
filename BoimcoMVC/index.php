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
    //Este switch se encarga de todo el enrutamiento

    switch($pageRequest){
        case "home":
            //llamar al controlador
            require_once("controllers/home.control.php");
            break;
        case "login":
            require_once("controllers/login.control.php");
            break;
        case "registro":
            require_once("controllers/registro.control.php");
            break;
        case "althome":
            require_once("controllers/althome.control.php");
            break;
        case "formulario":
            require_once("controllers/formulario.control.php");
            break;
        case "mensajes":
            require_once("controllers/mensajes.control.php");
            break;
        default:
            require_once("controllers/error.control.php");

    }
?>
