
$(function() {
    console.log('jQuery is Working');
    $('#search').keyup( function(e) {
        if($('#search').val()){
            let search = $('#search').val();
            $.ajax({
                url:'backend/product-search.php',
                type: 'GET',
                data: { search },
                success: function(response){
                    let products = JSON.parse(response);
                    let template = '';
                    products.forEach(product => {
                        let descripcion = '';
                            descripcion += '<li>precio: '+product.precio+'</li>';
                            descripcion += '<li>unidades: '+product.unidades+'</li>';
                            descripcion += '<li>modelo: '+product.modelo+'</li>';
                            descripcion += '<li>marca: '+product.marca+'</li>';
                            descripcion += '<li>detalles: '+product.detalles+'</li>';
                        template += `
                            <tr>
                                <td>${product.id}</td>
                                <td>${product.nombre}</td>
                                <td>${descripcion}</td>
                            </tr>
                        `
                    });
                    $('#container').html(template);
                }
            })
        }
    });

// * AGREGAR PRODUCTO (envío de formulario) *
   // Manejo del formulario para agregar producto
   $('#product-form').submit(e => {
    e.preventDefault();

    // Obtenemos los datos del formulario
    const postData = {
        nombre: $('#name').val(),
        marca: baseJSON.marca,
        modelo: baseJSON.modelo,
        precio: baseJSON.precio,
        detalles: baseJSON.detalles,
        unidades: baseJSON.unidades,
        imagen: baseJSON.imagen
    };

    // Convertimos los datos a JSON
    const jsonData = JSON.stringify(postData);

        // Enviamos los datos al servidor
        $.ajax({
            url: 'backend/product-add.php', // Definir correctamente la URL
            type: 'POST',
            data: jsonData,
            contentType: 'application/json', // Muy importante para que PHP lo reciba correctamente
            success: function (response) {
                try {
                    const res = JSON.parse(response);
                    if (res.status === "success") {
                        alert(res.message); // Producto agregado correctamente
                    } else {
                        alert(res.message); // Mensaje de error
                    }
                } catch (error) {
                    console.error("Error al procesar el JSON:", error);
                    console.log("Respuesta recibida:", response); // Imprimir la respuesta que se está recibiendo para depurar
                }

                $('#product-form').trigger('reset');
                //listarProductos(); // Llama a la función para obtener la lista actualizada de productos
            },
            error: function (xhr, status, error) {
                console.error('Error al agregar el producto:', error);
            }
        });
    });

    $.ajax({
        url: 'backend/product-list.php',
        type: 'GET',
        success: function (response){
            let products = JSON.parse(response);
            let template = '';
            products.forEach(product => {
                let descripcion = '';
                    descripcion += '<li>precio: '+product.precio+'</li>';
                    descripcion += '<li>unidades: '+product.unidades+'</li>';
                    descripcion += '<li>modelo: '+product.modelo+'</li>';
                    descripcion += '<li>marca: '+product.marca+'</li>';
                    descripcion += '<li>detalles: '+product.detalles+'</li>';
                template += `
                    <tr>
                        <td>${product.id}</td>
                        <td>${product.nombre}</td>
                        <td>${descripcion}</td>
                    </tr>
                `
            });
            $('#products').html(template);
        }
    })




});

// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };



function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

  
}


