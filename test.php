<?php
require_once 'models/sistema.php';
$sistema = new Sistema();
$login = $sistema -> login("luislao@itecelaya.edu.mx", "123 ");
var_dump($login);
print_r($_SESSION);
?>