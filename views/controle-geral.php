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
    <link rel="stylesheet" href="../node_modules/chart.js/dist/Chart.css">
    <!--BOXICON.CSS--->
    <link rel="stylesheet" href="../pluguins/boxicons/css/boxicons.min.css">
    <link rel="stylesheet" href="../pluguins/boxicons/css/transformations.css">
    <link rel="stylesheet" href="../pluguins/boxicons/css/animations.css">

    <!---------------------------------------------------------->


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
                    <div class="nav-list active">
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
                    <span class="lembrete-icon">
                        <i class='bx bxs-notepad'></i>
                    </span>
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
                        <i class='bx bxs-bar-chart-alt-2'></i>
                        <p class="p-title"><b>Controle Geral</b><br> <span class="p-subtitle">Gerencia e Controle Geral
                                dos Animais da Propriedade</span> </p>
                    </div>
                </div>

                <div class="header-cards">
                    <div class="graphControle">
                        <canvas class="pie-chart">

                        </canvas>
                    </div>

                    <div class="cards">
                        <div class="cards-itens card1">
                            <div class="card-icon">
                                <i class='bx bx-cookie'></i>
                            </div>
                            <p>
                                <b>Animais</b>
                            </p>
                            <p class="card-number number-animal" id="number-animal"></p>
                            <p>Total</p>
                        </div>


                    </div>


                </div>
                <div class="dados">
                    <button> <i class='bx bx-category-alt'></i> Controle Animal Geral</button>
                </div>
                <div class="content-tables">
                    <div class="table-card card-estoque">
                        <div class="table-header card1">
                            <p>Controle de Animais</p>

                            <button id="" onclick="onModal('modal-animal','sub-animal')"><i
                                    class='bx bx-add-to-queue'></i></button>

                        </div>
                        <div class="main-table">
                            <table class="table animal-table" id="animal-table">
                                <tr class=title>
                                    <td>Data de Registro</td>
                                    <td>Apelido</td>
                                    <td>Nº de Registro</td>
                                    <td>Categoria</td>
                                    <td>Sexo</td>
                                    <td>Raça</td>
                                    <td>Ação</td>
                                </tr>


                            </table>
                        </div>
                        <div class="table-footer">
                            <div class="busca-input">
                                <form id="animalBusca">
                                    <input type="text" id="buscaInput" class="busca-control"
                                        placeholder="Digite Palavras Chaves para Buscar">

                                    <button type="submit" class="busca-button" form="animalBusca"><i
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

        <div class="modal-container" id="modal-animal">
            <div class="modal-animal" id="sub-animal">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Dados Gerais</p>
                <form id="formAnimal" class="modal-form">
                    <div class="control-input">
                        <table>
                            <tr>
                                <td> <label for="">Número de Registro</label></td>
                                <td class="td-input"> <input type="text" id="numero_registro" class="input-text"
                                        placeholder="Digite o Número de Registro"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Apelido</label></td>
                                <td class="td-input"> <input type="text" id="apelido" class="input-text"
                                        placeholder="Digite o Apelido"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nome de Registro</label></td>
                                <td class="td-input"> <input type="text" id="nome_registro" class="input-text"
                                        placeholder="Digite o Nome de Registro"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Sexo</label></td>
                                <td class="td-input">
                                    <select id="sexo" class="select-input">
                                        <option value="Macho">Macho</option>
                                        <option value="Fêmea">Fêmea</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <label for="">Categoria</label></td>
                                <td class="td-input">
                                    <select id="categoria" class="select-input">
                                        <option value="Bovino">Bovino</option>
                                        <option value="Caprino">Caprino</option>
                                        <option value="Suíno">Suíno</option>
                                        <option value="Ovino">Ovino</option>
                                        <option value="Aves">Aves</option>
                                        <option value="Equino">Equino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td> <label for="">Raça</label></td>
                                <td class="td-input"> <input type="text" id="raca" class="input-text"
                                        placeholder="Digite o Nome da Raça"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nome do Pai</label></td>
                                <td class="td-input"> <input type="text" id="nome_pai" class="input-text"
                                        placeholder="Digite o Nome do Pai"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nome da Mãe</label></td>
                                <td class="td-input"> <input type="text" id="nome_mae" class="input-text"
                                        placeholder="Digite o Nome da Mãe"></td>
                            </tr>

                        </table>


                        <p class="modal-title">Dados Gerais</p>
                        <table>
                            <tr>
                                <td> <label for="">Data de Entrada</label></td>
                                <td class="td-input"> <input type="date" id="data_entrada" class="input-date"
                                        placeholder=""></td>
                            </tr>
                            <tr>
                                <td> <label for="">Peso Entrada</label></td>
                                <td class="td-input"> <input type="text" id="peso_entrada" class="input-text"
                                        placeholder="Peso de Entrada"></td>
                                <td> <label for="">Peso Atual</label></td>
                                <td class="td-input"> <input type="text" id="peso_atual" class="input-text"
                                        placeholder=" Peso Atual"></td>
                            </tr>

                            <tr>
                                <td> <label for="">Idade Entrada</label></td>
                                <td class="td-input"> <input type="text" id="idade_entrada" class="input-text"
                                        placeholder="Idade Entrada"></td>
                                <td> <label for="">Idade Atual</label></td>
                                <td class="td-input"> <input type="text" id="idade_atual" class="input-text"
                                        placeholder=" Idade Atual"></td>
                            </tr>

                            <tr>
                                <td> <label for="">Valor de Entrada</label></td>
                                <td class="td-input"> <input type="text" id="valor_entrada" class="input-text"
                                        placeholder="Valor de Entrada"></td>
                                <td> <label for="">Valor Atual</label></td>
                                <td class="td-input"> <input type="text" id="valor_atual" class="input-text"
                                        placeholder=" Valor Atua"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nascimento</label></td>
                                <td class="td-input"> <input type="date" id="nascimento" class="input-date"
                                        placeholder="Valor de Entrada"></td>
                            </tr>
                            <tr>
                                <td> Observações</td>
                            </tr>
                            <tr>
                                <td colspan="4"><Textarea rows="4" cols="30" id="observacao"></Textarea></td>
                            </tr>

                        </table>

                    </div>
                    <input type="submit" value="Salvar" class="submit-bt" form="formAnimal" id="sub">
                </form>
            </div>
        </div>


        <div class="modal-container" id="modal-editanimal">
            <div class="modal-animal" id="sub-editanimal">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Dados Gerais</p>
                <form id="editAnimal" class="modal-form">
                    <div class="control-input">
                        <table>
                            <tr>
                                <td> <label for="">ID</label></td>
                                <td class="td-input"> <input type="text" id="editId" class="input-text"
                                        placeholder="Digite o Número de Registro" readonly></td>
                            </tr>
                            <tr>
                                <td> <label for="">Número de Registro</label></td>
                                <td class="td-input"> <input type="text" id="enumero_registro" class="input-text"
                                        placeholder="Digite o Número de Registro"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Apelido</label></td>
                                <td class="td-input"> <input type="text" id="eapelido" class="input-text"
                                        placeholder="Digite o Apelido"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nome de Registro</label></td>
                                <td class="td-input"> <input type="text" id="enome_registro" class="input-text"
                                        placeholder="Digite o Nome de Registro"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Sexo</label></td>

                                <td class="td-input"> <input type="text" id="esexo" class="input-text"></td>

                            </tr>
                            <tr>
                                <td> <label for="">Categoria</label></td>

                                <td class="td-input"> <input type="text" id="ecategoria" class="input-text" readonly>
                                </td>

                            </tr>
                            <tr>
                                <td> <label for="">Raça</label></td>
                                <td class="td-input"> <input type="text" id="eraca" class="input-text"
                                        placeholder="Digite o Nome da Raça"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nome do Pai</label></td>
                                <td class="td-input"> <input type="text" id="enome_pai" class="input-text"
                                        placeholder="Digite o Nome do Pai"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nome da Mãe</label></td>
                                <td class="td-input"> <input type="text" id="enome_mae" class="input-text"
                                        placeholder="Digite o Nome da Mãe"></td>
                            </tr>

                        </table>


                        <p class="modal-title">Dados Gerais</p>
                        <table>
                            <tr>
                                <td> <label for="">Data de Entrada</label></td>
                                <td class="td-input"> <input type="date" id="edata_entrada" class="input-date"
                                        placeholder=""></td>
                            </tr>
                            <tr>
                                <td> <label for="">Peso Entrada</label></td>
                                <td class="td-input"> <input type="text" id="epeso_entrada" class="input-text"
                                        placeholder="Peso de Entrada"></td>
                                <td> <label for="">Peso Atual</label></td>
                                <td class="td-input"> <input type="text" id="epeso_atual" class="input-text"
                                        placeholder=" Peso Atual"></td>
                            </tr>

                            <tr>
                                <td> <label for="">Idade Entrada</label></td>
                                <td class="td-input"> <input type="text" id="eidade_entrada" class="input-text"
                                        placeholder="Idade Entrada"></td>
                                <td> <label for="">Idade Atual</label></td>
                                <td class="td-input"> <input type="text" id="eidade_atual" class="input-text"
                                        placeholder=" Idade Atual"></td>
                            </tr>

                            <tr>
                                <td> <label for="">Valor de Entrada</label></td>
                                <td class="td-input"> <input type="text" id="evalor_entrada" class="input-text"
                                        placeholder="Valor de Entrada"></td>
                                <td> <label for="">Valor Atual</label></td>
                                <td class="td-input"> <input type="text" id="evalor_atual" class="input-text"
                                        placeholder=" Valor Atua"></td>
                            </tr>
                            <tr>
                                <td> <label for="">Nascimento</label></td>
                                <td class="td-input"> <input type="date" id="enascimento" class="input-date"
                                        placeholder="Valor de Entrada"></td>
                            </tr>
                        </table>

                    </div>
                    <input type="submit" value="Salvar" class="submit-bt" form="editAnimal" id="sub">
                </form>
            </div>
        </div>




    </div>
    <!---FECHA DASH CONTAINER------->








    <script src="../node_modules/chart.js/dist/Chart.js"></script>
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
    function countAnimal() {

        var box = document.querySelector('.number-animal');
        while (box.firstChild) {
            box.firstChild.remove();
        }
        $.ajax({
            url: '../config/count.php',
            method: 'POST',
            data: {
                tabela: 'animal'
            },
            dataType: 'json'
        }).done(function(result) {
            console.log(result);
            $('#number-animal').append(result);
        });
    }
    countAnimal();
    getsAnimal();


    function viewAnimal(id) {

        varWindow = window.open('prints/view.php?id=' + id);

    }
    </script>

    <script>
    var ctx = document.getElementsByClassName("pie-chart")
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: [
                'Bovino',
                'Caprino',
                'Suino',
                'Ovino',
                'Aves',
                'Equinos',
                'Outros'
            ],

            datasets: [{
                data: [<?php countRow($con, 'animal','categoria','Bovino');?>,
                    <?php countRow($con, 'animal','categoria','Caprino');?>,
                    <?php countRow($con, 'animal','categoria','Suino');?>,
                    <?php countRow($con, 'animal','categoria','Ovino');?>,
                    <?php countRow($con, 'animal','categoria','Aves');?>,
                    <?php countRow($con, 'animal','categoria','Equinos');?>,
                    <?php countRow($con, 'animal','categoria','Outros');?>
                ],
                backgroundColor: ['#25283D', '#8F3985', '#98DFEA', '#07BEB8', '#EE7674', '#725AC1',
                    '#FF36AB'
                ]


            }],



        }
    });
    </script>
    <!-------------------------------------------------------------->

</body>

</html>