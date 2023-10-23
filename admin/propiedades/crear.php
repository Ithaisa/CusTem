<?php
    require '../../includes/funciones.php';
    require '../../includes/config/database.php';
    incluirTemplate('header');
    $errores=[];
    $db=conectarBD();
    define('MEDIDA', 1024);

    //Inicializa los valores a vacío
    $titulo='';
    $precio='';
    $descripcion='';
    $vendedores_id='';
    $estacionamiento='';
    $wc='';
    $habitaciones='';
    $creado= '';

    if ($_SERVER['REQUEST_METHOD']==="POST"){
         //comprobamos los datos
        $titulo= $_POST['titulo'];
        $precio= $_POST['precio'];
        $imagen= $_FILES['imagen'];
        $descripcion= $_POST['descripcion'];
        $vendedores_id=$_POST['vendedor'];
        $estacionamiento=$_POST['estacionamiento'];
        $wc=$_POST['wc'];
        $habitaciones=$_POST['habitaciones'];
        
        
        
        //creamos la carpeta imágenes en la raíz del proyecto si es que no existe
        $carpetaImagenes='../../imagenes/';
        if (!is_dir($carpetaImagenes)){
            mkdir($carpetaImagenes);
        }

       //controlando los mensajes de error en la validación del formulario
        if (!$titulo) {
            $errores[]="Debes añadir un título";
        }
        else if (!$precio) {
            $errores[]="Debes añadir un precio";
        }
        else if (!$imagen) {
            $errores[]="Debes añadir una imagen";
        }
        else if (!$descripcion) {
            $errores[]="Debes añadir una descripción";
        }
        else if (!$vendedores_id) {
            $errores[]="Debes seleccionar un vendedor";
        }
        else if (!$estacionamiento) {
            $errores[]="Debes seleccionar un estacionamiento";
        }
        else if (!$wc) {
            $errores[]="Debes seleccionar un número de wc";
        }
        else if (!$habitaciones) {
            $errores[]="Debes seleccionar un número de habitaciones";
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
            $date = date("+Y/m/d");
            $query="INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones,wc,estacionamiento, creado, vendedores_id)   
            VALUES ('$titulo', '$precio', '$nombreImagen','$descripcion', '$habitaciones','$wc','$estacionamiento', '$date', '$vendedores_id');";
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
    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo" name="titulo">

            <label for="precio">Precio:</label>
            <input type="text" name="precio" id="precio">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png, image/jpg">

            <label for="Descripcion">Descripcion:</label>
            <input type="text-area" name="descripcion" id="descripcion" placeholder="Descripción de la propiedad...">

            <label for="estacionamiento">Estacionamiento:</label>
            <input type="text-area" name="estacionamiento" id="estacionamiento" placeholder="Número de estacionamientos...">

            <label for="wc">WC:</label>
            <input type="text-area" name="wc" id="wc" placeholder="Número de baños...">

            <label for="habitaciones">Habitaciones:</label>
            <input type="text-area" name="habitaciones" id="habitaciones" placeholder="Número de habitaciones...">

        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="vendedor">
                <option value="1">César</option>
            </select>
        </fieldset>
        <input type="submit" name="" id="" class="boton boton-verde" value="Crear propiedad">
    </form>
    <a href="/admin/propiedades/actualizar.php" class="boton boton-verde">Actualizar Propiedad</a>
    <a href="/admin/propiedades/borrar.php" class="boton boton-verde">Borrar Propiedad</a>
    <a href="/admin/index.php" class="boton boton-verde">Volver</a>
</main>

<?php
    incluirTemplate('footer');
?>