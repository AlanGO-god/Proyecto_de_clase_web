<?php
require_once '../Models/sistema.php';

$app = new Sistema();
$action = isset($_GET['action']) ? $_GET['action'] : 'login';
switch($action){
    case 'logout':
        $app -> logout();
        break;
    case 'login':
        //var_dump($_POST);
        if(isset($_POST['enviar'])){
            //var_dump($_POST);
            $correo = $_POST['correo'];
            $contrasena = $_POST['contrasena'];
            $login = $app -> login($correo, $contrasena);
            //echo 'Entre al login';
            if($login){
                //echo "Login exitoso";
                header("Location: index.php");
            }else{
                $alert['mensaje'] = "Correo o contraseña incorrecta";
                $alert['tipo'] = "danger";
                require_once( './Views/login/header.php');
                include_once("./views/alerta.php");
                require_once( './Views/login/login.php');
                require_once( './Views/login/footer.php');
            }
        } else {
            require_once( './Views/login/header.php');
            require_once( './Views/login/login.php');
            require_once( './Views/login/footer.php');
        }
        break;
        
        case 'logout':
        $app->logout();
        $alerta['mensaje'] = "Usted ha salido exitosamente del sistema";
            $alerta['tipo'] = "success";
            include_once("./views/alert.php");
            require_once './Views/login/header.php';
            require_once './Views/login/login.php';
            require_once( './Views/login/footer.php');
        break;

    default:
        break;

    case 'recuperar':
        require_once( './Views/login/recuperar.php');
        break;

    case 'cambio':
        $data = $_POST;
        $cambio= $app -> cabiarContrasena($data);
        if($cambio){
            $alert['mensaje'] = "Se ha enviado un correo con la nueva contraseña";
            $alert['tipo'] = "success";
            }else{
            $alert['mensaje'] = "El correo no existe en el sistema";
            $alert['tipo'] = "danger";
        }

    case 'token':
        require_once( './Views/login/token.php');
        break;

    case 'restablecer':
        $data = $_POST;
        //echo "Dentro del restablecer";
        //echo $data['correo'];
        //echo $data['token'];
        $restablecer= $app -> restablecerContrasena($data);
        if($restablecer){
            $alert['mensaje'] = "Se ha restablecido la contraseña correctamente";
            $alert['tipo'] = "success";
            }else{
            $alert['mensaje'] = "No se pudo restablecer la contraseña, el token es incorrecto o ya fue utilizado";
            $alert['tipo'] = "danger";
        }
        break;

}

?>