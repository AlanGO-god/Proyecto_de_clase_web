<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Sistema{
    var $_DNS = 'mysql:host=mariadb;dbname=database';
    var $_USER =  'user';
    var $_PASSWORD =  'password';
    var $_DB = null;
    function connect(){
        $this -> _DB = new PDO($this ->_DNS,$this ->_USER,$this ->_PASSWORD);
    }

    function cargarFotografia($carpeta, $nombre){
        $tipos = array("image/jpg", "image/jpeg", "image/png", "image/gif");
        if (isset($_FILES[$nombre])) {
            $imagen = $_FILES[$nombre];
            if ($imagen['error'] == 0) {
                if (in_array($imagen['type'], $tipos)) {
                    if ($imagen['size'] <= 1024000) { 
                        $n = rand(1, 1000000);
                        $extension = explode(".", $imagen['name']);
                        $extension = $extension[count($extension)-1];
                        $nombreArchivo = md5($imagen['name'].$imagen['size'].$n);
                        $nombreArchivo = $nombreArchivo."".$extension;
                        $imagen['name'] = $nombreArchivo;
                        $ruta = "../image/".$carpeta."/".$nombreArchivo;
                        if(!file_exists($ruta)){
                            if (move_uploaded_file($imagen['tmp_name'],$ruta)) {
                            return $nombreArchivo;
                            }
                        }
                                    
                    }
                }
            }
        }
        return null;
    }
    
    public function login($correo, $contrasena){
        //echo "Dentro del login";
        $contrasena = md5($contrasena);
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            //echo "Dentro del filtro";
            $this->connect();
            $sql = "SELECT * FROM usuario WHERE correo = :correo AND contrasena = :contrasena";
            $stml = $this->_DB->prepare($sql);
            $stml->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stml->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $stml->execute();
            $result = $stml->rowCount();
            if($result > 0){
                $_SESSION['validado'] = true;
                $_SESSION['correo'] = $correo;
                $roles = $this->getRoles($correo);
                $permisos = $this->getPermisos($correo);
                $_SESSION['rol'] = $roles;
                $_SESSION['privilegio'] = $permisos;
                return true;
            }
        }
    }

    public function logout(){
        unset($_SESSION);
        session_destroy();   
    }

    public function getRoles($correo){
        $roles = array();
        $this->connect();
        $sql = "SELECT r.rol FROM usuario u 
                JOIN usuario_rol ur ON u.id_usuario = ur.id_usuario
                JOIN rol r ON ur.id_rol = r.id_rol 
                WHERE u.correo = :correo";
        
        $stmt = $this->_DB->prepare($sql);
        $stmt->bindParam(":correo", $correo, PDO::PARAM_STR);
        
        if($stmt->execute()){
            // Usar fetchAll o while directo, NO desperdiciar la primera fila
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $roles[] = $row['rol'];
            }
        }
        
        return $roles;
    }

     public function getPermisos($correo){
        $permisos = array();
        $this->connect();
        $sql = "SELECT distinct p.privilegio FROM usuario u join usuario_rol ur on u.id_usuario = ur.id_usuario
                LEFT JOIN rol r on ur.id_rol = r.id_rol
                LEFT JOIN rol_privilegio rp on r.id_rol = rp.id_rol
                LEFT JOIN privilegio p on rp.id_privilegio = p.id_privilegio where u.correo = :correo";
        $stml = $this->_DB->prepare($sql);
        $stml->bindParam(":correo", $correo, PDO::PARAM_STR);
        $stml->execute();
        if($stml->rowCount() > 0){
            while($row = $stml->fetch(PDO::FETCH_ASSOC)){
                $permisos[] = $row['privilegio'];
            }   
        }
        return $permisos;
    }

     function checkRoll($rol){
        $roles = isset($_SESSION['rol']) ? $_SESSION['rol'] : array();
        if(!in_array($rol, $roles)){
            $alerta['mensaje'] = "Usted no tiene el rol adecuado";
            $alerta['tipo'] = "danger";
            include_once("./views/error.php");
            die();
        }
        return false;
    }

    public function enviarCorreo($para, $asunto, $cuerpo,$nombre = null){
        require '../vendor/autoload.php';
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->SMTPAuth = true;
        $mail->Username = '22030184@itcelaya.edu.mx';
        $mail->Password = '';
        $mail->setFrom('22030184@itcelaya.edu.mx', 'Alan Guiterrez Ortega');
        $mail->addAddress($para,$nombre ? $nombre : 'Red de Investigación');
        $mail->Subject = $asunto;
        $mail->msgHTML($cuerpo);
        if (!$mail->send()) {
            return false;
            } else {
            return true;
            }
    }

    public function cabiarContrasena($data){
        if(!filter_var($data['correo'], FILTER_VALIDATE_EMAIL)){
            return false;
        }
        $this -> connect();
        $token = bin2hex(random_bytes(16));
        $token = md5($token);
        $token = $token.md5("Cruz Azul Campion de America");
        $sql = "UPDATE usuario SET token = :token WHERE correo = :correo";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":token", $token, PDO::PARAM_STR);
        $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $resultado = $sth -> execute();
        if($sth -> rowCount()){
            $para = $data['correo'];
            $asunto = "Recuperación de contraseña - Red de Investigación";
            $mensaje = "Para recuperar su contraseña haga clic en el siguiente enlace: <br><br>
            <a href='http://localhost:8080/Panel/login.php?action=token&token=" .$token. "&correo=" .$data['correo']. "'>Recuperar contraseña</a><br>
            Atentamente Red de Investigación.";
            $mail = $this -> enviarCorreo($para, $asunto, $mensaje, null);
            return true;
        }else{
            return false;
        }        
    }

    public function restablecerContrasena($data){
        //echo "Dentro del restablecer";
        //echo $data['correo'];
        //echo $data['token'];
    
        $this -> connect();
        $sql = "SELECT * FROM usuario WHERE token = :token";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":token", $data['token'], PDO::PARAM_STR);
        $sth -> execute();
        if($sth -> rowCount() > 0){
            $contrasena = md5($data['contrasena']);
            $sql = "UPDATE usuario SET contrasena = :contrasena, token = null WHERE token = :token";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $sth -> bindParam(":token", $data['token'], PDO::PARAM_STR);
            $sth -> execute();
            if($sth -> rowCount() > 0){
                return true;
            }
        }
        return false;
    }
}
?>