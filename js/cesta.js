//variables y array
const carrito = document.querySelector('#carrito');
const listaCarrito = document.querySelector('.lista-carrito');
const listaProductos = document.querySelector('#lista-productos div');
let articulosCarrito = [];

cargarEventListeners();

//cargarProducto()
$(document).on('click','#Agregar',function(e){
    e.preventDefault();
    const productoSeleccionado = e.target.parentElement.parentElement.parentElement //selecciona el padre principal del boton
    leerDatosProd(productoSeleccionado);
})

//Funciones
function cargarEventListeners(){

    carrito.addEventListener('click', eliminarProd); //escuchar el click en el boton eliminar

    //cargar datos del local storage 
    document.addEventListener('DOMContentLoaded', () => {
        articulosCarrito = JSON.parse( localStorage.getItem('carrito') ) || [];
        agregarProdCesta();
    })
}

function leerDatosProd(producto){
    //lee los datos del div principal del producto y extrae su información
    const infoProd = {
        imagen: producto.querySelector('img').src,
        nombre: producto.querySelector('#nombre').textContent,
        precio: producto.querySelector('#precio').textContent,
        supermercado: producto.querySelector('#supermercado').textContent,
        id: producto.querySelector('.data-class').getAttribute('id'),
        cantidad: 1
    }
    verificarPrecio(infoProd);
    //comprueba si el id del producto seleccionado existe en el carrito, si es que existe suma +1 a la cantidad
    const existe = articulosCarrito.some( producto => producto.id === infoProd.id );
    if (existe) {
        const prods =articulosCarrito.map( producto => {
            if (producto.id === infoProd.id) {
                producto.cantidad++;
                return producto;
            }else{
                return producto;
            }
        } );
        articulosCarrito = [...prods];
    }else{
        articulosCarrito = [...articulosCarrito,infoProd];
    }

    agregarProdCesta();
}

//crea el <tr> con la informacion del producto para la cesta
function agregarProdCesta(){

    vaciarCesta();

    articulosCarrito.forEach( producto => {
        const row = document.createElement('tr')
        row.innerHTML = `
        <td>${producto.nombre}</td>
        <td>${producto.precio}</td>
        <td><img src = "${producto.imagen}"></img></td>
        <td>${producto.cantidad}</td>
        <td>${producto.supermercado}</td>
        <td>$${parseInt(producto.precio)*producto.cantidad}</td>
            <div class="buttons is-right">
                <div class="button is-danger boton-borrar" id="${producto.id}">X</div>
            </div>
        </td>
        `;
        listaCarrito.appendChild(row);
    })

    //storage
    sincronizarStorage();
    
}

//guarda la cesta en el local storage
function sincronizarStorage(){
    localStorage.setItem('carrito', JSON.stringify(articulosCarrito));
}

//limpiar el HTML 
function vaciarCesta() {
    listaCarrito.innerHTML = '';
}

//detecta el div donde esta la clase boton-borrar y obtiene el id
function eliminarProd(e){
 
    if(e.target.classList.contains('boton-borrar')){
 
        const prodID= e.target.getAttribute('id');
        
        articulosCarrito.some(producto=>{
 
            if(producto.id === prodID){ /*si el id del producto en la cesta es igual al id obtenido en el div
                                        y el la cantidad es mayor a 1 se le resta 1.*/
                if(producto.cantidad>1){
                    producto.cantidad--;
                }else{
               
                    articulosCarrito= articulosCarrito.filter(producto=> producto.id !== prodID); 
                }
            }
        })
 
        agregarProdCesta();
        
    }
    sincronizarStorage();
 
}

function verificarPrecio(object){
    if(object.precio=="PRODUCTO NO DISPONIBLE"){
        object.precio=0
    }else{
        object['precio']=object['precio'].replace(/[^0-9]+/g,"")
    }
}