<?php
    //Crear clase cliente

    class Clientes {
        
    }
    //El inicio de sesion de la base de datos
    //crear un metodo de la clase para el login
    //crear método para crear usuarios.
?>


<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
incluirTemplate('header');

if(isset($_POST['btnIniciarSe'])){
    echo 'lo intenta1';
    if(iniciarUsuario()){
        header('Location: /admin/index.php');
        
    } else{
        echo 'no iniciado';
    }
}

?>

<?php
    require '../includes/funciones.php';
    require '../includes/config/database.php';
    incluirTemplate('header');
    if(isset($_POST['btnRegistrar'])){
        if(crearUsuario()){
            echo 'Usuario creado';
            header('Location: /admin/login.php');
        }
    }

?>