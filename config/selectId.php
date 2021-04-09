<?php
    include "connection.php";

    if($_POST['tabela'] == 'atividades'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = "SELECT *from atividades WHERE id = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'maquinas'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = "SELECT *from maquinas WHERE id = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }
    if($_POST['tabela'] == 'estoque'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = "SELECT *from estoque WHERE id = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'animal'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = "SELECT *from animal WHERE id = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'login'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = "SELECT *from login WHERE id = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'entrada_saida'){
        header('Content-Type: application/json');
        $id = $_POST['id'];
        $sql = "SELECT *from entrada_saida WHERE id = $id";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

?>