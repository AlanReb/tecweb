// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarID(e) {
    /**
     * Revisar la siguiente información para entender porqué usar event.preventDefault();
     * http://qbit.com.mx/blog/2013/01/07/la-diferencia-entre-return-false-preventdefault-y-stoppropagation-en-jquery/#:~:text=PreventDefault()%20se%20utiliza%20para,escuche%20a%20trav%C3%A9s%20del%20DOM
     * https://www.geeksforgeeks.org/when-to-use-preventdefault-vs-return-false-in-javascript/
     */
    e.preventDefault();

    // SE OBTIENE EL ID A BUSCAR
    var id = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);    // similar a eval('('+client.responseText+')');
            
            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if(Object.keys(productos).length > 0) {
                // SE CREA UNA LISTA HTML CON LA DESCRIPCIÓN DEL PRODUCTO
                let descripcion = '';
                    descripcion += '<li>precio: '+productos.precio+'</li>';
                    descripcion += '<li>unidades: '+productos.unidades+'</li>';
                    descripcion += '<li>modelo: '+productos.modelo+'</li>';
                    descripcion += '<li>marca: '+productos.marca+'</li>';
                    descripcion += '<li>detalles: '+productos.detalles+'</li>';
                
                // SE CREA UNA PLANTILLA PARA CREAR LA(S) FILA(S) A INSERTAR EN EL DOCUMENTO HTML
                let template = '';
                    template += `
                        <tr>
                            <td>${productos.id}</td>
                            <td>${productos.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            }
        }
    };
    client.send("id="+id);
}

// FUNCIÓN CALLBACK DE BOTÓN "Buscar Producto"
function buscarProducto(e) {
    e.preventDefault();

    // SE OBTIENE EL TÉRMINO A BUSCAR
    var termino = document.getElementById('search').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);
            
            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);

            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if (productos.length > 0) {
                // SE CREA UNA PLANTILLA PARA LOS PRODUCTOS ENCONTRADOS
                let template = '';

                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: ' + producto.precio + '</li>';
                    descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                    descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                    descripcion += '<li>marca: ' + producto.marca + '</li>';
                    descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                    
                });

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            } else {
                // SI NO SE ENCONTRARON PRODUCTOS, SE MUESTRA UN MENSAJE
                document.getElementById("productos").innerHTML = '<tr><td colspan="3">No se encontraron productos.</td></tr>';
            }
        }
    };
    client.send("termino=" + encodeURIComponent(termino));
}

// FUNCIÓN PARA VALIDAR Y AGREGAR PRODUCTO
function agregarProducto(e) {
    e.preventDefault();

    // Obtener los valores del formulario
    var nombre = document.getElementById('form-name').value.trim();
    var marca = document.getElementById('form-brand').value.trim();
    var modelo = document.getElementById('form-model').value.trim();
    var precio = document.getElementById('form-price').value.trim();
    var unidades = document.getElementById('form-units').value.trim();
    var detalles = document.getElementById('form-details').value.trim();
    var imagen = document.getElementById('form-image').value.trim();

    // Validaciones
    var errores = [];

    // a. El nombre debe ser requerido y tener 100 caracteres o menos
    if (nombre === "" || nombre.length > 100) {
        errores.push("El nombre es requerido y debe tener 100 caracteres o menos.");
    }

    // b. La marca debe ser requerida
    if (marca === "") {
        errores.push("La marca es requerida.");
    }

    // c. El modelo debe ser requerido, texto alfanumérico y tener 25 caracteres o menos
    var regexAlfanumerico = /^[a-zA-Z0-9\s]+$/;
    if (modelo === "" || modelo.length > 25 || !regexAlfanumerico.test(modelo)) {
        errores.push("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
    }

    // d. El precio debe ser requerido y mayor a 99.99
    if (precio === "" || isNaN(precio) || parseFloat(precio) <= 99.99) {
        errores.push("El precio es requerido y debe ser mayor a 99.99.");
    }

    // e. Los detalles deben tener 250 caracteres o menos
    if (detalles.length > 250) {
        errores.push("Los detalles deben tener 250 caracteres o menos.");
    }

    // f. Las unidades deben ser requeridas y el número registrado debe ser mayor o igual a 0
    if (unidades === "" || isNaN(unidades) || parseInt(unidades) < 0) {
        errores.push("Las unidades son requeridas y deben ser mayores o iguales a 0.");
    }

    // g. La ruta de la imagen debe ser opcional
    if (imagen === "") {
        imagen = 'ruta/a/imagen/por/defecto.jpg'; // Cambiar esta ruta según tus necesidades
    }

    // Mostrar errores o enviar el producto si todo es correcto
    if (errores.length > 0) {
        alert("Errores en el formulario:\n" + errores.join("\n"));
    } else {
        // Crear objeto producto
        var producto = {
            nombre: nombre,
            marca: marca,
            modelo: modelo,
            precio: parseFloat(precio),
            unidades: parseInt(unidades),
            detalles: detalles,
            imagen: imagen
        };

        // Enviar el producto al servidor
        var client = getXMLHttpRequest();
        client.open('POST', './backend/create.php', true);
        client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
        client.onreadystatechange = function () {
            if (client.readyState == 4 && client.status == 200) {
                alert(client.responseText); // Muestra el mensaje de éxito o error
            }
        };
        client.send(JSON.stringify(producto)); // Convertir objeto a JSON
    }
}

// Asignar la función de agregar producto al evento onsubmit del formulario
window.onload = function () {
    document.getElementById('formularioProductos').onsubmit = agregarProducto;
};
// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try{
        objetoAjax = new XMLHttpRequest();
    }catch(err1){
        /**
         * NOTA: Las siguientes formas de crear el objeto ya son obsoletas
         *       pero se comparten por motivos historico-académicos.
         */
        try{
            // IE7 y IE8
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        }catch(err2){
            try{
                // IE5 y IE6
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            }catch(err3){
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;
}