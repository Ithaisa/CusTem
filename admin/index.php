
<?php
    $resultado=$_GET['resultado']??null;
    require '../includes/funciones.php';
    require '../includes/config/database.php';
    session_start();
    if(!isset($_SESSION['id'])){
       header('Location: /admin/login.php');
    }
    incluirTemplate('header');

    $db=conectarBD();
    $query = "SELECT * FROM productos;";
    $datos= mysqli_query($db, $query);
?>

<link rel="stylesheet" href="index.css">
<main class="contenedor section">
    <h1>Administrador</h1>
    <?php if (intval($resultado)===1){ ?>
        <p class="alerta exito">Anuncio creado correctamente</p>
    <?php } ?>
    <a href="/admin/productos/crear.php" class="boton boton-verde">Añadir producto</a>
    <table>
        <!-- Fila 1 -->
        <tr>
            <td>Imagen</td>
            <td>ID</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Operaciones</td>
        </tr>
        <?php while($fila = mysqli_fetch_assoc($datos)){?>
            <tr>                
                <td> <img src="../imagenes/<?php echo $fila['Imagen']?>"> </td>
                <td> <?php echo $fila['IDProducto']?></td>
                <td> <?php echo $fila['Nombre']?> </td>
                <td> <?php echo $fila['Descripcion']?> </td>
                <td class="operaciones"> 
                    <a href="/admin/operaciones/actualizar.php/?id=<?php echo $fila['IDProducto'];?>">Actualizar propiedad</a>
                    <a class="boton boton-verde" href="/admin/operaciones/borrar.php/?id=<?php echo $fila['IDProducto'];?>">Borrar propiedad</button>
                </td>
            </tr>
            <?php }?>
            
        </table>    
    </main>
    <!-- <script src="/build/propiedades/borrar.js"></script> -->