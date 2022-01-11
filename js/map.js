let map;
let marker;
let watchID;
let geoLoc;


function initMap() {
    const myLatLng = { lat: -20.239887, lng: -70.133747 };
    map = new google.maps.Map(document.getElementById("map"), {
    center: myLatLng,
    zoom: 16
  });
  marker = new google.maps.Marker({
    position: myLatLng,
    map,
    title: "Tu ubicación"
  });
  getPosition();
  var myPosition = new google.maps.LatLng(myLatLng.lat, myLatLng.lng);
  nearbySupermarket(myPosition);
  window.setInterval(getPosition,60000);
}

/* Obtener posicion a traves de geolocalizador del navegador */
function getPosition(){
  if(navigator.geolocation){
    geoLoc = navigator.geolocation;
    geoLoc.getCurrentPosition(showLocationOnMap, errorHandler);
  }else{
    alert("Erai");
  }
}

function showLocationOnMap(position){
  var latitud = position.coords.latitude;
  var longitud = position.coords.longitude;

  const myLatLng = {lat:latitud, lng:longitud};
  
  marker.setPosition(myLatLng);
  marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png')
  map.setCenter(myLatLng);
}

/*Manejo de errores por geolocalizaci贸n */
function errorHandler(err){
  if(err.code == 1){
    alert("Acceso denegado a la ubicación");
  }else if(err.code ==2){
    alert("No se pudo encontrar tu ubicación");
  }
}
/*Obtener supermercados cercanos a 2km de distancia */
function nearbySupermarket(position){
  var request0 ={
    location: position,
    radius: '2000',
    keyword: ['Unimarc']
  }

  var request1 ={
    location: position,
    radius: '2000',
    keyword: ['Jumbo']
  }

  var request2 ={
    location: position,
    radius: '2000',
    keyword: ['Acuenta']
  }

  var request3 ={
    location: position,
    radius: '2000',
    keyword: ['Santa Isabel']
  }

  var request4 ={
    location: position,
    radius: '2000',
    keyword: ['Lider']
  }

  /*Uso funcion nearbySearch, por cada supermercado */
  function getNearbySearch(request){
    var service = new google.maps.places.PlacesService(map);
    service.nearbySearch(request,callback);
  }
  getNearbySearch(request0);
  getNearbySearch(request1);
  getNearbySearch(request2);
  getNearbySearch(request3);
  getNearbySearch(request4);

  /*Respuesta a la funcion nearbySearch, entrega LatLng de cada lugar */
  function callback(result, status){
    if (status==google.maps.places.PlacesServiceStatus.OK) {
      console.log(result);
      for (let i = 0; i < result.length; i++) {
        agregarMarcador(result[i]);
      }
    }
  }
}
/*Agrega un marcador a cada lugar encontrado */
function agregarMarcador(place){
  var marker = new google.maps.Marker({
    map: map,
    position: place.geometry.location,
    animation: google.maps.Animation.BOUNCE,
    title: place.name
  })
}
