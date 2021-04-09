<?php 

    /** INCLUDES */
   include '../config/connection.php';
   include '../config/functions/sql-functions.php';

   /** -------- */

    session_start();
    if($_SESSION['logado'] != true){
        session_destroy();
        header("Location: index.php");
        
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

   
    </style>
    <!--STYLESHEETS-->

    <link rel="stylesheet" href="../css/propriedade.css">
    <link rel="stylesheet" href="../css/all-in.css">
    <!--BOXICON.CSS--->
    <link rel="stylesheet" href="../pluguins/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../pluguins/boxicons/css/transformations.css">
    <link rel="stylesheet" href="../pluguins/boxicons/css/animations.css">
    <!---------------------------------------------------------->
    <link rel="stylesheet" href="../pluguins/Chart.js-2.9.4/Chart.js-2.9.4/dist/Chart.css">
    <link rel="stylesheet" href="../pluguins/Chart.js-2.9.4/Chart.js-2.9.4/dist/Chart.min.css">
   
</script>
</head>

<body>

    <div class="dash-container">





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
                    <div class="nav-list">
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
                    <div class="nav-list active">
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
                    <i class='bx bxs-cabinet'></i>
                        <p class="p-title"><b>Estoque</b><br> <span class="p-subtitle">Gerencia de Controle de Estoque em Geral</span> </p>
                    </div>
                </div>

                <div class="header-cards">
                    <div class="cards">
                        <div class="cards-itens card1">
                            <div class="card-icon">
                            <i class='bx bx-cookie'></i>
                            </div>
                            <p>
                                <b>Ração</b>
                            </p>
                            <p class="card-number number-racao" id="number-racao"></p>
                            <p>Total</p>
                        </div>
                        <div class="cards-itens card2">
                            <div class="card-icon">
                            <i class='bx bxs-virus-block' ></i>
                            </div>
                            <p>
                                <b>Vacina</b>
                            </p>
                            <p class="card-number number-vacina" id="number-vacina"></p>
                            <p>Total</p>
                        </div>

                        <div class="cards-itens card3">
                            <div class="card-icon">
                            <i class='bx bxs-package'></i>
                            </div>
                            <p>
                                <b>Insumo</b>
                            </p>
                            <p class="card-number number-insumo" id="number-insumo"></p>
                            <p>Total</p>
                        </div>
                      


                    </div>

                    
                </div>
                <div class="dados">
                    <button> <i class='bx bx-category-alt'></i> Controle de Dados</button>
                </div>
                <div class="content-tables">
                    <div class="table-card card-estoque">
                        <div class="table-header card3">
                            <p>Estoque de Ração, Vacinas e Insumos</p>
                            <div class="header-bts">
                            <button class="bt-option bt-print" onclick="printTable('estoque')"><i class='bx bx-printer'></i></i></button>
                            <button id="" onclick="onModal('modal-estoque','sub-estoque')"><i class='bx bx-add-to-queue'></i></button>
                            </div>
                        </div>
                        <div class="main-table">
                            <table class="table estoque-table" id="estoque-table">
                                <tr class=title>
                                    <td>Data de Registro</td>
                                    <td>Produto</td>
                                    <td>Validade</td>
                                    <td>Descrição</td>
                                    <td>Valor(R$)</td>
                                    <td>Peso(KG)</td>
                                    <td>Ação</td>
                                </tr>


                            </table>
                        </div>
                        <div class="table-footer">
                            <div class="busca-input">
                                <form id="buscaEstoque">
                                    <input type="text" id="buscaInput" class="busca-control"
                                        placeholder="Digite palavras chaves referentes à produto, descricao ou categoria">

                                    <button type="submit" class="busca-button" form="buscaEstoque"><i
                                            class='bx bx-search'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

       




            </div>
            <!---FECHA MAIN ------->
        </div>
        <!---FECHA MAIN CONTENT------->
        <div class="modal-container" id="modal-estoque">
           <div class="modal-estoque" id="sub-estoque">
                <span class="bt-close" >
                            <i class='bx bx-x' id="close"></i>
                </span>
                <p class ="modal-title">Registrar no Estoque</p>
                <form id="formEstoque" class="modal-form">
                    <div class="control-input">
                        <label for="">Produto</label>
                        <input type="text" id="produto" class="input-text" placeholder="Digite o Nome do Produto">
                    </div>
                    <div class="control-input">
                        <label for="">Categoria</label>
                        <select id="categoria" class="select-input">
                          <option value="Ração">Ração</option>
                          <option value="Vacina">Vacina</option>
                          <option value="Insumo">Insumo</option>
                        </select>
                    </div>
                    <div class="control-input">
                        <label for="">Validade</label>
                        <input type="text" id="validade" class="input-text" placeholder="Digite a Validade do Produto">
                    </div>
                    <div class="control-input">
                        <label for="">Descrição</label>
                        <input type="text" id="descricao" class="input-text" placeholder="Descreva o Produto">
                    </div>
                    <div class="control-input">
                        <label for="">Valor(R$)</label>
                        <input type="text" id="valor" class="input-text" placeholder="Digite o valor do Produto">
                    </div>
                    <div class="control-input">
                        <label for="">Peso(KG)</label>
                        <input type="text" id="peso" class="input-text" placeholder="Digite o peso do Produto">
                    </div>
                   
                    <input type="submit" value="Salvar" class="submit-bt" form="formEstoque" id="sub">
                </form>
           </div>
        </div>

        <div class="modal-container" id="modal-editestoque">
           <div class="modal-estoque" id="sub-editestoque">
                <span class="bt-close" >
                            <i class='bx bx-x' id="close"></i>
                </span>
                <p class ="modal-title">Atualizar Dados</p>
                <form id="editEstoque" class="modal-form">
                <div class="control-input">
                        <label for="">id</label>
                        <input type="text" id="idEdit" class="input-text" readonly>
                    </div>
                    <div class="control-input">
                        <label for="">Produto</label>
                        <input type="text" id="produtoEdit" class="input-text">
                    </div>
                    <div class="control-input">
                        <label for="">Categoria</label>
                        <input type="text" id="categoriaoEdit" class="input-text" >
                    </div>
                    <div class="control-input">
                        <label for="">Validade</label>
                        <input type="text" id="validadeEdit" class="input-text" >
                    </div>
                    <div class="control-input">
                        <label for="">Descrição</label>
                        <input type="text" id="descricaoEdit" class="input-text" placeholder="Descreva o Produto">
                    </div>
                    <div class="control-input">
                        <label for="">Valor(R$)</label>
                        <input type="text" id="valorEdit" class="input-text" placeholder="Digite o valor do Produto">
                    </div>
                    <div class="control-input">
                        <label for="">Peso(KG)</label>
                        <input type="text" id="pesoEdit" class="input-text" placeholder="Digite o peso do Produto">
                    </div>
                   
                    <input type="submit" value="Salvar" class="submit-bt" form="editEstoque" id="sub">
                </form>
           </div>
        </div>


        
    </div>
    <!---FECHA DASH CONTAINER------->

    

    




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
         getEstoque();
         countVacina();
         countRacao();
         countInsumo();
    </script>
    <!-------------------------------------------------------------->
    
</body>

</html>