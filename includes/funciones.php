<?php 
    include 'app.php';
    function incluirTemplate($nombre, $inicio=false){
        include TEMPLATE_URL."\\${nombre}.php";
    }

    /**
     * Comprueba si existe un usuario con el correo indicado y comprueba
     * si la contraseña es correcta.
     */
    function comprobarUsuario($db, $usuario):bool{
        $query = "SELECT * FROM Usuario WHERE mail='$usuario'";
        $result = $db->query($query);
        $resultado = false;
        while($row = $result->fetch_object()){
            if(password_verify($_POST['password'], $row->password)){
                session_start();
                $_SESSION['id'] = $row->id;
                $resultado = true;
            }
        }
        return $resultado;
    }

    /**
     * Trata de iniciar sesión con el usuario
     * @return 'true' si inicia sesión correctamente.
     */
    function iniciarUsuario(){
        $db=conectarBD();
        if(isset($_POST['usuario'])){
            $usuario = $_POST['usuario'];
            return comprobarUsuario($db, $usuario);
        }
        return false;
    
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
?>