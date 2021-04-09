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

                <div class="lembrete-buttons">
                    <button class="add-lembrete" onclick="onModal('modal-lembrete','sub-lembrete')">Criar
                        Lembrete</button>
                </div>
                <div class="lembretes" id="lembretes">
                  


                </div>

            </div>
            <!---FECHA MAIN ------->
        </div>
        <!---FECHA MAIN CONTENT------->
        <div class="modal-container" id="modal-lembrete">
            <div class="modal-atividade" id="sub-lembrete">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Adicionar Lembrete</p>
                <form id="formLembrete" class="modal-form">
                    <label for="">Título</label>
                    <input type="text" name="" id="titulo" class="input-text">
                    <label for="">Descrição</label>
                    <textarea id="descricao" cols="30" rows="4"></textarea>
                    <input type="submit" form="formLembrete" value="Salvar" class="submit-bt" id="sub">
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
    <script>
    $('#formLembrete').submit(function(e) {
        e.preventDefault();
        var _descricao = $('#descricao').val();
        var _titulo = $('#titulo').val();
        $.ajax({
            url: '../config/insert.php',
            method: 'POST',
            data: {
                tabela: 'lembrete',
                descricao: _descricao,
                titulo: _titulo
            },
            dataType: 'json'
        }).done(function(result) {
            notify(result);
            getLembretes();
        });
    });

    function delLembrete(id){
    var _id = id;
    $.ajax({
        url: '../config/delete.php',
        method: 'POST',
        data: {tabela: 'lembrete', id : id},
        dataType: 'json'
    }).done(function(result){

        notify(result);
         getLembretes();
        
    });
}


    function getLembretes() {
        $.ajax({
            url: '../config/select.php',
            method: 'POST',
            data: {
                tabela: 'lembrete'
            },
            dataType: 'json'
        }).done(function(result) {
            console.log(result);
            var box = document.querySelector('.lembretes');
            while (box.firstChild) {
                box.firstChild.remove();
            }

            for (var j = 0; j < result.length; j++) {
                
                $('#lembretes').prepend('<div class="lembrete-card">'
                +'<span class="icon-pin"><i class="bx bxs-pin"></i></span>'
                +'<h3>'+ result[j].titulo +'</h3>'
                +'<p>'+ result[j].descricao +'</p>'
                +'<p class="lembrete-date">'+ result[j].data +'</p>'
                +'<span class="delButton" onclick="delLembrete('+ result[j].id +')"><i class="bx bx-trash-alt"></i></span>'
                +'</div>');
             
            }


        });
    }

    getLembretes();

    </script>
    <!-------------------------------------------------------------->

</body>

</html>