CREATE DATABASE Custem;

-- Crear la tabla de Productos
CREATE TABLE Productos (
    IDProducto INTAUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Descripcion TEXT,
    Precio DECIMAL(10, 2),
    Categoria VARCHAR(50),
    Imagen VARCHAR(200)
);

-- Crear la tabla de Pedidos
CREATE TABLE Pedidos (
    IDPedido INT AUTO_INCREMENT PRIMARY KEY ,
    IDCliente INT,
    FechaPedido DATE,
    EstadoPedido VARCHAR(20),
    Total DECIMAL(10, 2),
    Imagen VARCHAR(200),
    Descripcion VARCHAR(250),
    FOREIGN KEY (IDCliente) REFERENCES Clientes(IDCliente)
);

-- Crear la tabla de Detalles de Pedido
CREATE TABLE DetallesPedido (
    IDDetalle INT PRIMARY KEY,
    IDPedido INT,
    IDProducto INT,
    Cantidad INT,
    PrecioUnitario DECIMAL(10, 2),
    Subtotal DECIMAL(10, 2),
    FOREIGN KEY (IDPedido) REFERENCES Pedidos(IDPedido),
    FOREIGN KEY (IDProducto) REFERENCES Productos(IDProducto)
);

-- Crear la tabla de Clientes
CREATE TABLE Clientes (
    IDCliente INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50),
    Apellido VARCHAR(50),
    CorreoElectronico VARCHAR(100),
    Contrasena VARCHAR(100),
    Direccion VARCHAR(200),
    Telefono VARCHAR(15)
);

-- -- Crear la tabla de Diseños Personalizados
-- CREATE TABLE DisenosPersonalizados (
--     IDDiseno INT PRIMARY KEY,
--     IDCliente INT,
--     NombreDiseno VARCHAR(100),
--     Imagen VARCHAR(200),
--     FechaCreacion DATE,
--     FOREIGN KEY (IDCliente) REFERENCES Clientes(IDCliente)
-- );

-- -- Crear la tabla de Vendedores
-- CREATE TABLE Vendedores (
--     Id_Vendedor INT PRIMARY KEY,
--     Nombre VARCHAR(50),
--     Apellido VARCHAR(100),
--     Tlfn INT(9)
-- );
-- -- Crea la tabla usuario
-- CREATE TABLE Usuario (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     mail VARCHAR(255) NOT NULL,
--     password VARCHAR(255) NOT NULL
-- );
