<?php
    $id = $_GET['id']??null;
    require '../../includes/funciones.php';
    require '../../includes/config/database.php';
    
    // $id= filter_var($id, FILTER_VALIDATE_INT);
    // echo $id;
    if (!$id){
       header('Location: /admin');
    }
    incluirTemplate('header');
    $db=conectarBD();

    //Query para seleccionar las propiedades que nos interesa mostrar
    $initialQuery = "SELECT * FROM productos WHERE IDProducto=$id;";
    $data = mysqli_query($db, $initialQuery);
    $producto = mysqli_fetch_assoc($data);
    $nombre = $producto['Nombre'];    
    $descripcion= $producto['Descripcion'];
    $precio = $producto['Precio'];
    $categoria= $producto['Categoria'];
    $imagen = $producto['Imagen'];

    //Limite de kbs para la imagen
    define('MEDIDA', 1024);
    $errores=[];


    if ($_SERVER['REQUEST_METHOD']==="POST"){
        //comprobamos los datos
       $nombre= mysqli_real_escape_string($db, $_POST['nombre']);
       $descripcion= mysqli_real_escape_string($db, $_POST['descripcion']);
       $precio= mysqli_real_escape_string($db, $_POST['precio']);
       $categoria= mysqli_real_escape_string($db, $_POST['categoria']);
       $img= $_FILES['imagen'];
       
       // sustituir la imagen si se incluye una nueva y si es vacío dejar el valor tal y como estaba
       $carpetaImagenes='../../imagenes/';
       $nombreImagen="";
       if ($img['name']) {
           unlink($carpetaImagenes.$producto['Imagen']);
           $nombreImagen=md5(uniqid(rand(),true)).".jpg";
           move_uploaded_file($img['tmp_name'], $carpetaImagenes.$nombreImagen);
       }
       else{
           $nombreImagen = $producto['Imagen'];
       }
       

      //controlando los mensajes de error en la validación del formulario
       if (!$nombre) {
           $errores[]="Debes añadir un título";
       }
       else if (!$precio) {
           $errores[]="Debes añadir un precio";
       }
       else if (!$descripcion) {
           $errores[]="Debes añadir una descripción";
       }
       else if (!$categoria) {
           $errores[]="Debes seleccionar una categoría";
       }

       //valida la imagen por tamaño (medida máxima en kb)
       if (($img['size']/1024 > MEDIDA)){
           $errores[]="Reduzca el tamaño de la imagen, debe ser menor a ". MEDIDA ."kb.";
       }
       
       //ahora es donde realmente insertamos los valores en la bd. Solo se introduce el campo si el array de errores está vacío
       $resultado = false;
       if(empty($errores)){
           $query="UPDATE productos SET nombre='$nombre', precio='$precio', imagen='$nombreImagen',
           descripcion='$descripcion', categoria='$categoria' WHERE IDPRoducto = $id;";
           $resultado=mysqli_query($db,$query);
       }      

       if ($resultado) {
           header('Location:/admin?resultado=2');
       }
   }  
?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <?php foreach($errores as $error){ ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
    <?php } ?>
    <form action="/admin/operaciones/actualizar.php/?id=<?php echo $id;?>" class="formulario-ad" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend class="legend-ad">Informacion General</legend>

            <label class="label-ad" for="nombre">Nombre: </label>
            <input class="input-ad" type="text" id="nombre" name="nombre" value = "<?php echo $nombre; ?>">

            <label class="label-ad" for="precio">Precio:</label>
            <input class="input-ad" type="number" name="precio" id="precio" value = "<?php echo $precio; ?>">

            <label class="label-ad" for="imagen">Imagen:</label>
            <input class="input-ad" type="file" name="imagen" id="imagen"  accept="image/jpeg, image/png, image/jpg"><img src="/../../imagenes/<?php echo $imagen?>" alt="Actual">

            <label class="label-ad" for="Descripcion">Descripcion:</label>
            <input class="textarea-ad" type="text-area" name="descripcion" id="descripcion" value = "<?php echo $descripcion; ?>" >

            <label class="label-ad" for="categoria">Categoria:</label>
            <input class="textarea-ad" type="text-area" name="categoria" id="categoria" value = "<?php echo $categoria; ?>">

        </fieldset>
        <input type="submit" name="" id="" class="btn-add" value="Actualizar propiedad">
    </form>
    <a href="/admin/index.php" class="btn-add">Volver</a>
</main>

<?php
    //incluirTemplate('footer');
?>