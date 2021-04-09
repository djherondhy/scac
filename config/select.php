<?php
    include "connection.php";



    if($_POST['tabela'] == 'maquinas'){
    header('Content-Type: application/json');
    $sql = $con->prepare("SELECT *FROM maquinas");   

    if($sql->execute()){
        echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
    }else{
        echo json_encode('Ocorreu um erro ao buscar os dados');
    }
    }

   

    if($_POST['tabela'] == 'atividades'){
        header('Content-Type: application/json');
        $sql = $con->prepare("SELECT *FROM atividades");   
        
        if($sql->execute()){
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'propriedade'){
        header('Content-Type: application/json');
        $sql = $con->prepare("SELECT *FROM propriedade where id = 1");   
        
        if($sql->execute()){
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }

    if($_POST['tabela'] == 'entrada_saida'){
        header('Content-Type: application/json');
        $sql = $con->prepare("SELECT *FROM entrada_saida");   
        
        if($sql->execute()){
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }
    if($_POST['tabela'] == 'estoque'){
        header('Content-Type: application/json');
        $sql = $con->prepare("SELECT *FROM estoque");   
        
        if($sql->execute()){
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }
    if($_POST['tabela'] == 'animal'){
        header('Content-Type: application/json');
        $sql = $con->prepare("SELECT *FROM animal");   
        
        if($sql->execute()){
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
    }
    
    if($_POST['tabela'] == 'login'){
        header('Content-Type: application/json');
        $sql = $con->prepare("SELECT *FROM login");   
    
        if($sql->execute()){
            echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
        }else{
            echo json_encode('Ocorreu um erro ao buscar os dados');
        }
        }

        if($_POST['tabela'] == 'lembrete'){
            header('Content-Type: application/json');
            $sql = $con->prepare("SELECT *FROM lembrete");   
        
            if($sql->execute()){
                echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));
            }else{
                echo json_encode('Ocorreu um erro ao buscar os dados');
            }
            }



?>