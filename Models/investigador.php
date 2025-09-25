<?php
require_once "sistema.php";

class Investigador extends Sistema{
    function create($data){
        return $rowsAffected;
    }

    function read() {
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from investigador");
        $sth -> execute();
        $data = $sth -> fetchAll();
        return $data;
    }
        
    function readOne($id){
        $this -> connect();
        $sth = $this -> _DB -> prepare("Select * from investigador 
        where id_investigador = :id_investigador");
        $sth -> bindParam(":id_investigador", $id, PDO::PARAM_INT);
        $sth -> execute();
        $data = $sth -> fetchAll();
        return $data;
    }

    function update($data, $id){
        return $rowsAffected;
    }

    function delete($id){
        
        return $rowsAffected;
    }
}
?>