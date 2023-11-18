<?php 
    include 'app.php';
    function incluirTemplate($nombre, $inicio=false){
        include TEMPLATE_URL."\\${nombre}.php";
    }

    /**
     * Trata de iniciar sesión con el usuario
     * @return 'true' si inicia sesión correctamente.
     */
    function iniciarUsuario(){
        $db = conectarBD();
        // Obtiene los valores del formulario
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //Valor return
        $result = false;
        // Realiza la consulta para obtener el usuario
        $sql = "SELECT * FROM usuario WHERE mail = '$username'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            // Usuario encontrado, verifica la contraseña
            $row = $result->fetch_assoc();
            $hashedPassword = $row["password"];
            if (password_verify($password, $hashedPassword)) {
                // Contraseña válida, inicio de sesión exitoso
                // session_start();
                $_SESSION['id'] = $row['id'];
                $result = true;
            } else {
            echo "Contraseña incorrecta";
            }
        } else {
        echo "Usuario no encontrado";
        }
        return $result;
    
    }
    /**
     * Crea un usuario
     * @return true si se crea el usuario correctamente.
     */
    function crearUsuario(){
    $db = conectarBD();
    // Obtén los datos del formulario
    $usuario = $_POST['username'];
    $password = $_POST['password'];
    $result = false;

    // Verifica si el usuario ya existe
    $stmt = $db->prepare("SELECT * FROM Usuario WHERE mail = ?");
    $stmt->bind_param('s', $usuario);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->fetch_object()) {
        // El usuario ya existe
        $result = false;
    } else {
         // Hash de la contraseña
         $passwordHash = password_hash($password, PASSWORD_DEFAULT);

         // Inserta el nuevo usuario
         $stmt = $db->prepare("INSERT INTO usuario (mail, password) VALUES (?, ?)");
         $stmt->bind_param('ss', $usuario, $passwordHash);
 
         if ($stmt->execute()) {
             $result = true;
         } else {
             // Manejo de errores
             error_log("Error al insertar usuario: " . $stmt->error);
         }
    }
    return $result;
}
