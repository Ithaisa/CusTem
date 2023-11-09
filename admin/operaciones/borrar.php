<?php
    $id = $_GET['id'];
    require '../../includes/config/database.php';
    $db = conectarBD();

    $deleteQuery = "DELETE from productos where IDProducto = $id";
    $imgName = "SELECT * from productos where IDProducto = $id";

    $img = mysqli_query($db, $imgName);
    while($fila=mysqli_fetch_object($img)){
        $image = $fila->Imagen;
    }


    $ruta = "../../imagenes/".$image;
    $delete = mysqli_query($db, $deleteQuery);

    if($delete) {
        unlink($ruta);
        header("Location:/admin/index-php/?resultado=3");
    }
    else{
        header("Location:/admin/index-php/?resultado=4");
    }
?>