<?php
session_start();
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
        $contrasena = md5($contrasena);
        if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
            $this->connect();
            $sql = "SELECT * FROM usuario WHERE correo = :correo AND contrasena = :contrasena";
            $stml = $this->_DB->prepare($sql);
            $stml->bindParam(":correo", $correo, PDO::PARAM_STR);
            $stml->bindParam(":contrasena", $contrasena, PDO::PARAM_STR);
            $result =$stml->execute();
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
        session_start();
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
}
?>