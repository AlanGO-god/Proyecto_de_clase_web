<?php
require_once "sistema.php";

class Institucion extends Sistema{
    function create($data){
        return $rowsAffected;
    }
    function read(){
        $this -> connect();
        $sth = $this-> _DB -> prepare("SELECT * FROM institutcion");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }
    function readOne($id){
        $this -> connect();
        $sth = $this-> _DB -> prepare("SELECT * FROM institutcion
        where id_institutcion = :id_institutcion");
        $sth ->bindParam(":id_institutcion", $id,PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }
    function update($data,$id){
        return $rowsAffected;
    }
    function delete($id){
        return $rowsAffected;
    }
}
?>