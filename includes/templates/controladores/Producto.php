<?php
namespace App;
    class Producto extends ActiveRecord{
        protected static $tabla = 'productos';
        protected static $columnasDB = ['IDProducto', 'Nombre', 'Descripcion', 'Precio', 'Categoria', 'Imagen'];
    
    
        public $id;
        public $nombre;
        public $descripcion;
        public $precio;
        public $categoria;
        public $imagen;
        public function __construct($args = [])
        {
            $this->id = $args['IDProducto'] ?? null;
            $this->nombre = $args['nombre'] ?? '';
            $this->descripcion = $args['descripcion'] ?? '';
            $this->precio = $args['precio'] ?? '';
            $this->categoria = $args['precio'] ?? '';
            $this->imagen = $args['imagen'] ?? '';
        }
    
        public function validar() {
    
            if(!$this->id) {
                self::$errores[] = "Debes añadir un mail.";
            }
    
            if(!$this->password) {
                self::$errores[] = 'La contraseña es obligatoria';
            }
            return self::$errores;
        }
    
    }

?>