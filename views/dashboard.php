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

    <style>
    .welcome {
        width: 100%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.8)), url('../images/back.jpg');
        background-size: cover;
        background-position: center;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .charts {
        width: 100%;
        padding: 20px;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .chart-cards {
        width: 500px !important;
        padding: 10px;
    }
    </style>
    <!--STYLESHEETS-->
    <link rel="stylesheet" href="../css/all-in.css">
    <link rel="stylesheet" href="../css/dashboard.css">

    <!--BOOTSTRAP-->

    <!--FONTEAWESOME-->
    <link rel="stylesheet" href="../pluguins/fontawesome/css/fontawesome.min.css">
    <!--ANIMATE.CSS--->
    <link rel="stylesheet" href="../pluguins/animate/animate.css">
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

                    <span class="side-logo-text" id="list-name-id">SCAC 2.0</span>

                </div>
            </a>
            <div class="nav-sidebar">
                <a href="dashboard.php">
                    <div class="nav-list active">
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
                <div class="welcome">
                    <div class="text-welcome">

                        <h2> Bem Vindo <?php selectAll('login',$con,'username'); ?></h2>
                        <p><?php echo date('d/m/Y H:i'); ?> </p>


                    </div>
                    <div class="welcome-lembrete">
                        <div class="lembrete-title">
                            <span class="lembrete-data"><?php echo date('d/m'); ?></span>
                            <span class="lembrete-title-text">Último Lembrete</span>
                        </div>
                        <div class="lembrete-corpo">
                            <p>
                            <?php selectUltimo($con,'lembrete','descricao'); ?>
                            </p>
                        </div>
                        <div class="lembrete-footer">
                            
                        </div>
                    </div>

                </div>

                <div class="charts">
                    <div class="chart-cards">
                        <canvas class="animaisChart">

                        </canvas>
                    </div>

                    <div class="chart-cards">
                        <canvas class="estoqueChart">

                        </canvas>
                    </div>

                </div>
            </div>
        </div>

    </div>



    <!---SCRIPTS------->
    <script src="../node_modules/chart.js/dist/Chart.js"></script>
    <script src="../js/main.js"></script>
    <script src="../pluguins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../pluguins/fontawesome/js/fontawesome.min.js"></script>
    <script src="../pluguins/jquery/jquery-3.2.1.min.js"></script>

    <script>
    var ctxAnimais = document.getElementsByClassName("animaisChart");
    var myPieChart = new Chart(ctxAnimais, {
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
                <?php countRow($con, 'animal','categoria','Outros');?>],
                backgroundColor: ['#25283D', '#8F3985', '#98DFEA', '#07BEB8', '#EE7674', '#725AC1',
                    '#FF36AB'
                ]


            }],

        },
        options: {
        title: {
            display: true,
            text: 'Animais'
        }
    }
    });

    var ctxEstoque = document.getElementsByClassName("estoqueChart");
    var chartEstoque = new Chart(ctxEstoque, {
        type: 'bar',
        data: {
            labels: [
                'Ração',
                'Vacinas',
                'Insumo'
            ],

            datasets: [{
                data: [ <?php countRow($con, 'estoque','categoria','Ração');?>, 
                <?php countRow($con, 'estoque','categoria','Vacina');?>, 
                <?php countRow($con, 'estoque','categoria','Insumo');?>],
                backgroundColor: ['#25283D', '#8F3985', '#98DFEA']
            }],
        },
        options: {
        title: {
            display: true,
            text: 'Estoque'
        }
    }

    });
    </script>
    <!-------------------------------------------------------------->
</body>

</html>