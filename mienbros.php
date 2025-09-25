<?php
include_once("./Views/header.php");
require_once("./Models/investigador.php");
$app = new Investigador();
$investigadores = $app -> read();
include_once("./Views/mienbros/index.php");
include_once("./Views/footer.php");