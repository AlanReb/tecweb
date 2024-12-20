
$(function() {

    let edit = false;
    console.log('jQuery is Working');
    $('#product-result').hide();
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
                            <tr productId = "${product.id}">
                                <td>${product.id}</td>
                                <td>${product.nombre}</td>
                                <td>${descripcion}</td>
                                <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                                </td>
                            </tr>
                        `
                    });
                    $('#products').html(template);
                }
            })
        }
    });

// * AGREGAR PRODUCTO (envío de formulario) *
   // Manejo del formulario para agregar producto
   $('#product-form').submit(function (e) {
    e.preventDefault();

    // Obtenemos los datos del formulario
    // Obtener los datos del formulario
    let name = $('#name').val();
    let descriptionText = $('#description').val();
            
     // Validar si el nombre está presente
    if (name === ''|| name.length > 100) {
        alert('El nombre del producto es requerido y debe tener 100 caracteres o menos');
        return;
    }

    // Intentar parsear la descripción a JSON
    let description;
    try {
        description = JSON.parse(descriptionText);  // Convertir a JSON
        
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
        imagen: description.imagen,
        id: $('#product-id').val()
    };
    console.log(postData);
    // Convertimos los datos a JSON
    const jsonData = JSON.stringify(postData);
    let url = edit == false ? 'backend/product-add.php' : 'backend/product-edit.php';
    
        // Enviamos los datos al servidor
        $.ajax({
            url: url, // Definir correctamente la URL
            type: 'POST',
            data: jsonData,
            contentType: 'application/json', // Muy importante para que PHP lo reciba correctamente
            success: function (response) {
                try {
                    const res = JSON.parse(response);
                    if (res.status === "success") {
                        $('#container').html(res.message); // Producto agregado correctamente
                        $('#product-result').show();
                    } else {
                        $('#container').html(res.message); // Mensaje de error
                        $('#product-result').show();
                    }
                } catch (error) {
                    console.error("Error al procesar el JSON:", error);
                    console.log("Respuesta recibida:", response); // Imprimir la respuesta que se está recibiendo para depurar
                }

                $('#product-form').trigger('reset');
                listarProductos(); // Llama a la función para obtener la lista actualizada de productos
            },
            error: function (xhr, status, error) {
                console.error('Error al agregar o editar el producto:', error);
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
                        <tr productId = "${product.id}">
                            <td>${product.id}</td>
                            <td>
                                <a href"#" class="product-item"> ${product.nombre} </a>
                            </td>
                            <td>${descripcion}</td>
                            <td>
                                <button class="product-delete btn btn-danger">
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    `
                });
                $('#products').html(template);
            }
        })
    }
    
    // Eliminar un producto
    $(document).on('click', '.product-delete', (e) => {
        if(confirm('¿Estás seguro de que deseas eliminarlo?')) {
            // Usar e.currentTarget para obtener el botón correcto
            const element = e.currentTarget.closest('tr'); // Cambiar a closest('tr')
            const id = $(element).attr('productId'); // Obtener el ID del producto
            $.get('backend/product-delete.php', {id}, (response) => {
                // Procesar la respuesta del servidor
                const res = JSON.parse(response);
                if (res.status === "success") {
                    $('#container').html(res.message); // Mostrar mensaje de éxito
                    $('#product-result').show();
                } else {
                    $('#container').html(res.message); // Mostrar mensaje de error
                    $('#product-result').show();
                }
                listarProductos(); // Actualizar la lista de productos después de eliminar
            });
        }
    });

    $(document).on('click', '.product-item', function() { 
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('productId');
        
        // Hacemos la petición GET para obtener el producto por su ID
        $.get('backend/product-single.php', {id}, function(response) {   
            const product = JSON.parse(response);
    
            // Verificamos si el estado de la respuesta es "success"
            if (product.status === 'success') {
                console.log(product);
    
                // Rellenar el campo del nombre con el nombre del producto
                $('#name').val(product.producto.nombre);
    
                // Convertir los detalles del producto a JSON y mostrarlos en el campo #description
                const description = {
                    precio: product.producto.precio,
                    unidades: product.producto.unidades,
                    modelo: product.producto.modelo,
                    marca: product.producto.marca,
                    detalles: product.producto.detalles,
                    imagen: product.producto.imagen
                };
    
                // Rellenar el campo de descripción en formato JSON
                $('#description').val(JSON.stringify(description, null, 2));  // Formateado para que sea más legible
                $('#product-id').val(product.producto.id);
                
                edit = true;
            } else {
                $('#container').html(product.message);  // En caso de error, muestra el mensaje
                $('#product-result').show();
            }
        });
    });
        

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


