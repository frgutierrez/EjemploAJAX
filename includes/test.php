<?php

include './DB.class.php';

//verificamos si ha solicitado una accion
if (filter_has_var(INPUT_POST, 'func')) {
    //recabamos la accion solicitada
    $func = filter_input(INPUT_POST, 'func');
    //comprobamos la accion
    switch ($func) {
        //caso de obtener datos
        case 'getData':
            //obtenemos dni recibido
            $dni = filter_input(INPUT_POST, 'doc');
            //obtenemos los datos de usuario de dicho dni
            $resultado = DB::getData($dni);
            //el array recibido lo codificamos como cadena json y lo devolvemos
            echo json_encode($resultado,true);
            break;
        //ejemplo (no funcional), como seria por ejemplo recibid datos para guardar/añadir
        case 'recData':
            $dni = filter_input(INPUT_POST, 'dni');
            $nombre = filter_input(INPUT_POST, 'nombre');
            $apellidos = filter_input(INPUT_POST, 'apellidos');
            $direccion = filter_input(INPUT_POST, 'direccion');
            $fechanac = filter_input(INPUT_POST, 'fechanac');
            $resultado = DB::recData($dni, $nombre, $apellidos, $direccion, $fechanac);
            echo json_encode($resultado, true);
            break;
		default:
			//otras acciones
			break;
    }
} else {
    //otros casos, simple error
    echo 'error';
}