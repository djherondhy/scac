<?php
    include "../../config/connection.php";
    include "../../config/functions/sql-functions.php";
    $id = $_GET['id'];

    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../pluguins/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../../pluguins/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../../pluguins/boxicons/css/transformations.css">
    <link rel="stylesheet" href="../../pluguins/boxicons/css/animations.css">
    <title>Nº de Registro : <?php selectWhere($con,'animal',$id,'numero_registro'); ?></title>
</head>

<body>

    <div class="container">
    <button type="button" class="btn btn-light mb-3 mt-2" onclick="window.print()">Imprimir</button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" colspan="4"></i>Ficha Animal Individual</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" colspan="4">Dados Gerais</th>
                </tr>
                <tr>
                    <th scope="row">Número de Registro: <?php selectWhere($con,'animal',$id,'numero_registro'); ?></th>
                    <td colspan=""><b>Data de Registro: </b><?php selectWhere($con,'animal',$id,'data_registro');?></td>
                    <td colspan="2"><b>Apelido: </b><?php selectWhere($con,'animal',$id,'apelido');?></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Nome de Registro : </b>
                        </b><?php selectWhere($con,'animal',$id,'nome_registro');?></td>
                </tr>
                <tr>
                    <td><b>Sexo: </b></b><?php selectWhere($con,'animal',$id,'sexo');?></td>
                    <td><b>Categoria: </b><?php selectWhere($con,'animal',$id,'categoria');?></td>
                    <td colspan="2"><b>Raca: </b></b><?php selectWhere($con,'animal',$id,'raca');?></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Nome do Pai : </b> </b><?php selectWhere($con,'animal',$id,'nome_pai');?></td>
                </tr>
                <tr>
                    <td colspan="4"><b>Nome da Mãe: </b> </b><?php selectWhere($con,'animal',$id,'nome_mae');?></td>
                </tr>
                <tr>
                    <th scope="col" colspan="4">Dados Específicos</th>
                </tr>
                <tr>
                    <td><b>Data Entrada: </b><?php selectWhere($con,'animal',$id,'data_entrada');?></td>
                    <td><b>Peso Entrada: </b><?php selectWhere($con,'animal',$id,'peso_entrada');?></td>
                    <td><b>Idade Entrada: </b><?php selectWhere($con,'animal',$id,'idade_entrada');?></td>
                    <td><b>Valor Entrada: </b><?php selectWhere($con,'animal',$id,'valor_entrada');?></td>
                </tr>
                <tr>
                    <td><b>Nascimento: </b><?php selectWhere($con,'animal',$id,'nascimento');?></td>
                    <td><b>Peso Atual: </b><?php selectWhere($con,'animal',$id,'peso_atual');?></td>
                    <td><b>Idade Atual: </b><?php selectWhere($con,'animal',$id,'idade_atual');?></td>
                    <td><b>Valor Atual: </b><?php selectWhere($con,'animal',$id,'valor_atual');?></td>
                </tr>
                <tr>
                <td colspan="4"><b>Observação: </b><?php selectWhere($con,'animal',$id,'observacao');?></td>
                </tr>
            </tbody>
        </table>

    </div>
    <script src="../../pluguins/bootstrap/js/bootstrap.js"></script>
</body>

</html>