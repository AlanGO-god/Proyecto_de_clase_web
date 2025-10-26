<?php 
include_once "sistema.php";
class Privilegio extends Sistema {

    function create($data){
        if($this -> validate($data)){
            $this -> connect();
            $this -> _DB -> beginTransaction();
            try {
                $sql = "INSERT INTO privilegio (privilegio) VALUES (:privilegio)";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":privilegio", $data['privilegio'], PDO::PARAM_STR);
                $sth -> execute();
                $rowsAffected = $sth->rowCount();
                $this -> _DB ->commit();
                return $rowsAffected;
            } catch (Exception $ex) {
                $this -> _DB ->rollback();
            }
        }
    }
    
    function read() {
        $this -> connect();
        $sth = $this -> _DB -> prepare("SELECT * FROM privilegio");
        $sth -> execute();
        $data = $sth -> fetchAll();
        return $data;
    }

    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("SELECT * FROM privilegio WHERE id_privilegio = :id_privilegio");
        $sth -> bindParam(":id_privilegio", $id, PDO::PARAM_INT);
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
                $sql = "UPDATE privilegio SET privilegio = :privilegio WHERE id_privilegio = :id_privilegio";
                $sth = $this->_DB->prepare($sql);
                $sth -> bindParam(":privilegio", $data['privilegio'], PDO::PARAM_STR);
                $sth -> bindParam(":id_privilegio", $id, PDO::PARAM_INT);
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
            $sql = "DELETE FROM privilegio WHERE id_privilegio = :id_privilegio";
            $sth = $this->_DB->prepare($sql);
            $sth -> bindParam(":id_privilegio", $id, PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth->rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
    }

    function validate($data){
        if (empty($data['privilegio'])) {
            return false;
        }
        return true;
    }
}
?>