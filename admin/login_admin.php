<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
$db=conectarBD();
incluirTemplate('header');
if(isset($_POST['btnIniciar'])){
    if(iniciarUsuario($db)){
        header('Location: /admin/index.php');
        
    } else{
        echo 'no iniciado';
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
        </form>
    </div>
</body>
</html>

