<?php
    require '../../includes/funciones.php';
    require '../../includes/config/database.php';
    incluirTemplate('header');
    $errores=[];
    $db=conectarBD();
    define('MEDIDA', 1024);

    //Inicializa los valores a vacío
    $nombre='';
    $descripcion='';
    $precio='';
    $categoria='';
    $imagen='';

    if ($_SERVER['REQUEST_METHOD']==="POST"){
         //comprobamos los datos
        $nombre= $_POST['nombre'];
        $descripcion= $_POST['descripcion'];
        $precio= $_POST['precio'];
        $categoria= $_POST['categoria'];
        $imagen= $_FILES['imagen'];
        //creamos la carpeta imágenes en la raíz del proyecto si es que no existe
        $carpetaImagenes='../../imagenes/';
        if (!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }
        //controlando los mensajes de error en la validación del formulario
        if (!$nombre) {
            $errores[]="Debes añadir un nombre";
        }
        else if (!$descripcion) {
            $errores[]="Debes añadir una descripción";
        }
        else if (!$precio) {
            $errores[]="Debes añadir un precio";
        }
        else if (!$categoria) {
            $errores[]="Debes añadir una categoría";
        }
        else if (!$imagen['name']) {
            $errores[]="Debes seleccionar una imagen";
        }

        //valida la imagen por tamaño (medida máxima en kb)
        if (($imagen['size']/1024 > MEDIDA)){
            $errores[]="Reduzca el tamaño de la imagen, debe ser menor a ". MEDIDA ."kb.";
        }       
        else{
            //Generar nombre único
            $nombreImagen=md5(uniqid(rand(),true)) . ".jpg";
        }       
        
        //ahora es donde realmente insertamos los valores en la bd. Solo se introduce el campo si el array de errores está vacío
        if(empty($errores)){
            $query="INSERT INTO productos(nombre, descripcion, precio, categoria, imagen)   
            VALUES ('$nombre', '$descripcion', '$precio', '$categoria','$nombreImagen');";
        $resultado=mysqli_query($db,$query);

        if ($resultado) {
            header('Location:/admin?resultado=1');
             //subir archivo
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes.$nombreImagen);
        }
    }
}    
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>
    <form action="/admin/operaciones/crear.php" class="formulario-ad" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend class="legend-ad">Informacion General</legend>

            <label class="label-ad" for="titulo">Nombre: </label>
            <input class="input-ad" type="text" id="nombre" name="nombre" value=<?php echo $nombre?>>

            <label  class="label-ad" for="precio">Precio:</label>
            <input class="input-ad" type="number" name="precio" id="precio" value=<?php echo $precio?>>

            <label class="label-ad" for="imagen">Imagen:</label>
            <input class="input-ad" type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png, image/jpg">
            
            <label class="label-ad" for="Descripcion">Descripcion:</label>
            <input class="textarea-ad" type="text-area" name="descripcion" id="descripcion" placeholder="Descripción del producto..." value=<?php echo $descripcion?>>

            <label class="label-ad" for="estacionamiento">Categoría:</label>
            <input class="textarea-ad" type="text-area" name="categoria" id="categoria" placeholder="Ropa, taza..." value=<?php echo $categoria?>>

        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value="1">César</option>
            </select>
        </fieldset>    
        <input type="submit" name="" id="" class="btn-add" value="Crear propiedad">
    </form>
    <a href="/admin/index.php" class="btn-add">Volver</a>
</main>

<!-- <?php
    //incluirTemplate('footer');
?> -->