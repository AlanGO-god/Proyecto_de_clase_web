<?php
include_once("../Models/privilegio.php");
$app = new Privilegio();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data['privilegio'] = $_POST['privilegio'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Privilegio dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once("./views/alerta.php");
            }
            $data = $app -> read();
            include_once("./views/privilegio/index.php");
        }else{
            include_once("./views/privilegio/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            //var_dump($_POST);
            $data['privilegio'] = $_POST['privilegio'];
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "Privilegio modificado correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El privilegio no fue modificado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./views/privilegio/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./Views/privilegio/_form_update.php");
        }
        break;

    case 'delete': 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Privilegio eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El privilegio no eliminado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
        }
        $data = $app -> read();
        include_once("./views/privilegio/index.php");
        break;

        case 'read':
        default:
        $data = $app -> read();
        include_once("./views/privilegio/index.php");
        break;
}
include_once("./Views/footer.php"); 
?>