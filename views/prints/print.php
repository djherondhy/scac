<?php
    include "../../config/connection.php";
    



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../pluguins/bootstrap/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <br>
        <br>
        <button type="button" class="btn btn-light mb-3" onclick="window.print()">Imprimir</button>
        

        <?php
            if(isset($_GET['table'])){
                if($_GET['table']=='atividades'){
                $sql = "SELECT *from atividades";
                $ex = $con->prepare($sql);
                $ex->execute();

                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">#</th>';
                echo '<th scope="col">Data</th>';
                echo '<th scope="col">Descricao</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while($row = $ex->fetch(PDO::FETCH_ASSOC)){
               
                echo '<tr>';
                echo '<th scope="row">'.$row['id'].'</th>';
                echo '<td>'.$row['data'].'</td>';
                echo '<td>'.$row['descricao'].'</td>';
                echo '</tr>';
                

                }
                echo '</tbody>';
                echo '</table>';

                }
                

                if($_GET['table']=='maquinas'){
                    $sql = "SELECT *from maquinas";
                    $ex = $con->prepare($sql);
                    $ex->execute();
    
                    echo '<table class="table table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">#</th>';
                    echo '<th scope="col">Descricao</th>';
                    echo '<th scope="col">Valor</th>';
                    echo '<th scope="col">Vida Util</th>';
                    echo '<th scope="col">Ano de Compra</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
    
                    while($row = $ex->fetch(PDO::FETCH_ASSOC)){
                   
                    echo '<tr>';
                    echo '<th scope="row">'.$row['id'].'</th>';
                    echo '<td>'.$row['item'].'</td>';
                    echo '<td>'.$row['valor'].'</td>';
                    echo '<td>'.$row['vida_util'].'</td>';
                    echo '<td>'.$row['ano_compra'].'</td>';
                    echo '</tr>';
                    
    
                    }
                    echo '</tbody>';
                    echo '</table>';
    
                    }

                     if($_GET['table']=='maquinas'){
                    $sql = "SELECT *from maquinas";
                    $ex = $con->prepare($sql);
                    $ex->execute();
    
                    echo '<table class="table table-bordered">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">#</th>';
                    echo '<th scope="col">Descricao</th>';
                    echo '<th scope="col">Valor</th>';
                    echo '<th scope="col">Vida Util</th>';
                    echo '<th scope="col">Ano de Compra</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
    
                    while($row = $ex->fetch(PDO::FETCH_ASSOC)){
                   
                    echo '<tr>';
                    echo '<th scope="row">'.$row['id'].'</th>';
                    echo '<td>'.$row['item'].'</td>';
                    echo '<td>'.$row['valor'].'</td>';
                    echo '<td>'.$row['vida_util'].'</td>';
                    echo '<td>'.$row['ano_compra'].'</td>';
                    echo '</tr>';
                    
    
                    }
                    echo '</tbody>';
                    echo '</table>';
    
                    }
                    
                    if($_GET['table']=='estoque'){
                        $sql = "SELECT *from estoque";
                        $ex = $con->prepare($sql);
                        $ex->execute();
        
                        echo '<table class="table table-bordered">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">#</th>';
                        echo '<th scope="col">Data de Registro</th>';
                        echo '<th scope="col">Produto</th>';
                        echo '<th scope="col">Categoria</th>';
                        echo '<th scope="col">Validade</th>';
                        echo '<th scope="col">Descrição</th>';
                        echo '<th scope="col">Valor(R$)</th>';
                        echo '<th scope="col">Peso(KG)</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
        
                        while($row = $ex->fetch(PDO::FETCH_ASSOC)){
                       
                        echo '<tr>';
                        echo '<th scope="row">'.$row['id'].'</th>';
                        echo '<td>'.$row['data_registro'].'</td>';
                        echo '<td>'.$row['produto'].'</td>';
                        echo '<td>'.$row['categoria'].'</td>';
                        echo '<td>'.$row['validade'].'</td>';
                        echo '<td>'.$row['descricao'].'</td>';
                        echo '<td>'.$row['valor'].'</td>';
                        echo '<td>'.$row['peso'].'</td>';
                        echo '</tr>';
                        
        
                        }
                        echo '</tbody>';
                        echo '</table>';
        
                        }
                    
                

                
                  
                


            }
        ?>

    </div>

    <script src="../../pluguins/bootstrap/js/bootstrap.js"></script>
</body>

</html>