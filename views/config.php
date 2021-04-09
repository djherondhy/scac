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
                    <div class="nav-list active">
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
                    <div class="nav-list ">
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
                        <i class='bx bxs-wrench'></i>
                        <p class="p-title"><b>Configurações de Usuário</b><br> <span class="p-subtitle">Altere seus
                                dados de Usuário</span> </p>
                    </div>
                </div>
                <div class="dados dados-perfil">
                    <button> <i class='bx bx-category-alt'></i>Dados Pessoais</button>
                </div>
                <div class="config-form">
                    <div class="img-perfil">
                        <img src="../images/<?php selectAll('login',$con,'perfil');?>" alt="" class="foto-perfil">
                       
                            <label for="perfil" class="bt-perfil" onclick="onModal('modal-foto','sub-foto')">Alterar Foto de Perfil</label>
                          
                        
                        </form>
                    </div>
                    <div class="perfil-form">
                       
                            <table>
                                <tr>
                                    <td><b>Nome</b></td>
                                    <td><input type="text" name="" id="exusername"
                                            value="<?php selectAll('login',$con,'username'); ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td><b>E-mail</b></td>
                                    <td><input type="text" name="" id="exemail"
                                            value="<?php selectAll('login',$con,'email'); ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td><b>Telefone</b></td>
                                    <td><input type="text" name="" id="extelefone"
                                            value="<?php selectAll('login',$con,'telefone'); ?>" disabled></td>
                                </tr>
                                <tr>
                                    <td><b>Nascimento</b></td>
                                    <td><input type="text" name="" id="exnasc"
                                            value="<?php selectAll('login',$con,'nasc'); ?>" disabled></td>
                                </tr>

                                <button class="buttons-perfil" onclick="updatePerfil(1)">Alterar Dados</button>
                                <button class="buttons-perfil" onclick=" updateSenha(1)">Alterar Senha</button>
                                </tr>
                            </table>
                      
                    </div>
                </div>






            </div>
            <!---FECHA MAIN ------->
        </div>
        <!---FECHA MAIN CONTENT------->


        <div class="modal-container" id="modal-perfil">
            <div class="modal-entrada" id="sub-perfil">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Alterar Dados</p>
                <form id="perfilForm" class="modal-form">
                <div class="control-input">
                        <label for="">ID</label>
                            <input type="text" name="" id="id" class="input-text" readonly>
                    </div>
                    <div class="control-input">
                        <label for="">Nome</label>
                            <input type="text" name="" id="username" class="input-text">
                    </div>
                    <div class="control-input">
                        <label for="">E-mail</label>
                            <input type="email" name="" id="email" class="input-text">
                    </div>
                    <div class="control-input">
                        <label for="">Telefone</label>
                            <input type="text" name="" id="telefone" class="input-text">
                    </div>
                    <div class="control-input">
                        <label for="">Nascimento</label>
                            <input type="text" name="" id="nasc" class="input-text">
                    </div>
                    <input type="submit" form="perfilForm" value="Salvar" class="submit-bt" id="sub">
                </form>
            </div>
        </div>

        <div class="modal-container" id="modal-senha">
            <div class="modal-entrada" id="sub-senha">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Alterar Senha</p>
                <form id="senhaForm" class="modal-form">
                <div class="control-input">
                    <label for="">ID</label>
                            <input type="text" name="" id="idSenha" class="input-text" readonly>
                    </div>
                    <div class="control-input">
                        <label for="">Senha Atual</label>
                            <input type="password" name="" id="atual" class="input-text">
                    </div>
                    <div class="control-input">
                        <label for="">Senha Nova</label>
                            <input type="password" name="" id="nova" class="input-text">
                    </div>
                   
                    <input type="submit" form="senhaForm" value="Salvar" class="submit-bt" id="sub">
                </form>
            </div>
        </div>

        <div class="modal-container" id="modal-foto">
            <div class="modal-atividade" id="sub-foto">
                <span class="bt-close">
                    <i class='bx bx-x' id="close"></i>
                </span>
                <p class="modal-title">Alterar Foto</p>
                <form method="POST" enctype="multipart/form-data" action="../config/foto.php"  style="padding: 30px !important;">
                    <label for="foto" class="bt-perfil">Selecionar Foto</label>
                    <input type="file" name="foto" id="foto" class="" style="display: none;">
                    <input type="submit" value="Salvar" class="submit-bt" id="sub" name="send_foto">
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
      getPerfil();
    </script>
    <!-------------------------------------------------------------->

</body>

</html>