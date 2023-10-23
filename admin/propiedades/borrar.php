<?php
    require '../../includes/funciones.php';
    require '../../includes/config/database.php';
    incluirTemplate('header');


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $db = conectarBD();
    $query = "DELETE FROM propiedades WHERE id = $id";

    if (mysqli_query($db, $query)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
?>

<?php
    incluirTemplate('footer');
?>