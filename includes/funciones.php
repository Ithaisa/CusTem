<<<<<<< Updated upstream
<?php 
    include 'app.php';
    function incluirTemplate($nombre, $inicio=false){
        include TEMPLATE_URL."\\${nombre}.php";
    }

    /**
     * Trata de iniciar sesión con el usuario
     * @return 'true' si inicia sesión correctamente.
     */
    function iniciarUsuario($db){
        // Obtiene los valores del formulario
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //Valor return
        $result = false;
        // Realiza la consulta para obtener el usuario
        $sql = "SELECT * FROM usuario WHERE username = '$username'";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            // Usuario encontrado, verifica la contraseña
                $row = $result->fetch_assoc();
                $hashedPassword = $row["password"];
                if (password_verify($password, $hashedPassword)) {
            // Contraseña válida, inicio de sesión exitoso
            session_start();
            $_SESSION["username"] = $username;
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
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $db=conectarBD(); 
        $query = "SELECT *  FROM Usuario WHERE mail='$usuario'";
        $result = $db->query($query);
        $resultado = false;
        if($result->fetch_object()){
            echo 'El usuario ya existe';
            return false;
        } else{
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO usuario(mail, password) VALUES('$usuario', '$passwordHash')";
            $db->query($query);
            return true;
        }
    }
