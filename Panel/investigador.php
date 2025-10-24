<?php
require_once("./Views/header.php");
require_once("../Models/investigador.php");
require_once("../Models/institucion.php");
require_once("../Models/tratamiento.php");
$app = new Investigador();
$appInstitucion = new Institucion();
$appTratamiento = new Tratamiento();
$instituciones = $appInstitucion -> read();
$tratamientos = $appTratamiento -> read();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./Views/header.php");
switch ($action) {
    case 'create':
        if (isset($_POST['enviar'])) {
            $data = $_POST
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Investigador dada de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El investigador no fue dada de alta";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./Views/investigador/index.php");
        }else{
            include_once("./Views/investigador/_form.php");
        }
        break;

    case 'update':
        //var_dump($_POST);
        if (isset($_POST['enviar'])) {
            //var_dump($_POST);
            $data = $_POST;
           
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "Tratamiento modificada correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El tratamiento no fue modificada";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./Views/investigador/index.php");
        }else{
            //var_dump($_GET);
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./Views/investigador/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Investigador eliminada correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El investigador no fue eliminado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
        }
        $data = $app -> read();
        include_once("./Views/investigador/index.php");
        break;
    
    case 'read':
    default:
        $data = $app -> read();
        include_once("./Views/investigador/index.php");
        break;
}
include_once("./Views/footer.php");
?>