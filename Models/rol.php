<?php
include_once "sistema.php";
class Rol extends Sistema {
    function create ($data) {
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try{
            $sql = "INSERT INTO rol(rol) VALUES (:rol)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":rol", $data['rol'], PDO::PARAM_STR);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $this -> _DB -> commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB -> rollback();
        }
    }

    function read() {
        $this -> connect();
        $sth = $this -> _DB -> prepare("SELECT * FROM rol");
        $sth -> execute();
        $data = $sth -> fetchAll();
        return $data;
    }

    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("SELECT * FROM rol WHERE id_rol = :id_rol");
        $sth -> bindParam(":id_rol", $id, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($data, $id){
        if (!is_numeric($id)) {
            return null;
        }
        if($this -> validate($data)){
            $this -> connect();
            $this -> _DB -> beginTransaction();
            try {
                $sql = "UPDATE rol SET rol = :rol WHERE id_rol = :id_rol";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":rol", $data['rol'], PDO::PARAM_STR);
                $sth -> bindParam(":id_rol", $id, PDO::PARAM_INT);
                $sth -> execute();
                $rowsAffected = $sth->rowCount();
                $this -> _DB ->commit();
                return $rowsAffected;
            } catch (Exception $ex) {
                $this -> _DB ->rollback();
            }
        }
    }

    function delete($id){
        if (!is_numeric($id)) {
            return null;
        }
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "DELETE FROM rol WHERE id_rol = :id_rol";
            $sth = $this->_DB->prepare($sql);
            $sth -> bindParam(":id_rol", $id, PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth->rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
    }

    function validate($data){
        return true;
    }
}

?>