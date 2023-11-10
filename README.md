# Documentación General de Proyecto: "CusTem"

## Descripción del Proyecto
"CusTem" es una tienda de personalización de objetos y accesorios que permite a los clientes diseñar y personalizar una variedad de productos, desde camisetas y tazas hasta fundas de teléfonos y joyería. Los clientes pueden cargar imágenes, agregar texto y seleccionar colores y estilos para crear productos únicos.

## Equipo de Desarrollo
- **Nombre del Proyecto:** CusTem
- **Equipo de Desarrollo:** Ithaisa Sánchez González, Ismael Pablo Torrado Sáenz de Jubera y Césarw
- **Fecha de Inicio:** 04/10/2023
- **Fecha de Finalización:** -----

## Casos de Uso de CusTem

### Actores:
1. Usuario Registrado: Un usuario que ha creado una cuenta en la tienda.
2. Usuario No Registrado: Un usuario que visita la tienda pero no ha creado una cuenta.
3. Administrador: Un usuario con privilegios de administrador para gestionar productos y pedidos.

### Casos de Uso:
1. **Buscar Productos:** Los usuarios pueden buscar productos en la tienda según categorías o palabras clave.
2. **Ver Detalles del Producto:** Los usuarios pueden ver los detalles de un producto específico, incluyendo imágenes y descripciones.
3. **Agregar Producto al Carrito:** Los usuarios pueden agregar productos personalizados al carrito de compras.
4. **Personalizar Producto:** Los usuarios pueden personalizar un producto seleccionando opciones como color, tamaño, texto personalizado, etc.
5. **Gestionar Carrito:** Los usuarios pueden administrar los productos en el carrito, pudiendo agregar, eliminar o actualizar la cantidad de productos.
6. **Iniciar Sesión:** Los usuarios no registrados pueden iniciar sesión o registrarse como usuarios registrados.
7. **Ver Historial de Pedidos:** Los usuarios registrados pueden ver un historial de pedidos anteriores.
8. **Realizar Pedido:** Los usuarios pueden realizar un pedido con los productos personalizados en el carrito.
9. **Crear Productos (Administrador):** El administrador puede crear un producto nuevo, es decir, añadir a la página web un producto nuevo o antiguo que haya sido borrado o nunca se haya llegado a implementar.
10. **Actualizar Productos (Administrador):** El administrador puede agregar, modificar o eliminar productos en el catálogo.
11. **Borrar Producto (Administrador):** El administrador puede borrar un producto de la tienda, haciendo que así no aparezca en la página ni en la base de datos.
12. **Gestionar Pedidos (Administrador):** El administrador puede ver y gestionar los pedidos realizados por los usuarios.
13. **Iniciar Sesión (Administrador):** Todos los administradores disponen de la posibilidad de acceder a un login específico diseñado y personalizado únicamente para ellos para que así puedan iniciar sesión como un administrador y así poder usar sus funciones.

El usuario sin registrar no dispone de ninguna acción la cual no esté implementada para el uso de usuarios registrados; es más, deberá crearse una cuenta e iniciar sesión para poder acceder a otras funciones que al principio están bloqueadas para él.

## Entidad Relación:

### Entidad: Administradores
- Atributos:
  - IDAdmin (int, Primary Key)
  - Nombre (Varchar, 50)
  - Apellido (Varchar, 100)
  - Telefono (int, 9)

### Entidad: Usuario
- Atributos:
  - IDUser (int, Primary Key, auto_increment)
  - mail (Varchar, 255, Not Null)
  - contraseña (Varchar, 255, Not Null)
- Relación con Administradores: 1:1 (Administradores.IDAdmin -> Usuario.IDUser)

### Entidad: Clientes
- Atributos:
  - IDCliente (int, Primary Key, auto_increment)
  - Nombre (Varchar, 50)
  - Apellido (Varchar, 50)
  - CorreoElectronico (Varchar, 100)
  - Contraseña (Varchar, 100)
  - Direccion (Varchar, 200)
  - Telefono (int, 9)
- Relación con Usuario: 1:0 (Usuario.IDUser -> Clientes.IDCliente)

### Entidad: Pedidos
- Atributos:
  - IDPedido (int, Primary Key, auto_increment)
  - IDCliente (int, Foreign Key referencia a Clientes.IDCliente)
  - FechaPedido (date)
  - EstadoPedido (Varchar, 20)
  - Total (decimal, (10,2))
  - Descripcion (Varchar, 250)
- Relación con Clientes: 1:n (Clientes.IDCliente -> Pedidos.IDCliente)

### Entidad: Productos
- Atributos:
  - IDProducto (int, Primary Key, auto_increment)
  - Nombre (Varchar, 100)
  - Descripcion (Text)
  - Precio (decimal, (10,2))
  - Categoría (Varchar, 50)
  - Imagen (Varchar, 200)
  
### Entidad: DisenosPersonalizados
- Atributos:
  - IDDiseno (int, Primary Key)
  - IDCliente (int, Foreign Key referencia a Clientes.IDClientes)
  - NombreDiseno (Varchar, 100)
  - Imagen (Varchar, 200)
  - FechaCreacion (date)

### Relaciones:
- Administradores (1:1) Usuario
- Usuario (1:0) Clientes
- Clientes (1:n) Pedidos
- Clientes (1:n) Productos
- Clientes (1:n) DisenosPersonalizados

### Diagrama de Flujo:
![Diagrama de Flujo](https://hackmd.io/_uploads/BJtFQhjQT.jpg)



## Base de Datos

### Diseño de la Base de Datos Implementada

El sistema "CusTem" utiliza una base de datos relacional para almacenar la información de usuarios, administradores, productos, pedidos y otros elementos clave. A continuación, se presenta una breve muestra de algunas tablas relevantes en la base de datos y algún que otro código.

### Tablas de la Base de Datos:
```sql
-- Tabla pedidos
CREATE TABLE Productos (
    IDProducto AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Descripcion VARCHAR(250),
    Precio DECIMAL(10, 2),
    Categoria VARCHAR(50),
    Imagen VARCHAR(200)
);
---Tabla Clientes
CREATE TABLE Clientes (
    IDCliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    CorreoElectronico VARCHAR(100),
    Contrasena VARCHAR(100),
    Direccion VARCHAR(200),
    Telefono VARCHAR(15)
);

---Algunas Inserciones
INSERT INTO Produtos (IDProducto,Nombre,Descripcion,Precio,Categoria,Imagen) VALUES 
(1, "camiseta_google", "camiseta google", 9.99, "camisetas", "imagen1.jpg"),
(2, "taza_cerveza", "taza personalizada cerveza", 15, "tazas", "imagen2.jpg"),
(3, "camiseta ligo", "camiseta ligo", 9.99, "camisetas", "imagen3.jpg"),
(4, "chapas_personalizadas", "chapas personalizadas", 0.50, "chapas", "imagen4.jpg");

 ```
## Últimas Modificaciones

### Historial de Cambios

#### Versión 1.0.0 - [10/11/2023]:es: / [11/10/2023]:us:

- **Añadido:**
  - Documentación inicial del proyecto.
  - Descripción del proyecto "CusTem".
  - Casos de uso para Usuarios Registrados, Usuarios No Registrados y Administradores.
  - Entidades y relaciones del modelo de base de datos.
  - Sección de Base de Datos con detalles sobre el diseño implementado.
  - Carpeta Public
  - Nosotros.php
  - Catálogo.php
  - Contacto.php

- **Modificado:**
  - Actualizaciones en los casos de uso para mayor claridad.
  - Mejoras en la descripción de las entidades y relaciones.
  - Correcciones menores en la documentación general.
  - Carpeta Admin
  - Base de Datos Modificada
  - Index.php



- **Próximas Tareas:**
  - Implementar nuevas funciones específicas del proyecto.
  - Refinar y optimizar consultas en la base de datos.
  - Añadir secciones sobre tecnologías utilizadas y requisitos del sistema.
  - Implementación del CRUD en PDO
  - Modificación y adición en la Documentación
