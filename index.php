<?php
use App\Producto;
    require './includes/funciones.php';
    incluirTemplate('header');
?>
    <main>
        <div class="main-container">
            <img src="/public/img/taza-star-wars-darth-vader-removebg-preview.png" alt="">
            <p class ="img-container">Tu imaginación es el límite, <br> nosotros lo personalizamos</p>
    </main>

    <h1>PRODUCTOS MÁS DESTACADOS</h1>
    <div class="container-productos">   
        <?php //foreach(Producto::all() as $producto) {
            include './includes/templates/vistas/itemView.php';  ?>

            <?php //}?>
        <!-- <img src="/public/img/Imagen1.jpg" alt="">
        <img src="/public/img/Imagen2.jpg" alt="">
        <img src="/public/img/Imagen3.jpg" alt="">
        <img src="/public/img/Imagen4.jpg" alt="">
        <img src="/public/img/Imagen5.jpg" alt="">
        <img src="/public/img/Imagen6.jpg" alt="">
        <img src="/public/img/Imagen7.jpg" alt="">
        <img src="/public/img/Imagen8.jpg" alt="">
        <img src="/public/img/Imagen9.jpg" alt="">
        <img src="/public/img/Imagen10.jpg" alt=""> -->
    </div>
    <script src="https://kit.fontawesome.com/e5d388d5d6.js" crossorigin="anonymous"></script>
    <script src="/public/js/carrito.js"></script>
    <?php 
        incluirTemplate('footer');
    ?>
</body>
</html>
