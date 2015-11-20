<?php
/* Example Controller
     * 2015-10-14
     * Created By OJBA
     * Last Modification 2015-10-14 20:04
     */

      //Cargando Plantillero
      require_once("libs/template_engine.php");
      require_once("models/mensajes.model.php");
      function run(){
        /* require_once("models/entidad.model.php ") */


        /* Procesamiento */
        $mensajes_data = array();
        $mensajes =obtenerTodosMensajes();
        $mensajes_data["mensajes"] = $mensajes ;
        $mensajes_data["mensajescount"] = count($mensajes);
        
        renderizar("mensajes", $mensajes_data);
      }
      run();
?>
