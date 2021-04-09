<?php
     include "connection.php";

    
        

        if($_POST['tabela'] == 'maquinas'){
        header("Content-Type: application/json");     
        
        $item = $_POST['item'];
        $vida_util = $_POST['vida_util'];
        $valor = $_POST['valor'];
        $ano_compra = $_POST['ano_compra'];

        $sql = "INSERT INTO maquinas (item,vida_util,valor,ano_compra)values(:item,:vida_util,:valor,:ano_compra)";
        $execute = $con->prepare($sql);
        $execute->bindParam(":item",$item);
        $execute->bindParam(":vida_util",$vida_util);
        $execute->bindParam(":valor",$valor);
        $execute->bindParam(":ano_compra",$ano_compra);
        $execute->execute();
        if($execute->rowCount() >= 1){
            echo json_encode('Dados Inserido com Sucesso');
         }else{
            echo json_encode('Ocorreu um erro ao Inserir os Dados');
         }
        
        }
        if($_POST['tabela'] == 'entrada_saida'){
         header("Content-Type: application/json");  

        
         $animal = $_POST['animal'];
         $movimentacao = $_POST['movimentacao'];
         $data = $_POST['data'];
         $observacao = $_POST['observacao'];
 
         $sql = "INSERT INTO entrada_saida(animal,movimentacao,data,observacao)values(:animal,:movimentacao,:data,:observacao)";
         $execute = $con->prepare($sql);
         $execute->bindParam(":animal",$animal);
         $execute->bindParam(":movimentacao",$movimentacao);
         $execute->bindParam(":data",$data);
         $execute->bindParam(":observacao",$observacao);
         
         $execute->execute();
         if($execute->rowCount() >= 1){
             echo json_encode('Dados Inserido com Sucesso');
          }else{
             echo json_encode('Ocorreu um erro ao Inserir os Dados');
          }

        }

        if($_POST['tabela'] == 'estoque'){
         header("Content-Type: application/json");  
        
        
         $produto = $_POST['produto'];
         $categoria = $_POST['categoria'];
         $validade = $_POST['validade'];
         $descricao = $_POST['descricao'];
         $valor = $_POST['valor'];
         $peso = $_POST['peso'];
         $data_registro = date('d/m/Y');
       
        
        $sql = "INSERT INTO estoque(produto,categoria,validade,descricao,valor,peso,data_registro)values(
           :produto,
           :categoria,
           :validade,
           :descricao,
           :valor,
           :peso,
           :data_registro)";
         $execute = $con->prepare($sql);
         $execute->bindParam(':produto',$produto);
         $execute->bindParam(':categoria',$categoria);
         $execute->bindParam(':validade',$validade);
         $execute->bindParam(':descricao',$descricao);
         $execute->bindParam(':valor',$valor);
         $execute->bindParam(':peso',$peso);
         $execute->bindParam(':data_registro',$data_registro);
         $execute->execute();
         if($execute->rowCount() >= 1){
            echo json_encode('Dados Inserido com Sucesso');
         }else{
            echo json_encode('Ocorreu um erro ao Inserir os Dados');
         }
         
        }


        if($_POST['tabela'] == 'animal'){
         header("Content-Type: application/json");  
         
         $apelido = $_POST['apelido'];
         $nome_registro = $_POST['nome_registro'];
         $numero_registro = $_POST['numero_registro'];
         $sexo = $_POST['sexo'];
         $categoria = $_POST['categoria'];
         $raca =  $_POST['raca'];
         $nome_pai = $_POST['nome_pai'];
         $nome_mae =  $_POST['nome_mae'];
         $data_entrada = $_POST['data_entrada'];
         $peso_entrada = $_POST['peso_entrada'];
         $peso_atual = $_POST['peso_atual'];
         $nascimento = $_POST['nascimento'];
         $idade_entrada = $_POST['idade_entrada'];
         $idade_atual = $_POST['idade_atual'];
         $valor_entrada = $_POST['valor_entrada'];
         $valor_atual = $_POST['valor_atual'];
         $observacao = $_POST['observacao'];
         $data_registro = date('d/m/Y');
         
         
         $sql = "INSERT INTO animal (
            apelido,
            nome_registro,
            numero_registro,
            sexo,
            categoria,
            raca,
            nome_pai,
            nome_mae,
            data_entrada,
            peso_entrada,
            peso_atual,
            nascimento,
            idade_entrada,
            idade_atual,
            valor_entrada,
            valor_atual,
            observacao,
            data_registro)values(
            :apelido,   
            :nome_registro,
            :numero_registro,
            :sexo,
            :categoria,
            :raca,
            :nome_pai,
            :nome_mae,
            :data_entrada,
            :peso_entrada,
            :peso_atual,
            :nascimento,
            :idade_entrada,
            :idade_atual,
            :valor_entrada,
            :valor_atual,
            :observacao,
            :data_registro)";
            $execute = $con->prepare($sql);
            $execute->bindParam(':apelido',$apelido);   
            $execute->bindParam(':nome_registro',$nome_registro);   
            $execute->bindParam(':numero_registro',$numero_registro);   
            $execute->bindParam(':sexo',$sexo);   
            $execute->bindParam(':categoria',$categoria);   
            $execute->bindParam(':raca',$raca);   
            $execute->bindParam(':nome_pai',$nome_pai);  
            $execute->bindParam(':nome_mae',$nome_mae);   
            $execute->bindParam(':data_entrada',$data_entrada);   
            $execute->bindParam(':peso_entrada',$peso_entrada);   
            $execute->bindParam(':peso_atual',$peso_atual);   
            $execute->bindParam(':nascimento',$nascimento);   
            $execute->bindParam(':idade_entrada',$idade_entrada);   
            $execute->bindParam(':idade_atual',$idade_atual);   
            $execute->bindParam(':valor_entrada',$valor_entrada);   
            $execute->bindParam(':valor_atual',$valor_atual);
            $execute->bindParam(':observacao',$observacao);
            $execute->bindParam(':data_registro',$data_registro);   
            $execute->execute();
            
            if($execute->rowCount() >= 1){
               echo json_encode('Dados Inserido com Sucesso');
            }else{
               echo json_encode('Ocorreu um erro ao Inserir os Dados');
            }
       

        }

        if($_POST['tabela'] == 'lembrete'){
        header("Content-Type: application/json");

        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $data = date('d/m/Y H:i');

        $sql = "INSERT INTO lembrete(data,descricao,titulo)values(:data,:descricao,:titulo)";
        $execute=$con->prepare($sql);
        $execute->bindParam(":data",$data);
        $execute->bindParam(":descricao",$descricao);
        $execute->bindParam(":titulo",$titulo);
        $execute->execute();
       
       if($execute->rowCount()>=1){
           echo json_encode('Lembrete salvo com Sucesso');
       }else{
           echo json_encode('Falha ao salvar Lembrete');
       }
      }

?>