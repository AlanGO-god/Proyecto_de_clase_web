<?php
include_once("./Views/header.php");
require_once("./Models/institucion.php");
$app = new Institucion;
$instituciones = $app -> read();
include_once("./Views/institucion/index.php");
include_once("./Views/footer.php");
?>