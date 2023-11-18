<?php
// $res = $_GET['res']??null;
require '../includes/funciones.php';
require '../includes/config/database.php';
// if($res){
//     echo 'Usuario creado correctamente. Inicia sesión.';
// }

session_start();
// if(isset($_SESSION['id'])){
//     header('Location: /admin/index.php');
// }
if(isset($_POST['btnIniciar'])){
    if(iniciarUsuario()){
        header('Location: /admin/index.php');
        
    } else{
        echo 'Error al iniciar sesión.';
    }
}
?>
<link rel="stylesheet" href="../public/css/login_admin.css">
<body>
    <div class="login-container">
        <h2>Login de Administrador</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn" name="btnIniciar">Iniciar sesión</button>
            <div class ="signup-link">
            <a href="/admin/signup_admin.php">Registrarse</a>
            </div>
        </form>
    </div>
</body>
</html>

