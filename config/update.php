<?php
    include "connection.php";
    
    if($_POST['tabela'] == 'propriedade'){
        header('Content-Type: application/json');

        $nome = $_POST['nome'];
        $avaliacao_inicial = $_POST['avaliacao_inicial'];
        $avaliacao_final = $_POST['avaliacao_final'];
        $area = $_POST['area'];
        $valor = $_POST['valor'];
        $sql = "UPDATE propriedade SET nome = :nome, avaliacao_inicial = :avaliacao_inicial, avaliacao_final = :avaliacao_final, area = :area, valor = :valor WHERE id = 1";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':avaliacao_inicial',$avaliacao_inicial);
        $stmt->bindParam(':avaliacao_final',$avaliacao_final);
        $stmt->bindParam(':area',$area);
        $stmt->bindParam(':valor',$valor);
        if($stmt->execute()){
        echo json_encode('Dados Atualizados Com Sucesso');
        }else{
            echo json_encode('Ocorreu um erro ao atualizar os Dados');
        }
        
    }
    if($_POST['tabela'] == 'maquinas'){
        header("Content-Type: application/json");     
        
        $id = $_POST['id'];
        $item = $_POST['item'];
        $vida_util = $_POST['vida_util'];
        $valor = $_POST['valor'];
        $ano_compra = $_POST['ano_compra'];
    
        $sql = "UPDATE maquinas SET item = :item, vida_util = :vida_util, valor = :valor, ano_compra = :ano_compra WHERE id = $id";
        $execute = $con->prepare($sql);
        $execute->bindParam(":item",$item);
        $execute->bindParam(":vida_util",$vida_util);
        $execute->bindParam(":valor",$valor);
        $execute->bindParam(":ano_compra",$ano_compra);
        $execute->execute();
        if($execute->rowCount() >= 1){
            echo json_encode('Dados Atualizados Com Sucesso');
        }else{
            echo json_encode('Ocorreu um erro ao atualizar os Dados');
        }
        
        }

        if($_POST['tabela'] == 'estoque'){
            header("Content-Type: application/json");     
            $id = $_POST['id'];
            $produto = $_POST['produto'];
            $categoria = $_POST['categoria'];
            $validade = $_POST['validade'];
            $descricao = $_POST['descricao'];
            $valor = $_POST['valor'];
            $peso = $_POST['peso'];
          
            $sql = "UPDATE estoque SET produto = :produto, categoria = :categoria, validade = :validade, descricao= :descricao,valor = :valor,peso = :peso WHERE id = $id ";
           
            $execute = $con->prepare($sql);
            $execute->bindParam(':produto',$produto);
            $execute->bindParam(':categoria',$categoria);
            $execute->bindParam(':validade',$validade);
            $execute->bindParam(':descricao',$descricao);
            $execute->bindParam(':valor',$valor);
            $execute->bindParam(':peso',$peso);
            $execute->execute();
      
           
            if($execute->rowCount() >= 1){
                echo json_encode('Dados Atualizados Com Sucesso');
            }else{
                echo json_encode('Ocorreu um erro ao atualizar os Dados');
            }
            
            }

            if($_POST['tabela'] == 'animal'){
                header("Content-Type: application/json");     
                $id = $_POST['id'];
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
                $sql = "UPDATE animal SET apelido = :apelido,
                nome_registro = :nome_registro,
                numero_registro= :numero_registro,
                sexo= :sexo,
                categoria= :categoria,
                raca= :raca,
                nome_pai= :nome_pai,
                nome_mae= :nome_mae,
                data_entrada = :data_entrada,
                peso_entrada= :peso_entrada,
                peso_atual = :peso_atual,
                nascimento = :nascimento,
                idade_entrada= :idade_entrada,
                idade_atual = :idade_atual,
                valor_entrada= :valor_entrada,
                valor_atual= :valor_atual WHERE id = $id";
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
                 $execute->execute();
                 
                 if($execute->rowCount() >= 1){
                    echo json_encode('Dados Atualizados Com Sucesso');
                }else{
                    echo json_encode('Ocorreu um erro ao atualizar os Dados');
                }
               
                
            }

            if($_POST['tabela'] == 'login'){
                header("Content-Type: application/json");     
                
                $id = $_POST['id'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $nasc = $_POST['nasc'];
                
                $sql = "UPDATE login SET username = :username,
                email = :email,
                telefone = :telefone,
                nasc = :nasc WHERE id = $id";
                $execute = $con->prepare($sql);
                $execute->bindParam(':username',$username);
                $execute->bindParam(':email',$email);
                $execute->bindParam(':telefone',$telefone);
                $execute->bindParam(':nasc',$nasc);
                $execute->execute();
                 
                if($execute->rowCount() >= 1){
                    echo json_encode('Dados Atualizados Com Sucesso');
                }else{
                    echo json_encode('Ocorreu um erro ao atualizar os Dados');
                }
                
                }
                

                if($_POST['tabela'] == 'senha'){
                    header("Content-Type: application/json");  
                    $id = $_POST['id'];   
                    $senha = $_POST['nova'];
                    $atual = $_POST['atual'];
                   
                    
                    $execute = $con->prepare("SELECT *FROM login");
                    $execute->execute();
                    $v = $execute->fetch();

                    if($atual == $v['password']){
                        $sql = "UPDATE login SET password = :password WHERE id = $id";
                        $ex = $con->prepare($sql);
                        $ex->bindParam(':password',$senha);
                        $ex->execute();

                        if($ex->rowCount()>=1){
                            echo json_encode('Senha Redefinida com Sucesso');
                        }else{
                            echo json_encode('Senha Redefinida com Sucesso');
                        }

                    }else{  
                        echo json_encode('Senha Atual Incorreta');
                    }
                   
                   
                }

                if($_POST['tabela'] == 'login'){
                    header("Content-Type: application/json");     
                    
                    $id = $_POST['id'];
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $telefone = $_POST['telefone'];
                    $nasc = $_POST['nasc'];
                    
                    $sql = "UPDATE login SET username = :username,
                    email = :email,
                    telefone = :telefone,
                    nasc = :nasc WHERE id = $id";
                    $execute = $con->prepare($sql);
                    $execute->bindParam(':username',$username);
                    $execute->bindParam(':email',$email);
                    $execute->bindParam(':telefone',$telefone);
                    $execute->bindParam(':nasc',$nasc);
                    $execute->execute();
                     
                    if($execute->rowCount() >= 1){
                        echo json_encode('Dados Atualizados Com Sucesso');
                    }else{
                        echo json_encode('Ocorreu um erro ao atualizar os Dados');
                    }
                    
                    }
                    
    
                    if($_POST['tabela'] == 'entrada_saida'){
                        header("Content-Type: application/json");  
                        $id = $_POST['id'];   
                        $animal = $_POST['animal'];
                        $movimentacao = $_POST['movimentacao'];
                        $data = $_POST['data'];
                        $observacao = $_POST['observacao'];
                        
                        $sql = "UPDATE entrada_saida SET
                        animal = :animal,
                        movimentacao = :movimentacao,
                        data = :data,
                        observacao = :observacao WHERE id = $id";
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
        
    

      


        
    


?>