$(document).ready(function(){
    $.ajax({
        url: "https://mi-super.herokuapp.com/data.php",
        type: "GET",
        success: function(data){
            newData = []
            MinMax= []
            const ctx = document.getElementById('myChart');
            producto = {
                PrecioProducto:[],
                fechaProducto:[]
            };
            buscarProd(data)
            colocarFechasPrecios(newData)
            ajustarEjes(MinMax)
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    datasets: [
                        {
                            label: "Precio producto",
                            data: [
                                {x:producto.fechaProducto[0],y:producto.PrecioProducto[0]},
                                {x:producto.fechaProducto[1],y:producto.PrecioProducto[1]},
                                {x:producto.fechaProducto[2],y:producto.PrecioProducto[2]},
                                {x:producto.fechaProducto[3],y:producto.PrecioProducto[3]},
                                {x:producto.fechaProducto[4],y:producto.PrecioProducto[4]}
                            ],
                            backgroundColor: "blue",
                            borderColor:"lightblue",
                            fill: false,
                            lineTension:0,
                            pointRadius:5
                        }
                    ]
                },
                options: {
                    scales: {
                        x: {
                            type: 'time',
                            time: {
                                parser: 'yyyy-MM-dd',
                                unit:'day'
                            }
                        },
                        y:{
                            min:parseInt(Math.min(...MinMax)*0.5)!=0 ? parseInt(Math.min(...MinMax)*0.5):0,
                            max:parseInt(Math.max(...MinMax)*1.5)!=0 ?parseInt(Math.max(...MinMax)*1.5):5000,
                            beginAtZero:true
                        }
                    }
                }
            });
            function buscarProd(data) {
                for (let i = 0; i < data.length; i++) {
                    if (Object.values(data[i])[0]==obtenerId()) {
                        newData.push(data[i])
                    }
                }
            }
            function colocarFechasPrecios(array) {
                for (let i = 0; i < array.length; i++) {
                    producto.PrecioProducto.push(array[i].precio)
                    var fecha = new Date(Date.parse(array[i].Fecha_inicio))
                    producto.fechaProducto.push(fecha.toLocaleDateString().split('-').reverse().toString().replaceAll(',','-'))
                }
            }
            function obtenerId() {
                return window.location.href.split('/')[window.location.href.split('/').length-1];
            }
            function ajustarEjes(array) {
                producto.PrecioProducto.forEach(precio => {
                    array.push(parseInt(precio))
                });
            }
        },
        error: function(newData){
            console.log(newData);
        },
        

    });
    
});