<?php 

    /** INCLUDES */
   include '../config/connection.php';
   include '../config/functions/sql-functions.php';

   /** -------- */

    session_start();
    if($_SESSION['logado'] != true){
        session_destroy();
        header("Location: ../index.php");
        
        die();
    }

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <title>Dashboard</title>

    

    <!--STYLESHEETS-->
    
    <script src="../js/popups.js"></script>

    <link rel="stylesheet" href="../css/propriedade.css">
    
    <link rel="stylesheet" href="../css/all-in.css">
   
    


    <!--BOXICON.CSS--->
    <link rel="stylesheet" href="../pluguins/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../pluguins/boxicons/css/transformations.css">
    <link rel="stylesheet" href="../pluguins/boxicons/css/animations.css">

    <!---------------------------------------------------------->
</head>

<body>
      
    <div class="dash-container" >

   
    


        <div class="sidebar" id="sidebar-id">
            <a href="#" class="side-a">
                <div class="side-logo">
                    <i class='bx bxs-layer'></i>

                    <span class="side-logo-text" id="bt">SCAC 2.0</span>

                </div>
            </a>
            <div class="nav-sidebar">
                <a href="dashboard.php">
                    <div class="nav-list">
                        <i class='bx bxs-dashboard'></i>
                        <span class="list-name">Dashboard</span>
                    </div>
                </a>
                <a href="config.php">
                    <div class="nav-list">
                        <i class='bx bxs-wrench'></i>
                        <span class="list-name" id="list">Configurações</span>
                    </div>
                </a>
                <a href="propriedade.php">
                    <div class="nav-list active">
                        <i class='bx bxs-home'></i>
                        <span class="list-name">Propriedades</span>
                    </div>
                </a>
                <a href="entrada-saida.php">
                    <div class="nav-list">
                        <i class='bx bx-transfer'></i>
                        <span class="list-name">Entrada/Saída</span>
                    </div>
                </a>
                <a href="estoque.php">
                    <div class="nav-list">
                        <i class='bx bxs-cabinet'></i>
                        <span class="list-name">Estoque</span>
                    </div>
                </a>
                <a href="controle-geral.php">
                    <div class="nav-list">
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <span class="list-name">Controle Geral</span>
                    </div>
                </a>
            </div>
            </a>
        </div>
        <div class="main-content" id="main">
            <div class="header">
                <div class="menu-toggle" id="menu_toggle">
                    <i class='bx bx-menu toggle_on' id="toggle-id"></i>
                </div>
                <div class="menu-toggle-off" id="menu_toggle-off">
                    <i class='bx bx-x toggle-open'></i>
                </div>
                <div class="header-content">
                <a href="lembretes.php">
                    <span class="lembrete-icon">
                        <i class='bx bxs-notepad'></i>
                    </span>
                    </a>
                    <img src="../images/<?php selectAll('login',$con,'perfil');?>" alt="" class="perfil-img">
                    <span class="logout-button">
                        <i class='bx bx-exit'></i>
                        <span class="logout-text">Logout</span>
                    </span>
                </div>
            </div>
            <div class="main">
                <div class="prop-header">
                    <div class="prop-title">
                        <i class='bx bx-home-alt'></i>
                        <p class="p-title"><b>Dados de Propriedade</b><br> <span class="p-subtitle">Busque, Adicione e
                                Altere Dados Proprietários</span> </p>
                    </div>
                    <button type="button" class="btn btn-success" id="bt-prop" onclick="onModal('modal-propriedade','sub-propriedade')">+ Editar Dados</button>
                </div>
                <div class="prop-cards">
                    <div class="card-propriedade">
                        <div class="icon-prop">
                            <i class='bx bxs-home'></i>
                        </div>
                        <p> <b>Propriedade</b></p>
                        <p> <b>Nome da Propriedade :</b><span id="propriedade_value" class="prop-dados1"></span></p>
                        <p> <b>Período de Avaliação:</b><span id="avaliacao_value" class="prop-dados2"></span></p>
                        <p> <b>Área da propriedade (hectares):</b><span id="area_value" class="prop-dados3"></span></p>
                        <p> <b>Valor do hectare na Região (R$):</b><span id="valor_value" class="prop-dados4"></span></p>
                    </div>

                    <div class="cards">
                        <div class="cards-itens card1">
                            <div class="card-icon">
                                <i class='bx bxs-car-mechanic'></i>
                            </div>
                            <p>
                                <b>Máquinas Registradas</b>
                            </p>
                            <p class="card-number number-maquinas" id="number-maquinas"></p>
                            <p>Total</p>
                        </div>
                        <div class="cards-itens card2">
                            <div class="card-icon">
                                <i class='bx bxs-calendar-edit'></i>
                            </div>
                            <p>
                                <b>Atividades Registradas</b>
                            </p>
                            <p class="card-number number-atv" id="number-atv"></p>
                            <p>Total</p>
                        </div>
                       
                    </div>

                </div>
                <!-------------------------------------------->


                <div class="dados">
                        <button> <i class='bx bx-category-alt'></i> Controle dos Dados</button>
                </div>
                <div class="content-tables">
                    <div class="atividades">
                        <div class="ativ-header">
                            <p>Atividades Realizadas</p>
                            <div class="header-bts">
                            <button class="bt-option bt-print" onclick="printTable('atividades')"><i class='bx bx-printer'></i></i></button>
                            <button id="add-ativ"> <i class='bx bx-calendar-plus'></i></button>
                            </div>
                        </div>
                        <div class="ativ-table">
                            <table class="table atv_table" id="atv_table">
                                <tr class=title>
                                    <td>Data</td>
                                    <td>Descrição</td>
                                    <td>Ação</td>
                                </tr>
                               

                            </table>
                        </div>
                        <div class="ativ-footer">
                            <div class="busca-input">
                            <form id="buscaAtividade"> 
                                <input type="text" id="busca_atv" class="busca-control"
                                    placeholder="Digite uma Palavra Chave para Buscar">
                                    
                                <button type="submit" class="busca-button" form="buscaAtividade"><i class='bx bx-search'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="maquinas">
                        <div class="maquinas-header">
                            <p>Máquinas, Implementos e Benfeitorias</p>
                            <div class="header-bts">
                            <button class="bt-option bt-print" onclick="printTable('maquinas')"><i class='bx bx-printer'></i></i></button>
                            <button class="bt-option" id="add-maquinas"><i class='bx bx-message-square-add'></i></button>

                            </div>
                          
                        </div>
                        <div class="maquinas-option">
                            <form id="buscaMaquinas">
                           
                                <input type="text" class="maquina-busca" id="busca_maq"   placeholder="Digite uma Palavra Chave para Buscar">
                                <button class="busca-button-maquina" type="submit" form="buscaMaquinas"><i class='bx bx-search' ></i></button>
                           
                            </form> 
                            
                          
                        </div>
                        <div class="maquina-table">
                            <table class="table table-maquinas" id="table-maquinas">
                            
                            </table>
                        </div>
                    </div>


                </div>

            </div>
        </div>
        
        <!---------------------------FORMULÁRIO E MODAL ATIVIDADES-------------------------------------->
        <div class="modal-container" id="modal-atividade">
            <div class="modal-atividade" id="sub-atividade">
                    <span class="bt-close" >
                         <i class='bx bx-x' id="close"></i>
                    </span>
                    <p class ="modal-title">Adicionar Atividade</p>
                    <form id="formAtividade" class="modal-form">
                        <label for="descricao_atividade">Descreva a atividade</label>
                        <textarea id="descricao_atividade" id="descricao_atividade" cols="30" rows="4"></textarea>
                        <input type="submit" form="formAtividade" value="Salvar" class="submit-bt" id="sub">
                    </form>
            </div>
        </div>

         <!---------------------------FORMULÁRIO E MODAL ATIVIDADES-------------------------------------->
         <div class="modal-container" id="modal-propriedade">
            <div class="modal-propriedade" id="sub-propriedade">
                    <span class="bt-close" >
                         <i class='bx bx-x' id="close"></i>
                    </span>
                    <p class ="modal-title">Dados da Propriedade</p>
                    <form id="formProp" class="modal-form">
                    <div class="control-input">
                        <label for="">Nome da Propriedade</label>
                        <input type="text" name="nome" id="nome" class="input-text" placeholder="Digite o Nome da Propriedade">
                    </div>
                    <div class="control-input">
                        <label for="">Periodo de Avaliação</label>
                        <input type="text" name="avaliacao_inicial" id="avaliacao_inicial" class="input-date"> 
                        <label for="">a</label>
                        <input type="text" name="" id="avaliacao_final" class="input-date" > 
                    </div>
                    <div class="control-input">
                        <label for="">Área da Propriedade</label>
                        <input type="text" name="" id="area"  class="input-text" placeholder="Digite a Área da Propriedade em Hectare">
                    </div>
                    <div class="control-input">
                        <label for="">Valor do Hectare em Região</label>
                        <input type="text" name="" id="valor" class="input-text" placeholder="Digite o Valor do Hectare em região">
                    </div>

                        <input type="submit" form="formProp" value="Salvar" class="submit-bt" id="sub">
                    </form>
            </div>
        </div>
        




        <div class="modal-container" id="modal-maquinas">
           <div class="submodal-maquinas" id="sub-maquinas">
                <span class="bt-close" >
                            <i class='bx bx-x' id="close"></i>
                </span>
                <p class ="modal-title">Adicionar Máquinas, Equipamentos e Benfeitorias</p>
                <form id="formMaquina" class="modal-form">
                    <div class="control-input">
                        <label for="">Item</label>
                        <input type="text" name="item" id="item" class="input-text" placeholder="Descreva o Item">
                    </div>
                    <div class="control-input">
                        <label for="">Valor</label>
                        <input type="number" name="valor" id="valor" class="input-text" placeholder="Insira o Valor">
                    </div>
                    <div class="control-input">
                        <label for="">Vida Util</label>
                        <input type="text" name="vida_util" id="vida_util" class="input-text" placeholder="Informe a Vida Útil">
                    </div>
                    <div class="control-input">
                        <label for="">Ano de Compra</label>
                        <input type="number" name="ano_compra" id="ano_compra" class="input-text" placeholder="Descreva o Item">
                    </div>
                    <input type="submit" value="Salvar" class="submit-bt" form="formMaquina" id="sub">
                </form>
           </div>
        </div>

        <div class="modal-container" id="modal-editMaquinas">
           <div class="submodal-maquinas" id="sub-editMaquinas">
                <span class="bt-close" >
                            <i class='bx bx-x' id="close"></i>
                </span>
                <p class ="modal-title">Editar Dados</p>
                <form id="editMaquinas" class="modal-form">


                <div class="control-input">
                        <label for="">Id</label>
                        <input type="text" name="item" id="maquina_id" class="input-text"  value="" readonly>
                    </div>

                    <div class="control-input">
                        <label for="">Item</label>
                        <input type="text" name="item" id="edit_item" class="input-text" placeholder="Descreva o Item" value="">
                    </div>
                    <div class="control-input">
                        <label for="">Valor</label>
                        <input type="number" name="valor" id="edit_valor" class="input-text" placeholder="Insira o Valor" value="">
                    </div>
                    <div class="control-input">
                        <label for="">Vida Util</label>
                        <input type="text" name="vida_util" id="edit_vida_util" class="input-text" placeholder="Informe a Vida Útil">
                    </div>
                    <div class="control-input">
                        <label for="">Ano de Compra</label>
                        <input type="number" name="ano_compra" id="edit_ano_compra" class="input-text" placeholder="Descreva o Item">
                    </div>
                    <input type="submit" value="Salvar" class="submit-bt" form="editMaquinas" id="sub">
                </form>
           </div>
        </div>
        

       
       

      
        
    </div>
    





        <!---SCRIPTS------->
       <!--- <script src="../js/notify.js"></script>
        
        --->
       
        <script src="../js/modals.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/popups.js"></script>
        <script src="../js/notify.js"></script>
        <!-------------------Scripts Request-------------------------->
        <script src="../pluguins/jquery/jquery-3.2.1.min.js"></script>
        <script src="../js/notify.js"></script>
        <script src="../js/request-gets.js"></script>
        <script src="../js/request-busca.js"></script>
        <script src="../js/request-inserts.js"></script>
        <script src="../js/request-update.js"></script>
        <script src="../js/request-delete.js"></script>
        <script src="../js/request-count.js"></script>
        
        <script>
            


            getPropriedade();
            getMaquinas();
            getAtividades();

            countMaquinas();
            countAtividades();
        </script>
        <!-------------------------------------------------------------->
</body>

</html>