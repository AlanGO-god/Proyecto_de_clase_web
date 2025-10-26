<?php
require_once("../Models/institucion.php");
$app = new Institucion();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./Views/header.php");
switch ($action) {
    case 'create':
         var_dump($_POST);
        if(isset($_POST['enviar']) ){
           
            $data['institucion'] = $_POST['institucion'];
            $data['logotiopo'] = $_POST['logotipo'];
            $row = $app -> create($data);
            if($row){
              $alerta['mensaje'] = "Institucion dad de alta correctamente";
              $alerta['tipo'] = "success";
              include_once("./Views/alerta.php");
            }else{
              $alerta['mensaje'] = "Error al dar de alta la institucion";
              $alerta['tipo'] = "danger";
              include_once("./Views/alerta.php");
            }
            $data = $app -> read();

            include_once("./Views/institucion/index.php");
        }else{ 
             include_once("./Views/institucion/_form.php");
        }
        break;

    case 'update':
       if(isset($_POST['enviar'])){
        //var_dump($_POST);
        $data['institucion'] = $_POST['institucion'];
        $data['logotipo'] = $_POST['logotipo'];
        $id = $_GET['id'];
        $row = $app -> update($data, $id);
        if($row){
            $alerta['mensaje'] = "Institucion actualizada correctamente";
            $alerta['tipo'] = "success";
            include_once("./Views/alerta.php");            
        }else{
            $alerta['mensaje'] = "Error al actualizar la institucion";
            $alerta['tipo'] = "danger";
            include_once("./Views/alerta.php");
            $data = $app -> read();
            include_once("./Views/institucion/index.php");
       }
       }else{
        $id = $_GET['id'];
        $data = $app -> readOne($id);
        include_once("./Views/institucion/_form_update.php");
       }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            //var_dump($_GET);
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if($row){
                $alerta['mensaje'] = "Institucion eliminada correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");  
            }else{
                $alerta['mensaje'] = "Error al eliminar la institucion";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");      
            }
        }
        $data = $app -> read();
        include_once("./Views/institucion/index.php");
        break;
    
    case 'read':
    default:
        $data = $app -> read();
        include_once("./Views/institucion/index.php");
        break;
}
include_once("./Views/footer.php");
?>
