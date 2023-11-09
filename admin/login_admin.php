<!DOCTYPE html>
<html>
<head>
    <title>Login de Administrador</title>
    <link rel="stylesheet" href="../public/css/login_admin.css">
</head>
<body>
    <div class="login-container">
        <h2>Login de Administrador</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Usuario:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn">Iniciar sesión</button>
        </form>
    </div>
</body>
</html>
