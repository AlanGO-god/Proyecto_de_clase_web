<?php
require_once("../models/investigador.php");
$app = new Investigador();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data['primer_apellido'] = $_POST['primer_apellido'];
            $data['segundo_apellido'] = $_POST['segundo_apellido'];
            $data['nombre'] = $_POST['nombre'];
            $data['fotografia'] = $_POST['fotografia'];
            $data['id_institucion'] = $_POST['id_institucion'];
            $data['semblance'] = $_POST['semblance'];
            $data['id_tratamiento'] = $_POST['id_tratamiento'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "investigador dada de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "La investigador no fue dada de alta";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
            $data = $app -> read();
            include_once("./views/investigador/index.php");
        }else{
            include_once("./views/investigador/_form.php");
        }
        break;

    case 'update':
        if (isset($_POST['enviar'])) {
            $data['primer_apellido'] = $_POST['primer_apellido'];
            $data['segundo_apellido'] = $_POST['segundo_apellido'];
            $data['nombre'] = $_POST['nombre'];
            $data['fotografia'] = $_POST['fotografia'];
            $data['id_institucion'] = $_POST['id_institucion'];
            $data['semblance'] = $_POST['semblance'];
            $data['id_tratamiento'] = $_POST['id_tratamiento'];
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
            include_once("./views/investigador/index.php");
        }else{
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./views/investigador/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "tratamiento eliminada correctamente";
                $alerta['tipo'] = "success";
                include_once("./views/alert.php");
            }else{
                $alerta['mensaje'] = "La tratamiento no eliminada";
                $alerta['tipo'] = "danger";
                include_once("./views/alert.php");
            }
        }
        $data = $app -> read();
        include_once("./views/investigador/index.php");
        break;
    
    case 'read':
    default:
        $data = $app -> read();
        include_once("./views/investigador/index.php");
        break;
}
include_once("./views/footer.php");
?>