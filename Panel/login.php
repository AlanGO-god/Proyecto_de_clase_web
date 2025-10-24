<?php
require_once '../Models/sistema.php';
require_once './Views/login/header.php';
require_once './Views/login/_form.php';
$app = new Sistema();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
switch($action){
    case 'logout':
        $app -> logout();
        break;
    case 'login':
        var_dump($_POST);
        if(isset($_POST['enviar'])){
            var_dump($_POST);
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $login = $app -> login($correo, $contrasena);
            if($login){
                require_once("./instituciones.php");
            }else{
                $alert['mensaje'] = "Correo o contraseña incorrecta";
                $alert['tipo'] = "danger";
                require_once( '../views/login.php');
            }
        }
        break;
    default:
        break;
}
require_once( './Views/login/footer.php');
?>