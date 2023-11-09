<?php
require './includes/funciones.php';
incluirTemplate('header');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Catálogo | CusTem</title>
</head>

<body>
<a href="/index.php" class="volver">Volver</a>

    <h1>Catálogo</h1>
    <div class="container-productos">
        <div class="producto">
            <img src="/public/img/Imagen1.jpg" alt="Producto1" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen2.jpg" alt="Producto2" />
            <span>Taza</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen3.jpg" alt="Producto3" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen4.jpg" alt="Producto4" />
            <span>Chapas</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen5.jpg" alt="Producto5" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen6.jpg" alt="Producto6" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen7.jpg" alt="Producto7" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen8.jpg" alt="Producto8" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen9.jpg" alt="Producto9" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>

        <div class="producto">
            <img src="/public/img/Imagen10.jpg" alt="Producto10" />
            <span>Camiseta</span>
            <p>Descripción:</p>
            <p>Precio:</p>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/e5d388d5d6.js" crossorigin="anonymous"></script>
    <script src="/public/js/carrito.js"></script>
    <?php 
        incluirTemplate('footer');
    ?>
</body>
</html>