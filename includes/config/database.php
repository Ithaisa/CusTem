<?php
    function conectarBD(){
        $db = mysqli_connect('localhost','root','','custem');
        if (!$db){
            echo "Error: no se puede conectar a la base de datos.";
            exit;
        }else{
            return $db;
        }
    }
?>