
$(function() {
    console.log('jQuery is Working');
    listarProductos();
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
    // Obtener los datos del formulario
    let name = $('#name').val();
    let descriptionText = $('#description').val();
            
     // Validar si el nombre está presente
    if (name === '') {
        alert('El nombre del producto es requerido');
        return;
    }

    // Intentar parsear la descripción a JSON
    let description;
    try {
        description = JSON.parse(descriptionText);  // Convertir a JSON
        console.log(description);
    } catch (error) {
        alert('La descripción debe estar en formato JSON válido.');
        return;
    }

    // Validar que la estructura del JSON sea correcta según baseJSON
    if (!description.hasOwnProperty('precio') || 
        !description.hasOwnProperty('unidades') || 
        !description.hasOwnProperty('modelo') || 
        !description.hasOwnProperty('marca') || 
        !description.hasOwnProperty('detalles') || 
        !description.hasOwnProperty('imagen')) {
        alert('La descripción JSON debe contener los campos correctos: precio, unidades, modelo, marca, detalles, imagen.');
        return;
    }

    // Validar marca
    if (!description.marca || description.marca === "NA") { // Asegúrate de que "NA" es el valor por defecto
        alert("La marca es requerida y debe seleccionarse de una lista de opciones.");
        return;
    }
    // Validar modelo
    if (!description.modelo || description.modelo.length > 25) {
        alert("El modelo es requerido y debe ser alfanumérico con 25 caracteres o menos.");
        return;
    }
    // Validar precio
    if (!description.precio || parseFloat(description.precio) <= 99.99) {
        alert("El precio es requerido y debe ser mayor a 99.99.");
        return;
    }
    // Validar detalles
    if (description.detalles && description.detalles.length > 250) {
        alert("Los detalles deben ser opcionales y, de usarse, deben tener 250 caracteres o menos.");
        return;
    }
    // Validar unidades
    if (description.unidades === undefined || description.unidades < 0) {
        alert("Las unidades son requeridas y deben ser mayores o iguales a 0.");
        return;
    }



    const postData = {
        nombre: $('#name').val(),
        marca: description.marca,
        modelo: description.modelo,
        precio: description.precio,
        detalles: description.detalles,
        unidades: description.unidades,
        imagen: description.imagen
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
                listarProductos(); // Llama a la función para obtener la lista actualizada de productos
            },
            error: function (xhr, status, error) {
                console.error('Error al agregar el producto:', error);
            }
        });
    });


    function listarProductos() {
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
    }
    




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


