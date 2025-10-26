<?php
include_once("sistema.php");

class Usuario extends Sistema {
    function create($data){
        $this -> connect();
        $sql = "INSERT INTO usuario(correo, contrasena) VALUES (:correo, :contrasena)";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $pwd = md5($data['contrasena']);
        $sth -> bindParam(":contrasena", $pwd, PDO::PARAM_STR);
        $sth -> execute();
        $rowsAffected = $sth -> rowCount();
        return $rowsAffected;
    }

    function read() {
        $this -> connect();
        $sth = $this -> _DB -> prepare("SELECT * FROM usuario");
        $sth -> execute();
        $data = $sth -> fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function readOne($id) {
        $this -> connect();
        $sth = $this -> _DB -> prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
        $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($data, $id) {
        $this -> connect();
        $sql = "UPDATE usuario SET correo = :correo, contrasena = :contrasena WHERE id_usuario = :id_usuario";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":correo", $data['correo'], PDO::PARAM_STR);
        $pwd = md5($data['contrasena']);
        $sth -> bindParam(":contrasena", $pwd, PDO::PARAM_STR);
        $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
        $sth -> execute();
        $rowsAffected = $sth -> rowCount();
        return $rowsAffected;
    }

    function delete($id) {
        $this -> connect();
        $sql = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
        $sth = $this -> _DB -> prepare($sql);
        $sth -> bindParam(":id_usuario", $id, PDO::PARAM_INT);
        $sth -> execute();
        $rowsAffected = $sth -> rowCount();
        return $rowsAffected;
    }
}
?>