<?php

    function selectAll($table, $con,$column){
        $sql = $con->prepare("SELECT *from $table");
        $sql->execute();
        $row = $sql->fetch();
        echo $row[$column];
    }
    

    function sqlDelete($con,$table,$id,$urlHeader){
        $sql = $con->prepare("DELETE FROM $table WHERE id = $id");
        if($sql->execute()){
            header("Location: $urlHeader");
        }else{
            echo 'Erro';
        }
    }

    function selectWhere($con,$table,$id,$column){

        $sql = $con->prepare("SELECT *FROM $table WHERE id= $id");
        $sql->execute();
        $row = $sql->fetch();
        echo $row[$column];
    }

    function countSelect($con, $table){
        $sql = "SELECT * FROM $table";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        return $stmt->rowCount();
    }

    function countRow($con, $table,$column,$value){
        $sql = "SELECT * FROM $table WHERE $column LIKE '$value'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo $stmt->rowCount();
    }
    function selectUltimo($con,$table,$column){
        $sql = "select * from $table where id = (select max(id) from $table)";
        $ex = $con->prepare($sql);
        $ex->execute();
        $row = $ex->fetch();
        echo $row[$column];
    }
?>