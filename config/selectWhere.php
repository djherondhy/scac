<?php
    include "connection.php";

    if($_POST['tabela'] == 'atividades'){
        header('Content-Type: application/json');
        $busca = $_POST['atvBusca'];
        $sql = "SELECT *from atividades WHERE descricao LIKE '%$busca%' or data LIKE '%$busca%'";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'maquinas'){
        header('Content-Type: application/json');
        $busca = $_POST['maquinasBusca'];
        $sql = "SELECT *from maquinas WHERE item LIKE '%$busca%' ";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'entrada_saida'){
        header('Content-Type: application/json');
        $busca = $_POST['entradaBusca'];
        $sql = "SELECT *from entrada_saida WHERE animal LIKE '%$busca%' or data like '%$busca%'";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'estoque'){
        header('Content-Type: application/json');
        $busca = $_POST['entradaBusca'];
        $sql = "SELECT *from estoque WHERE produto LIKE '%$busca%' or descricao like '%$busca%' or categoria like '%$busca%'";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Nenhum registro Encontrado');
        }
    }

    if($_POST['tabela'] == 'animal'){
        header('Content-Type: application/json');
        $busca = $_POST['entradaBusca'];
        $sql = "SELECT *from animal WHERE apelido LIKE '%$busca%' or nome_registro like '%$busca%' or categoria like '%$busca%' or numero_registro like '%$busca%'";
        $stmt = $con->prepare($sql);
        if($stmt->execute()){
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        
        }else{
            echo json_encode('Nenhum registro Encontrado');
        }
    }


?>