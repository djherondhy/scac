<?php

try{
    $con = new PDO('mysql:host=localhost;dbname=scac','root','');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    }catch(PDOEXception $e){
        echo 'ERROR: '. $e->getMessage();
    }


?>
