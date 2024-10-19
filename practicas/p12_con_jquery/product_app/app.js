
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
                        console.log(product);
                        template += `<li>
                            ${product.nombre}
                        </li>`
                    });
    
                    $('#container').html(template);
                }
            })
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


