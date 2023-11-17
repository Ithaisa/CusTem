<?php namespace App;

class Usuario extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id', 'mail', 'password'];


    public $id;
    public $mail;
    public $password;
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->mail = $args['mail'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function validar() {

        if(!$this->mail) {
            self::$errores[] = "Debes añadir un mail.";
        }

        if(!$this->password) {
            self::$errores[] = 'La contraseña es obligatoria';
        }
        return self::$errores;
    }

}
?>