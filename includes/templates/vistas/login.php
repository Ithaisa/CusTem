<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="/public/css/login.css">
    <title>CusTem | Login </title>
</head>
<body>

<a href="../../../index.php" class="volver">Volver</a>
<?php
include './SignUp.php';
include './SignIn.php';
?>

<div class="toggle-container">
    <div class="toggle">
        <div class="toggle-panel toggle-left">
            <h1>¡Bienvenido de nuevo!</h1>
                <p>Regístrese con sus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="login">Iniciar sesión</button>
        </div>

        <div class="toggle-panel toggle-right">
            <h1>¡Hola, amig@!</h1>
            <p>Regístrese con sus datos personales para utilizar todas las funciones del sitio</p>
                    <button class="hidden" id="register">Registrate</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/login.js"></script>
</body>
</html>