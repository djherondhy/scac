<?php
    include "connection.php";
       

    if($_POST['tabela'] == 'atividades'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = $con->prepare("DELETE FROM atividades WHERE id = $id");
        $sql->execute();

        if($sql->rowCount() >=1){
            echo json_encode('Deletado com Sucesso');
        }else{
            echo json_encode('Ocorreu erro');
        }
    }

    if($_POST['tabela'] == 'maquinas'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = $con->prepare("DELETE FROM maquinas WHERE id = $id");
        $sql->execute();

        if($sql->rowCount() >=1){
            echo json_encode('Deletado com Sucesso');
        }else{
            echo json_encode('Ocorreu erro');
        }
    }
    if($_POST['tabela'] == 'entrada_saida'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = $con->prepare("DELETE FROM entrada_saida WHERE id = $id");
        $sql->execute();

        if($sql->rowCount() >=1){
            echo json_encode('Deletado com Sucesso');
        }else{
            echo json_encode('Ocorreu erro');
        }
    }

    if($_POST['tabela'] == 'estoque'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = $con->prepare("DELETE FROM estoque WHERE id = $id");
        $sql->execute();

        if($sql->rowCount() >=1){
            echo json_encode('Deletado com Sucesso');
        }else{
            echo json_encode('Ocorreu erro');
        }
    }
    if($_POST['tabela'] == 'animal'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = $con->prepare("DELETE FROM animal WHERE id = $id");
        $sql->execute();

        if($sql->rowCount() >=1){
            echo json_encode('Deletado com Sucesso');
        }else{
            echo json_encode('Ocorreu erro');
        }
    }

    if($_POST['tabela'] == 'lembrete'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = $con->prepare("DELETE FROM lembrete WHERE id = $id");
        $sql->execute();

        if($sql->rowCount() >=1){
            echo json_encode('Deletado com Sucesso');
        }else{
            echo json_encode('Ocorreu erro');
        }
    }


?>
