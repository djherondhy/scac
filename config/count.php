<?php
    include "connection.php";
    include "functions/sql-functions.php";
    
    if($_POST['tabela'] == 'maquinas'){
        header('Content-Type: application/json');
       
         echo json_encode(countSelect($con,'maquinas'));
    }
    if($_POST['tabela'] == 'atividades'){
        header('Content-Type: application/json');
        echo json_encode(countSelect($con,'atividades'));
    }

    if($_POST['tabela'] == 'animal'){
        header('Content-Type: application/json');
        echo json_encode(countSelect($con,'animal'));
    }

    if($_POST['tabela'] == 'racao'){
        header('Content-Type: application/json');

      
        $sql = "SELECT * FROM estoque WHERE categoria LIKE '%Ração%' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo json_encode( $stmt->rowCount());
    }

    if($_POST['tabela'] == 'vacina'){
        header('Content-Type: application/json');

      
        $sql = "SELECT * FROM estoque WHERE categoria LIKE '%Vacina%' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo json_encode( $stmt->rowCount());
    }

    if($_POST['tabela'] == 'insumo'){
        header('Content-Type: application/json');

      
        $sql = "SELECT * FROM estoque WHERE categoria LIKE '%Insumo%' ";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo json_encode( $stmt->rowCount());
    }

    if($_POST['tabela'] == 'entrada'){
        header('Content-Type: application/json');

      
        $sql = "SELECT * FROM entrada_saida WHERE movimentacao LIKE '%Aquisição%' or movimentacao LIKE 'Tranferência - Entrada' or movimentacao LIKE 'Nascimento'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo json_encode( $stmt->rowCount());
    }

    if($_POST['tabela'] == 'saida'){
        header('Content-Type: application/json');

      
        $sql = "SELECT * FROM entrada_saida WHERE movimentacao LIKE '%Morte ou Abate%' or movimentacao LIKE 'Tranferência - Saída' or movimentacao LIKE 'Venda ou Negociação'";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo json_encode( $stmt->rowCount());
    }



?>