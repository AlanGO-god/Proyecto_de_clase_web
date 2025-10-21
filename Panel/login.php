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
        if(isset($_POST['enviar'])){
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $login = $app -> login($correo, $contrasena);
            if($login){
                header("Location: ./panel/institucion.php");
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