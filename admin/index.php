<?php
    $resultado=$_GET['resultado']??null;
    require '../includes/funciones.php';
    require '../includes/config/database.php';
    incluirTemplate('header');
    session_start();
    if(!isset($_SESSION['id'])){
       header('Location: /admin/login_admin.php');
    }
    $db=conectarBD();
    $query = "SELECT * FROM productos;";
    $datos= mysqli_query($db, $query);
?>

<link rel="stylesheet" href="/../public/css/style.css">
<main class="contenedor section">
    <h1>Administrador</h1>
    <?php switch(intval($resultado)){
        case 1:
        ?>
        <p class="alerta exito">Producto creado correctamente</p>
    <?php break;
        case 2:?>
        <p class="alerta exito">Producto actualizado correctamente</p>
    <?php
        break;
        case 3:?>
        <p class="alerta exito">Producto borrado correctamente</p>
        <?php
        break;
        case 4:?>
    <p class="alerta exito">Error al borrar producto</p>
    <?php
    break;
    default:
    break;}
    ?>

    <a href="/admin/operaciones/crear.php" class="btn-add">Añadir producto</a>
    <table>
        <!-- Fila 1 -->
        <tr>
            <td>Imagen</td>
            <td>ID</td>
            <td>Nombre</td>
            <td>Precio</td>
            <td>Descripción</td>
            <td>Operaciones</td>
        </tr>
        <?php while($fila = mysqli_fetch_assoc($datos)){?>
            <tr>                
                <td> <img src="../imagenes/<?php echo $fila['Imagen']?>"> </td>
                <td> <?php echo $fila['IDProducto']?></td>
                <td> <?php echo $fila['Nombre']?> </td>
                <td> <?php echo $fila['Precio']?> </td>
                <td> <?php echo $fila['Descripcion']?> </td>
                <td class="operaciones"> 
                    <a class="btn-add" href="/admin/operaciones/actualizar.php/?id=<?php echo $fila['IDProducto'];?>">Actualizar propiedad</a>
                    <a class="btn-add" href="/admin/operaciones/borrar.php/?id=<?php echo $fila['IDProducto'];?>">Borrar propiedad</button>
                </td>
            </tr>
            <?php }?>
            
        </table>    
    </main>
    <!-- <script src="/build/propiedades/borrar.js"></script> -->