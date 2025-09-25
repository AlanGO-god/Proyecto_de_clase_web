<?php
require_once();
$app = new Institucion("../models/institucion.php");
$action = isset($_GET['action'])? $_GET['action'] : 'read';
$data = array();
include_once("../views/header.php");
switch ($action){
    case 'create'
    case 'update'
    $data['institucion']= $_POST['institucion'];
    $data['logotipo'] = $_POST['logotipo'];
    $id =$_POST['id'];
    $row = $app -> update($data,$id);
    echo $row;
    break;

 case 'dalete':
    if(isset($_GET['id']))){
        $id = $_GET['id'];
        $row = $app -> update($id);
    }
    $data = $app -> read();
    include_once("../views/institucion/index.php")
    break;

 case 'read':
    default:
    $data = $app -> read();
    include_once("../views/institucion/index.php")
    break;
}
include_once("../views/footer.php");
?>