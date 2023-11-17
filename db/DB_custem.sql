CREATE DATABASE Custem;

-- Crear la tabla de Productos
CREATE TABLE Productos (
    IDProducto AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(100),
    Descripcion VARCHAR(250),
    Precio DECIMAL(10, 2),
    Categoria VARCHAR(50),
    Imagen VARCHAR(200)
);

-- Inserción de datos PRODUCTOS

INSERT INTO Produtos (IDProducto,Nombre,Descripcion,Precio,Categoria,Imagen) VALUES 
(1, "camiseta_google", "camiseta google", 9.99, "camisetas", "imagen1.jpg"),
(2, "taza_cerveza", "taza personalizada cerveza", 15, "tazas", "imagen2.jpg"),
(3, "camiseta ligo", "camiseta ligo", 9.99, "camisetas", "imagen3.jpg"),
(4, "chapas_personalizadas", "chapas personalizadas", 0.50, "chapas", "imagen4.jpg"),
(5, "GorrasP", "Gorras básica poliester personalizadas", 18.59, "gorrasP", "imagen5.jpg"),
(6, "camiseta_papá_manitas", "camiseta papá manitas", 9.99, "camisetas", "imagen6.jpg"),
(7, "tazas_coleccion", "tazas personalizadas coleccion", 15, "tazas", "imagen7.jpg"),
(8, "gorrasT", "Gorras de tela", 20.99, "GorrasT", "imagen8.jpg"),
(9, "Llaveros_personalizados", "Llavero personalizado de ambas caras", 7.99, "llaveros", "imagen9.jpg"),
(10, "Bolso personalizado", "Bolsos personalizados", 25, "Bolsos", "imagen10.jpg");



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

