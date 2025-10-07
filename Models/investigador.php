<?php
require_once "sistema.php";

class Investigador extends Sistema{
    function create($data){
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "INSERT into investigador(primer_apellido, segundo_apellido, nombre, fotografia, id_institucion, 
            semblance, id_tratamiento) VALUES (:primer_apellido, :segundo_apellido, :nombre, :fotografia, :id_institucion, 
            :semblance, :id_tratamiento)";
            $sth = $this -> _DB -> prepare($sql);
            $sth -> bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $sth -> bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
            $sth -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $sth -> bindParam(":fotografia", $data['fotografia'], PDO::PARAM_STR);
            $sth -> bindParam(":id_institucion", $data['id_institucion'], PDO::PARAM_INT);
            $sth -> bindParam(":semblance", $data['semblance'], PDO::PARAM_STR);
            $sth -> bindParam(":id_tratamiento", $data['id_tratamiento'], PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth -> rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
        }
        return null;
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
        if (!is_numeric($id)) {
            return null;
        }
        $this -> connect();
        $this -> _DB -> beginTransaction();
        try {
            $sql = "UPDATE investigador SET primer_apellido = :primer_apellido, 
            segundo_apellido = :segundo_apellido, nombre = :nombre, fotografia = :fotografia, id_institucion = :id_institucion, 
            semblance = :semblance, id_tratamiento = :id_tratamiento WHERE id_investigador = :id_investigador";
            $sth = $this->_DB->prepare($sql);
            $sth -> bindParam(":primer_apellido", $data['primer_apellido'], PDO::PARAM_STR);
            $sth -> bindParam(":segundo_apellido", $data['segundo_apellido'], PDO::PARAM_STR);
            $sth -> bindParam(":nombre", $data['nombre'], PDO::PARAM_STR);
            $sth -> bindParam(":fotografia", $data['fotografia'], PDO::PARAM_STR);
            $sth -> bindParam(":id_institucion", $data['id_institucion'], PDO::PARAM_INT);
            $sth -> bindParam(":semblance", $data['semblance'], PDO::PARAM_STR);
            $sth -> bindParam(":id_tratamiento", $data['id_tratamiento'], PDO::PARAM_INT);
            $sth -> bindParam(":id_investigador", $id, PDO::PARAM_INT);
            $sth -> execute();
            $rowsAffected = $sth->rowCount();
            $this -> _DB ->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this -> _DB ->rollback();
            echo "Error en update: " . $ex->getMessage();
        }
        return null;
    }

    function delete($id){
        if (!is_numeric($id)) {
            return null;
        }
        $this->connect();
        $this->_DB->beginTransaction();
        try {
            $sql = "DELETE FROM investigador WHERE id_investigador = :id_investigador";
            $sth = $this->_DB->prepare($sql);
            $sth->bindParam(":id_investigador", $id, PDO::PARAM_INT);
            $sth->execute();
            $rowsAffected = $sth->rowCount();
            $this->_DB->commit();
            return $rowsAffected;
        } catch (Exception $ex) {
            $this->_DB->rollback();
        }
        return null;
    }
}
?>