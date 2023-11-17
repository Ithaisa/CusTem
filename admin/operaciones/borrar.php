<?php
    $id = $_GET['id'];
    require '../../includes/config/database.php';
    $db = conectarBD();

    // Nombre de la imagen antes de eliminarla
    $nombreImagenQuery = "SELECT Imagen FROM productos WHERE IDProducto = ?";
    $stmtImg = $db->prepare($nombreImagenQuery);
    $stmtImg->bind_param('i', $id);
    $stmtImg->execute();
    $stmtImg->bind_result($image);
    $stmtImg->fetch();
    $stmtImg->close();


    $deleteQuery = "DELETE FROM productos WHERE IDProducto = ?";
    $stmt = $db->prepare($deleteQuery);
    $stmt->bind_param('i', $id);

    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $ruta = "../../imagenes/" . $image;
        unlink($ruta);
        header("Location: /admin?resultado=3");
    } else{
        header("Location: /admin?resultado=4");
    }

?>