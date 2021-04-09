<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login SCAC</title>

    <link rel="stylesheet" href="css/all-in.css">
    <link rel="stylesheet" href=".css">
    <!--BOOTSTRAP-->
    <link rel="stylesheet" href="pluguins/bootstrap/css/bootstrap.min.css">
    <!--FONTEAWESOME-->
    <link rel="stylesheet" href="pluguins/fontawesome/css/fontawesome.min.css">
    <!--ANIMATE.CSS--->
    <link rel="stylesheet" href="pluguins/animate/animate.css">


    <!---------------------------------------------------------->
</head>
<body>
    <div class="container-login">
        <div class="login-box">
            <div class="login-pic rotateInDownRight">
                <img src="images/img-01.png" alt="logo">
            </div>
            <div class="login-form">


               
                <form action="config/verify-login.php" method="POST" class="form">
                <h1>LOGIN</h1>
                <?php 

if(isset($_GET['user'])){
    echo '<div class="alert alert-danger" role="alert">
    E-Mail e/ou Senha Incorreta
  </div>';
}

?>
                    <div class="input-control">
                        <span class="email-icon">
                        <i class="fa fa-key"></i>
                        </span>
                        <input type="email" class="email-control" placeholder="Digite seu E-Mail" name="email"/>
                    </div>
                    <div class="input-control">
                        <span class="email-icon">
                        <i class="fa fa-envelope"></i>
                        </span>
                        <input type="password" class="email-control" placeholder="Digite sua Senha" name="senha"/>
                    </div>
                    <div class="submit">
                       <input type="submit" value="Logar" name="ok"/>
                    </div>
                    <div class="pass-forget">
                        <span>
                           <a href="">Esqueceu a Senha?</a> 
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!---SCRIPTS------->
    <script src="pluguins/bootstrap/js/bootstrap.min.js"></script>
    <script src="pluguins/fontawesome/js/fontawesome.min.js"></script>
    <script src="pluguins/jquery/jquery-3.2.1.min.js"></script>
  
    <!-------------------------------------------------------------->
</body>
</html>