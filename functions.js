//++BONUS eventos ajax. Aqui podremos controlar cada vez que
//se haga una petición ajax, css cambie el fondo y cargue el
//icono de carga
//eventos del documento
$(document).on({
    //al comenzar una peticion ajax
    ajaxStart: function() { 
        //limpia el div de resultados previos
        $('#resultado').empty();
        //muestra la imagen
        $('#load').show(); },
    //al finalizar una peticion ajax
    ajaxStop: function() {
        //oculta la imagen
        $('#load').hide(); 
    }    
});

//funcion obtener datos
function obtenerDatos() {
    //obtenemos el valor del campo de texto
    let dni = $('#documento').val();
    //Enviamos los datos via ajax por POST
    //destino a la direccion text.php de datos le mandamos una cadena
    //de tipo json, con los la accion y el dato que le adjuntamos
    $.post("includes/test.php", {func: 'getData', doc: dni}, 
        //acciones a realizar cuando regresen los datos
        function(datos) {
            //mostrarlos por consola, para controlar los datos
            console.log(datos);
            //pintar los resultados
            muestraResultados(datos);
    //indicamos que los datos que obtendremos son de tipo json
    }, "json");
}

//funcion que muestra el resultado
function muestraResultados(datos) {
    //iniciamos la variable del resultado
    let resultado = '';

    //si hemos recibido una respuesta false
    if (datos === false) {
        //mensaje de feeedback
        resultado = '<p>No existen datos que mostrar<p>';
    //si hemos recibido respuesta con datos
    } else {
        //montamos la tabla. En caso de recibir más, seria recorrer los datos con foreach
        resultado = '<table class="table table-sm table-striped table-hover "><thead class="thead-dark"><tr>';
        resultado += '<th>DNI</th>';
        resultado += '<th>Nombre</th>';
        resultado += '<th>Apellidos</th>';
        resultado += '<th>Dirección</th>';
        resultado += '<th>Fecha nacimiento</th>';
        resultado += '</thead>';
        resultado += '<tr><td>' + datos.DNI + '</td>';
        resultado += '<td>' + datos.Nombre + '</td>';
        resultado += '<td>' + datos.Apellidos + '</td>';
        resultado += '<td>' + datos.Direccion + '</td>';
        resultado += '<td>' + datos.FechaNac + '</td><tr></table>';
    }
    //mandamos los datos al cuadro resultado para ser mostrados en pantalla
    $('#resultado').html(resultado);
}