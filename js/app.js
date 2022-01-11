import {productsData} from './products.js'

var precio_bajo;
var productos_ordenados;


function shuffleArray(array) {
    for (var i = array.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
}
shuffleArray(productsData)

var current_page = 1;
var records_per_page = 12;

function prevPage()
{
    if (current_page > 1) {
        current_page--;
        changePage(current_page);
    }
}

function nextPage()
{
    if (current_page < numPages()) {
        current_page++;
        changePage(current_page);
    }
}
    
function changePage(page)
{
	// extrayendo contenido html a variables
    var btn_next = document.getElementById("btn_next");
    var btn_prev = document.getElementById("btn_prev");
    var listing_table = document.getElementById("app");

    // validar páginas (están demás xd¿)
    if (page < 1) page = 1;
    if (page > numPages()) page = numPages();


	//Reinicio de contenido para las siguientes páginas
    listing_table.innerHTML = "";

	//Muestra de contenido html de máximo 12 elementos por número de páginas
    for (var i = (page-1) * records_per_page; i < (page * records_per_page) && i < productsData.length; i++) {
		// xd
        listing_table.innerHTML += `
        <div class="column is-3-widescreen is-4-tablet ">
            <div class="card">
                <div class="card-image">
                    <a href="product/${productsData[i].slugProducto}/${productsData[i].idPRODUCTO}">
                        <img src="${productsData[i].imagenProducto}" alt="" class="p-4">
                    </a>
                </div>
                <div class="card-content data-class" id="producto ${productsData[i].idPRODUCTO}">
                    <p id="precio" class="${parseInt(productsData[i].precioProducto.match(/\d/g).join(""), 10) == 0 ? `has-text-weight-bold ` : ``}is-size-5">${parseInt(productsData[i].precioProducto.match(/\d/g).join(""), 10) == 0 ? `PRODUCTO NO DISPONIBLE` : productsData[i].precioProducto}</p>
                    <p id="nombre" class="is-size-4">${productsData[i].tituloProducto}</p>
					<p class="is-size-5 has-text-grey">${productsData[i].marcaProducto}</p>
					<p id="supermercado" class="is-size-5 has-text-grey">${ productsData[i].SUPERMERCADO_idSUPERMERCADO==1 ? "Jumbo": "Santa Isabel"}</p>
                </div>
                <div id="Agregar" class="card-content py-2 has-text-centered">
                    <button class="button is-primary ">
                        <a style="color:#fff;" href="#">Agregar al carrito</a>
                    </button>
                </div>
                <div class="card-footer">
                    <div class="card-footer-item">
                        <a  class="is-size-4" href="product/${productsData[i].slugProducto}/${productsData[i].idPRODUCTO}">Ver producto</a>
                    </div>
                </div>
            </div>
        </div>
        `;
    }


	//
    if (page == 1) {
        btn_prev.style.visibility = "hidden";
        
    } else {
        btn_prev.style.visibility = "visible";
        
    }

    if (page == numPages()) {
        btn_next.style.visibility = "hidden";
    } else {
        btn_next.style.visibility = "visible";
    }
}

function numPages()
{
    return Math.ceil(productsData.length / records_per_page);
}

window.onload = function() {
    changePage(1);
};

window.nextPage = function() {
	nextPage()
}

window.prevPage = function() {
	prevPage()
}

