<?php
require_once "sistema.php";

class Institucion extends Sistema{
    function create($data){
        
        $sql = "INSERT INTO  institucion (institucion,logotipo) VALUES(:institucion, :logotipo)";
         $this -> connect();
        $sth = $this-> _DB -> prepare($sql);
        $sth->bindParam(':institucion', $data['institucion'], PDO::PARAM_STR);  
        $sth->bindParam(':logotipo', $data['logotipo'], PDO::PARAM_STR);
        $sth->execute();
        return $sth->rowCount();

    }
    function read(){
        $this -> connect();
        $sth = $this-> _DB -> prepare("SELECT * FROM institucion");
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }
    function readOne($id){
        $this -> connect();
        $sth = $this-> _DB -> prepare("SELECT * FROM institucion
        where id_institucion = :id_institucion");
        $sth ->bindParam(":id_institucion", $id,PDO::PARAM_INT);
        $sth->execute();
        $data = $sth->fetchAll();
        return $data;
    }
    function update($data,$id){

        $this -> connect();
        $sql = "UPDATE institucion SET institucion = :institucion, logotipo = :logotipo WHERE id_institucion = :id_institucion";
        $sth = $this->_DB -> prepare($sql);
        $sth ->bindParam(":id_institucion", $id,PDO::PARAM_INT);
        $sth->bindParam(':institucion', $data['institucion'], PDO::PARAM_STR);  
        $sth->bindParam(':logotipo', $data['logotipo'], PDO::PARAM_STR);
        $sth->execute();
        return $sth->rowCount();
    }
    function delete($id){
        $this -> connect();
        $sql = "DELETE FROM institucion WHERE id_institucion = :id_institucion";
        $sth = $this->_DB -> prepare($sql);
        $sth ->bindParam(":id_institucion", $id,PDO::PARAM_INT);
        $sth->execute();
        return $sth->rowCount();
    }
}
?>