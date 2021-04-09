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
                        <i class='bx bx-transfer-alt'></i>
                        <p class="p-title"><b>Entrada e Saída</b><br> <span class="p-subtitle">Gerencie a Entrada e
                                Saída de Animais</span> </p>
                    </div>
                </div>

                <div class="header-cards">
                    <div class="cards">
                        <div class="cards-itens card1">
                            <div class="card-icon">
                                <i class='bx bxs-right-arrow-square'></i>
                            </div>
                            <p>
                                <b>Entrada de Animais</b>
                            </p>
                            <p class="card-number number-entrada" id="number-entrada"></p>
                            <p>Total</p>
                        </div>
                        <div class="cards-itens card2">
                            <div class="card-icon">
                                <i class='bx bxs-left-arrow-square'></i>
                            </div>
                            <p>
                                <b>Saída de Animais</b>
                            </p>
                            <p class="card-number number-saida" id="number-saida"></p>
                            <p>Total</p>
                        </div>

                    </div>


                </div>
                <div class="dados">
                    <button> <i class='bx bx-category-alt'></i> Controle de Dados</button>
                </div>
                <div class="content-tables">
                    <div class="table-card">
                        <div class="table-header">
                            <p>Entrada e Saída</p>
                            <button id="" onclick="onModal('modal-entrada','sub-entrada')"><i
                                    class='bx bx-add-to-queue'></i></button>

                        </div>
                        <div class="main-table">
                            <table class="table table-entrada" id="table-entrada">
                                <tr class=title>
                                    <td>Animal</td>
                                    <td>Tipo de Movimentação</td>
                                    <td>Data da Movimentação</td>
                                    <td>Observações</td>
                                    <td>Ação</td>
                                </tr>


                            </table>
                        </div>
                        <div class="table-footer">
                            <div class="busca-input">
                                <form id="buscaEntrada">
                                    <input type="text" id="entrada" class="busca-control"
                                        placeholder="Digite uma Palavra Chave para Buscar">

                                    <button type="submit" class="busca-button" form="buscaEntrada"><i
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
        <div class="modal-container" id="modal-entrada">
            <div class="modal-entrada" id="sub-entrada">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Registrar Entrada/Saída</p>
                <form id="entradaForm" class="modal-form">
                    <div class="control-input">
                        <label for="">Selecione o Animal</label>
                        <select name="" id="animal" class="select-input">
                            <?php 
                                 $sql = "SELECT *from animal";
                                 $ex = $con->prepare($sql);
                                 $ex->execute();

                                 while($row = $ex->fetch(PDO::FETCH_ASSOC)){
                                     echo  '<option value="'.$row['apelido'].'">'.$row['apelido'].'</option>';
                                 }
                            ?>

                        </select>
                    </div>
                    <div class="control-input">
                        <label for="">Tipo de Movimentação</label>
                        <select name="" id="movimentacao" class="select-input">
                            <option value="Aquisição">Aquisição</option>
                            <option value="Tranferência - Entrada">Tranferência - Entrada</option>
                            <option value="Tranferência - Saída">Tranferência - Saída</option>
                            <option value="Nascimento">Nascimento</option>
                            <option value="Venda ou Negociação">Venda ou Negociação</option>
                            <option value="Morte ou Abate">Morte ou Abate</option>
                        </select>
                    </div>
                    <div class="control-input">
                        <label for="">Data da Movimentação</label>
                        <input type="date" name="" id="data" class="input-date">
                    </div>

                    <label for="">Observação</label>
                    <textarea id="observacao" cols="30" rows="4"></textarea>

                    <input type="submit" form="entradaForm" value="Salvar" class="submit-bt" id="sub">
                </form>
            </div>
        </div>




        <div class="modal-container" id="editentrada">
            <div class="modal-entrada" id="sub-editentrada">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Registrar Entrada/Saída</p>
                <form id="entradaEdit" class="modal-form">
                    <div class="control-input">
                        <label for="">ID</label>
                        <input type="text" name="" id="editid" class="input-text" readonly>
                        </select>
                    </div>
                    <div class="control-input">
                        <label for="">Animal</label>
                        <input type="text" name="" id="editanimal" class="input-text">
                        </select>
                    </div>
                    <div class="control-input">
                        <label for="">Tipo de Movimentação</label>
                        <input type="text" name="" id="editmovimentacao" class="input-text">
                    </div>
                    <div class="control-input">
                        <label for="">Data da Movimentação</label>
                        <input type="text" name="" id="editdata" class="input-date">
                    </div>

                    <label for="">Observação</label>
                    <textarea id="observacao" cols="30" rows="4"></textarea>

                    <input type="submit" form="entradaEdit" value="Salvar" class="submit-bt" id="sub">
                </form>
            </div>
        </div>


    </div>
    <!---FECHA DASH CONTAINER------->





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
    function updatEntrada(id) {

        onModal('editentrada', 'sub-editentrada');

        $.ajax({
            url: '../config/selectId.php',
            method: 'POST',
            data: {
                tabela: 'entrada_saida',
                id: id
            },
            dataType: 'json'
        }).done(function(result) {

            $('#editid').val(result[0].id);
            $('#editanimal').val(result[0].animal);
            $('#editmovimentacao').val(result[0].movimentacao);
            $('#editdata').val(result[0].data);
            $('#editobservacao').val(result[0].observacao);
        });
    }

    $('#entradaEdit').submit(function(e) {
        e.preventDefault();
        var _id = $('#editid').val();
        var _animal = $('#editanimal').val();
        var _movimentacao = $('#editmovimentacao').val();
        var _data = $('#editdata').val();
        var _obs = $('#editobservacao').val();


        $.ajax({
            url: '../config/update.php',
            method: 'POST',
            data: {
                tabela: 'entrada_saida',
                id: _id,
                animal: _animal,
                movimentacao: _movimentacao,
                data: _data,
                observacao: _obs
            },
            dataType: 'json'
        }).done(function(result) {
            console.log('oi');
            notify(result);
            getEntrada();
        });


    });


    getEntrada();

    countEntrada();
    countSaida();
    </script>
    <!-------------------------------------------------------------->

</body>

</html>