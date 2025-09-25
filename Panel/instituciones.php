<?php
include_once("./Views/header.php");
require_once("../models/institucion.php");
$app = new Institucion();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
switch ($action) {
    case 'create':
        if(isset($_POST['enviar'])){
            $data['institucion'] = $_POST['institucion'];
            $data['logotiopo'] = $_POST['logotipo'];
            $row = $app -> create($data);
            $data = $app -> read();
            include_once("./Views/institucion/index.php");
        }else{
            echo 'hola';
             include_once("./Views/institucion/_form.php");
        }
        break;

    case 'update':
       if(isset($_POST['enviar'])){
        $data['institucion'] = $_POST['institucion'];
        $data['logotipo'] = $_POST['logotipo'];
        $id = $_GET['id'];
        $row = $app -> update($data, $id);
        $data = $app -> read();
        include_once("./Views/institucion/index.php");
       }else{
        $id = $_GET['id'];
        $data = $app -> readOne($id);
        include_once("./Views/institucion/_form_update.php");
       }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
        }
        $data = $app -> read();
        include_once("./views/institucion/index.php");
        break;
    
    case 'read':
    default:
        $data = $app -> read();
        include_once("./views/institucion/index.php");
        break;
}
include_once("./views/footer.php");
?>
