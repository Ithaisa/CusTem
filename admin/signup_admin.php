<?php
require '../includes/funciones.php';
require '../includes/config/database.php';
if(isset($_POST['btnRegistro'])){
    if(crearUsuario()){
        header('Location:/admin/login_admin.php?res=1');
        
    } else{
        echo 'Error al crear usuario';
    }
}
?>
<link rel="stylesheet" href="../public/css/login_admin.css">
<body>
    <div class="login-container">
        <h2>Registro de Administrador</h2>
        <form method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn" name="btnRegistro">Registrarse</button>
        </form>
    </div>
</body>
</html>