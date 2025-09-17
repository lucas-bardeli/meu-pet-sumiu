<?php

if ($_GET) {
  // outras rotas

  $controle = $_GET["controle"];
  $metodo = $_GET["metodo"];

  require_once "Controllers/$controle.php";
  
  $obj = new $controle();
  $obj->$metodo();
}
else {
  // rota inicial
  require_once "Controllers/InicioController.php";
  
  $obj = new InicioController();
  $obj->inicio();
}

?>