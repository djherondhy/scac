<?php
    include "connection.php";
    
    $ok = "$_POST[ok]";
    
    if(isset($ok)){
        session_start();

        $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST,'senha',FILTER_SANITIZE_STRING);

        $sql = $con->prepare("SELECT *FROM login WHERE email = ?");
        $sql->execute([$email]);

        if($sql->rowCount() == 1){
        $verify = $sql->fetch();
       
        if($password == $verify['password']){
            $_SESSION['id'] = $verify['id'];
            $_SESSION['user'] = $verify['username'];
            $_SESSION['email'] = $verify['email'];
            $_SESSION['logado'] = true;

            header("Location: ../views/dashboard.php?log= $_SESSION[logado]");
            die();
        }else{
            header("Location: ../index.php?user=false");
        }
        }else{
          header("Location: ../index.php?user=false");
        }
        

    }
?>