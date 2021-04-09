<?php
    include "connection.php";
 if(isset($_POST['send_foto'])){
                    
                    $foto = $_FILES['foto']['name'];
                    $sql = "UPDATE login set perfil = :foto";
                    $execute = $con->prepare($sql);
                    $execute->bindParam(':foto',$foto);
                    if($execute->execute()){

                        $diretorio = '../images/';

                        move_uploaded_file($_FILES['foto']['tmp_name'],$diretorio.$foto);

                        header("Location: ../views/config.php");
                    }

                }

?>