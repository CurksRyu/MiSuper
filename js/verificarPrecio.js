import {productsData} from './products.js'

var idProductoPagina = window.location.href.split('/')[window.location.href.split('/').length-1];
var htmlTag = document.getElementById("producto-precio")
//var id = productsData[idProductoPagina-1];


for (let i = 0; i < productsData.length; i++) {
    if (Object.values(Object.values(productsData)[i])[0]==idProductoPagina) {
        var id = productsData[i]
        break
    }
}
Precio(idProductoPagina);
function Precio(idProductoPagina){
    
    htmlTag.innerHTML = "";
    
    if(id.precioProducto==0){
    
        htmlTag.innerHTML +=`
        <div class="title is-size-3 mb-0">
            Producto no disponible 
        </div>
        `;
    }
    else if(id.precioOriginal=="NULL" && id.tipoPromocionProducto=="NULL" && id.precioProducto!=0){
        
        htmlTag.innerHTML +=`
        <div class="title is-size-3 mb-0">
            ${id.precioProducto} / Precio 
        </div>
        `;
    }
    else if(id.precioOriginal=="NULL" && id.tipoPromocionProducto!="NULL" && id.precioProducto!=0){
        
        htmlTag.innerHTML +=`
        <div class="title is-size-3 mb-0">
            ${id.tipoPromocionProducto} ${id.precioProducto}
        </div>
        `;
    }else if(id.precioOriginal!="NULL" && (id.tipoPromocionProducto!="NULL" || id.tipoPromocionProducto=="NULL") && id.precioProducto!=0){
        
        htmlTag.innerHTML +=`
        <div class="title is-size-4 mb-0">
            ${id.precioProducto} / Precio con descuento 
        </div>
        <div class="title is-size-5 has-text-grey">
            ${id.precioOriginal} / Precio Original 
        </div>
        `;
    }
}