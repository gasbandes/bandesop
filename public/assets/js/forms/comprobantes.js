$(document).ready(function (){
    var fechaEmision = new Date();
    var day = ("0" + fechaEmision.getDate()).slice(-2);
    var month = ("0" + (fechaEmision.getMonth() + 1)).slice(-2);
    fecha = fechaEmision.getFullYear()+"-"+(month)+"-"+(day);
    $("#txtFecha").val(fecha);

    actualizarTablaArticulos();

    $("#txtAgregarArticulo").focus();


    $("#txtAgregarArticulo").on('keyup', function(e){
        e.preventDefault();
        if(e.keyCode == 13){
            $("#btnAgregarArticulo").click();
        }
        var str = $("#txtAgregarArticulo").val();
        if(str != ""){
            //url = "{{ url('productos/buscar?texto=') }}" + str;
            url = buscar_prodcto_url + str;
         //alert(url)

            delay(function(){
                $.get(url , function( data ){
                    $("#divData").html( data );
                    var productos = data["productos"];
                    console.log(productos.length);
                    if (productos) {
                        if(productos.length == 0){
                        $("#listaBusquedaProducto").html("");

                        Swal.fire({

                        title:"¡Uuups!",
                        text:"No hay medicina con ese código o nombre.",
                        type:"error",
                        confirmButtonColor:"#2f8ee0"
                     })

                        }else{
                            $("#listaBusquedaProducto").html("");
                            for (i = 0; i < productos.length; i++) {
                                console.log(productos[i])
                                $("#listaBusquedaProducto").append(
                                    $('<option></option>').val(productos[i].nu_codigo).html(productos[i].nb_nombre +' '+ productos[i].stock_inicial +' '+ productos[i].nb_presentacion  + " disponibles.")
                                );
                            }
                        }
                    }
                    else
                    {
                        alert(1)
                    }
                });
            }, 600);
        }else{
            $("#listaBusquedaProducto").html("");
        }
    });

    $('#btnAgregarArticulo').on('click', function(e) {
        e.preventDefault();
        var producto_codigo = $("#txtAgregarArticulo").val();
        //console.log(producto_codigo)
        if(producto_codigo.length > 0){
            //url = "{{ url('productos/buscar?texto=') }}" + producto_codigo;
            url = buscar_prodcto_url + producto_codigo;
            $.get(url , function( data ){
                console.log(data);
                agregarArticulo(data);
            });
        }
    });

    $("#formNuevoEntrega").on('submit', function(e){
        if(! confirm("¿Guardar entrega?, una vez ingresado al sistema no podrá ser modificado.")){
            e.preventDefault();
        }
        var articulos = JSON.stringify(listadoArticulos);
        $("#hiddenListado").val(articulos);
        alert(requestData);
        //var url = "{{ url('comprobantes/vistaPrevia') }}";
        var url = comprobante_vistaprevia_url;
        var request;

        request = $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: { data: requestData }
        });
    });

    $(document).on('blur', '.td_cantidad', function() {
        var cantidad = $(this).val();
        var codigo = $(this).parents("tr").find(".td_codigo").html();
        if(cantidad > $(this).prop('max')){
            cantidad = $(this).prop('max');
            $(this).val(cantidad);
        }
        $(this).one('focus');
        modificarStock(codigo, cantidad);
    });

    $(document).on('blur', '.td_precio', function() {
        var precio = $(this).val();
        var codigo = $(this).parents("tr").find(".td_codigo").html();
        precio = precio.replace(",", ".");
        modificarPrecio(codigo, precio);
        $(this).focus();
    });


});



var listadoArticulos = [
/*
   {'Id':'1','Username':'Ray','FatherName':'Thompson'},
   {'Id':'2','Username':'Steve','FatherName':'Johnson'}
*/
]
function agregarArticulo(data){

    if(data["productos"].length > 0){
        var producto = data["productos"][0];
        var tasa_producto = $('#hiddenTasa').val();
        var producto_codigo = producto["nu_codigo"];
        var productoBuscado = buscarArticuloEnListado(producto_codigo);

            var producto_stock = producto["stock_actual"];

                var producto_nombre = producto["nb_nombre"];
                var producto_cantidad = 1;
                listadoArticulos[listadoArticulos.length] = {
                    'codigo':producto_codigo,
                    'nombre': producto_nombre,
                    'cantidad': producto_cantidad,
                    'total':   producto_cantidad,
                };

        actualizarTablaArticulos();
        $("#txtAgregarArticulo").val("");
    }
}




function modificarStock(codigo, cantidad){
    var articulo = buscarArticuloEnListado(codigo);
    let iva = articulo["iva"];

    if(articulo != null){
        console.log
        articulo["cantidad"] = cantidad;

        actualizarTablaArticulos();
    }
}



function buscarArticuloEnListado(codigo){
    var i = 0;
    var articuloBuscado = null;
    while(i < listadoArticulos.length && articuloBuscado == null){
        if(listadoArticulos[i]["codigo"] == codigo){
            articuloBuscado = listadoArticulos[i];
        }
        i++;
    }
    return articuloBuscado;
}

function descartarArticulo(posicion){
    listadoArticulos.splice(posicion, 1);
    actualizarTablaArticulos();
}

function actualizarTablaArticulos(){
    $("#tablaProductos").html("");
    var resumen_total_dolar = 0;
    var resumen_sub_total = 0;
    var resumen_iva = 0;
    var resumen_total = 0;
    for(i=0; i < listadoArticulos.length; i++){
        $("#tablaProductos").append(
            $('<tr></tr>').html(
                "<td class='td_codigo'>"
                    + listadoArticulos[i]["codigo"]
                + "</td><td>"
                    + listadoArticulos[i]["nombre"]

                + "</td><td>"
                    + "<input type='number' class='form-control  td_cantidad' value="+ listadoArticulos[i]["cantidad"] + " max=" + + " >"



                + "</td><td class='text-center'>"
                    + "<a class='btn btn-danger' style='color: #FFFFFF;' onclick='descartarArticulo(" + i + ");''><i class='fa fa-trash'></i></a>"
                + "</td>"
            )
        );

    }



}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();
