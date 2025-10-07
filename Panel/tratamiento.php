<?php
require_once("../models/tratamiento.php");
$app = new Tratamiento();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data['tratamiento'] = $_POST['tratamiento'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "tratamiento dada de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "La tratamiento no fue dada de alta";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/tratamiento/index.php");
        }else{
            include_once("./views/tratamiento/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            $data['tratamiento'] = $_POST['tratamiento'];
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "tratamiento modificada correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "La tratamiento no fue modificada";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/tratamiento/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once(".Vviews/tratamiento/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "tratamiento eliminada correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alert.php");
            }else{
                $alerta['mensaje'] = "La tratamiento no eliminada";
                $alerta['tipo'] = "danger";
                include_once("./Views/alert.php");
            }
        }
        $data = $app -> read();
        include_once("./Views/tratamiento/index.php");
        break;
    
    case 'read':
    default:
        $data = $app -> read();
        include_once("./Views/tratamiento/index.php");
        break;
}
include_once("./Views/footer.php");
?>