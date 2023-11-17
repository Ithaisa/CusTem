let carrito = [];
let total = 0;

function agregarAlCarrito(nombre,precio){
    carrito.push({
        nombre,precio
    });

total+= precio;

actualizarCarrito();
}

function actualizarCarrito(){
    let listaCarrito = document.getElementById('listaCarrito');
    let totalPrecio = document.getElementById('totalPrecio');

    listaCarrito.innerHTML= "";

    carrito.forEach(item=>{
        let listItem = document.createElement('li');
        listItem.textContent = `${item.nombre} - $${item.precio.toFixed(2)}`;
        listaCarrito.appendChild(listItem);
    });

    totalPrecio.textContent =  total.toFixed(2);
}