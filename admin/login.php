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

<main>
   <div class ="wrapper">
    <form method="post">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="usuario" placeholder="Usuario" required>

        </div>
        <div class= "input-box">
        <input type="password" name="password" placeholder="Contraseña" required>
        </div>
        <div class="remember-me">
        <label><input type="checkbox"> Recuerdame</label>
        </div>
        <button name="btnIniciarSe" type="submit" class="btn">Login</button>
        <div class ="signup-link">
            <a href="/admin/signup.php">Registrarse</a>
        </div>
    </form>
    </div>
</main>
