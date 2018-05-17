
<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo AJAX + PHP</title>
        <meta charset="utf-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CDN Estilos de Boostrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <!-- Hoja CSS -->
        <link rel="stylesheet" href="estilos/estilos.css">
        <!--CDN jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!--Script JS -->
        <script src="functions.js"></script>
    </head>

    <body>
        <div id="boody">
            <h1>Ejemplo AJAX + PHP</h1>
            <p>Esto es un ejemplo de como funciona ajax con php usando jQuery</p>
            <div class="input-group">
                <input id="documento" type="text" class="form-control" placeholder="Inserte DNI">
                <div class="input-group-append">
                    <button id="enviar" class="btn btn-primary" type="button" onclick="obtenerDatos()">Enviar!</button>
                </div>
            </div>
            <!-- +BONUS!!! imagen de carga, esta oculta por defecto, pero hay que precargarla -->
            <div class="container text-center mt-2"><img id="load" src="estilos/img/loading.gif" /><div>
            <!-- div contenedor de resultados -->
            <div id="resultado" class="container mt-2"></div>
        </div>
    </body>
</html>