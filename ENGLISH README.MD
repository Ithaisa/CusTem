# Project General Documentation: "CusTem"

## Project Description
"CusTem" is a customization store for objects and accessories that allows customers to design and personalize a variety of products, from t-shirts and mugs to phone cases and jewelry. Customers can upload images, add text, and select colors and styles to create unique products.

## Development Team
- **Project Name:** CusTem
- **Development Team:** Ithaisa Sánchez González, Ismael Pablo Torrado Sáenz de Jubera, and Césarw
- **Start Date:** 10/04/2023
- **Completion Date:** -----

## CusTem Use Cases

### Actors:
1. Registered User: A user who has created an account in the store.
2. Unregistered User: A user who visits the store but has not created an account.
3. Administrator: A user with administrator privileges to manage products and orders.

### Use Cases:
1. **Search Products:** Users can search for products in the store by categories or keywords.
2. **View Product Details:** Users can view the details of a specific product, including images and descriptions.
3. **Add Product to Cart:** Users can add customized products to the shopping cart.
4. **Customize Product:** Users can customize a product by selecting options such as color, size, custom text, etc.
5. **Manage Cart:** Users can manage products in the cart, adding, removing, or updating the quantity of products.
6. **Login:** Unregistered users can log in or register as registered users.
7. **View Order History:** Registered users can view a history of previous orders.
8. **Place Order:** Users can place an order with the customized products in the cart.
9. **Create Products (Administrator):** The administrator can create a new product, i.e., add a new or previously deleted product to the website.
10. **Update Products (Administrator):** The administrator can add, modify, or delete products in the catalog.
11. **Delete Product (Administrator):** The administrator can delete a product from the store, making it not appear on the page or in the database.
12. **Manage Orders (Administrator):** The administrator can view and manage orders placed by users.
13. **Login (Administrator):** All administrators have the ability to access a specific login designed and customized only for them to log in as an administrator and thus use their functions.

The unregistered user does not have any actions that are not implemented for registered users. Moreover, they must create an account and log in to access other functions that are initially blocked for them.

## Entity Relationship:

### Entity: Administrators
- Attributes:
  - IDAdmin (int, Primary Key)
  - Name (Varchar, 50)
  - Last Name (Varchar, 100)
  - Phone (int, 9)

### Entity: User
- Attributes:
  - IDUser (int, Primary Key, auto_increment)
  - Email (Varchar, 255, Not Null)
  - Password (Varchar, 255, Not Null)
- Relationship with Administrators: 1:1 (Administrators.IDAdmin -> User.IDUser)

### Entity: Clients
- Attributes:
  - IDClient (int, Primary Key, auto_increment)
  - Name (Varchar, 50)
  - Last Name (Varchar, 50)
  - Email (Varchar, 100)
  - Password (Varchar, 100)
  - Address (Varchar, 200)
  - Phone (int, 9)
- Relationship with User: 1:0 (User.IDUser -> Clients.IDClient)

### Entity: Orders
- Attributes:
  - IDOrder (int, Primary Key, auto_increment)
  - IDClient (int, Foreign Key referencing Clients.IDClient)
  - OrderDate (date)
  - OrderStatus (Varchar, 20)
  - Total (decimal, (10,2))
  - Description (Varchar, 250)
- Relationship with Clients: 1:n (Clients.IDClient -> Orders.IDClient)

### Entity: Products
- Attributes:
  - IDProduct (int, Primary Key, auto_increment)
  - Name (Varchar, 100)
  - Description (Text)
  - Price (decimal, (10,2))
  - Category (Varchar, 50)
  - Image (Varchar, 200)
  
### Entity: CustomDesigns
- Attributes:
  - IDDesign (int, Primary Key)
  - IDClient (int, Foreign Key referencing Clients.IDClients)
  - DesignName (Varchar, 100)
  - Image (Varchar, 200)
  - CreationDate (date)

### Relationships:
- Administrators (1:1) User
- User (1:0) Clients
- Clients (1:n) Orders
- Clients (1:n) Products
- Clients (1:n) CustomDesigns

### Flowchart:
![Flowchart](https://hackmd.io/_uploads/BJtFQhjQT.jpg)



## Database

### Implemented Database Design

The "CusTem" system uses a relational database to store information about users, administrators, products, orders, and other key elements. Below is a brief sample of some relevant tables in the database and some code snippets.

### Database Tables:
```sql
-- Orders table
CREATE TABLE Products (
    IDProduct AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100),
    Description VARCHAR(250),
    Price DECIMAL(10, 2),
    Category VARCHAR(50),
    Image VARCHAR(200)
);
--- Clients table
CREATE TABLE Clients (
    IDClient INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(50),
    Last Name VARCHAR(50),
    Email VARCHAR(100),
    Password VARCHAR(100),
    Address VARCHAR(200),
    Phone VARCHAR(15)
);

---Some Insertions
INSERT INTO Products (IDProduct, Name, Description, Price, Category, Image) VALUES 
(1, "google_tshirt", "Google t-shirt", 9.99, "t-shirts", "image1.jpg"),
(2, "beer_mug", "Customized beer mug", 15, "mugs", "image2.jpg"),
(3, "ligo_tshirt", "Ligo t-shirt", 9.99, "t-shirts", "image3.jpg"),
(4, "custom_badges", "Custom badges", 0.50, "badges", "image4.jpg");

```
## Recent Modifications

### Change History

#### Version 1.0.0 - [10/11/2023] :es: / [11/10/2023] :us:

- **Added:**
  - Initial project documentation.
  - Description of the "CusTem" project.
  - Use cases for Registered Users, Unregistered Users, and Administrators.
  - Entities and relationships of the database model.
  - Database section with details on the implemented design.
  - Public folder
  - Nosotros.php
  - Catálogo.php
  - Contacto.php

- **Modified:**
  - Updates in use cases for clarity.
  - Improvements in the description of entities and relationships.
  - Minor corrections in the general documentation.
  - Admin folder
  - Modified Database
  - Index.php

- **Next Tasks:**
  - Implement new project-specific functions.
  - Refine and optimize database queries.
  - Add sections about technologies used and system requirements.
  - Implementation of CRUD operations in PDO.
  - Modification and addition in the Documentation

