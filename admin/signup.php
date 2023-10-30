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

<main>
   <div class ="wrapper">
    <form method="post">
        <h1>Sign up</h1>
        <div class="input-box">
            <input name="usuario" type="text" placeholder="Usuario" required>
        </div>
        <div class= "input-box">
        <input name="password" type="password" placeholder="Contraseña" required>
        </div>
        <button type="submit" name="btnRegistrar"class = "btn">Sign up</button>
    </form>
    </div>
</main>
