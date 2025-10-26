<?php
include_once("../Models/rol.php");
$app = new Rol();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data['rol'] = $_POST['rol'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Rol dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El rol no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once("./views/alerta.php");
            }
            $data = $app -> read();
            include_once("./views/rol/index.php");
        }else{
            include_once("./views/rol/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            //var_dump($_POST);
            $data['rol'] = $_POST['rol'];
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "Rol modificado correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El rol no fue modificado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./views/rol/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./Views/rol/_form_update.php");
        }
        break;
    case 'delete': 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Rol eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El rol no eliminado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./views/rol/index.php");
        }
        break;
        case 'read':
    default:
        $data = $app -> read();
        include_once("./views/rol/index.php");
        break;
}
include_once("./views/footer.php");
 ?>