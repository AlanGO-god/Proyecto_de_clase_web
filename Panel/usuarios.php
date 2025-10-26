<?php 
require_once("../Models/usuario.php");
$app = new Usuario();
$action = isset($_GET['action']) ? $_GET['action'] : 'read';
$data = array();
include_once("./Views/header.php");
switch ($action) {
    case 'create':
        //echo 'prueba';
        if (isset($_POST['enviar'])) {
            $data['correo'] = $_POST['correo'];
            $data['contrasena'] = $_POST['contrasena'];
            $row = $app -> create($data);
            if ($row){
                $alerta['mensaje'] = "Usuario dado de alta correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue dado de alta";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./Views/usuario/index.php");
        }else{
            include_once("./Views/usuario/_form.php");
        }
        break;

    case 'update':
        //var_dump($_POST);
        if (isset($_POST['enviar'])) {
            $data['correo'] = $_POST['correo'];
            $data['contrasena'] = $_POST['contrasena'];
            $id = $_GET['id'];
            $row = $app -> update($data, $id); 
            if ($row){
                $alerta['mensaje'] = "Usuario modificado correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue modificado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
            $data = $app -> read();
            include_once("./Views/usuario/index.php");
        }else{
            //var_dump($_GET);
            $id = $_GET['id'];
            $data = $app -> readOne($id);
            include_once("./Views/usuario/_form_update.php");
        }
        break;

    case 'delete':
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $row = $app -> delete($id);
            if ($row){
                $alerta['mensaje'] = "Usuario eliminado correctamente";
                $alerta['tipo'] = "success";
                include_once("./Views/alerta.php");
            }else{
                $alerta['mensaje'] = "El usuario no fue eliminado";
                $alerta['tipo'] = "danger";
                include_once("./Views/alerta.php");
            }
        }

        case 'read':
            default:
            $data = $app -> read();
            include_once("./Views/usuario/index.php");
            break;
}
include_once("./Views/footer.php");
?>