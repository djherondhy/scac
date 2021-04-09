<?php
    include "connection.php";
   
        header("Content-Type: application/json");

        $descricao = $_POST['descricao_atividade'];
        $data = date('d/m/Y');

        $sql = "INSERT INTO atividades(data,descricao)values(:data,:descricao)";
        $execute=$con->prepare($sql);
        $execute->bindParam(":data",$data);
        $execute->bindParam(":descricao",$descricao);
        $execute->execute();
       
       if($execute->rowCount()>=1){
           echo json_encode('Atividade salva com Sucesso');
       }else{
           echo json_encode('Falha ao salvar Atividade');
       }
        



    


?>