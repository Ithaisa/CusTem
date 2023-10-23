
<?php
    $resultado=$_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    require '../includes/config/database.php';
    incluirTemplate('header');

    $db=conectarBD();
    $query = "";
    //$datos= mysqli_query($db, $query);
?>

<link rel="stylesheet" href="index.css">
<main class="contenedor section">
    <h1>Administrador</h1>
    <?php if (intval($resultado)===1){ ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php } ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
    <table>
        <!-- Fila 1 -->
        <tr>
            <td>Imagen</td>
            <td>ID</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Operaciones</td>
        </tr>
        <?php {//while($fila = mysqli_fetch_assoc($datos)){?>
            <tr>
                <td> <img src="/build/img/<?php echo $fila['imagen']?>"> </td>
                <!-- <td> <?php echo $fila['IDProducto']?></td>
                <td> <?php echo $fila['Nombre']?> </td>
                <td> <?php echo $fila['Imagen']?> </td>
                <td> <?php echo $fila['Descripcion']?> </td> -->
                

                <td class="operaciones">
                    <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar propiedad</a>
                    <button class="boton boton-verde"
                    onclick="borrarPropiedad(<?php echo $fila['id'];?>)">Borrar propiedad</button>
                </td>
            </tr>
            <?php }?>
            
        </table>    
    </main>
    <script src="/build/propiedades/borrar.js"></script>