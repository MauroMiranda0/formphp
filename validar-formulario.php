<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];//contiene el valor del campo "nombre" enviado a través del formulario.
    $email = $_POST["email"];//contiene el valor del campo "email" enviado a través del formulario.
    $fecha = $_POST["fecha"];//contiene el valor del campo "fecha" enviado a través del formulario.
    $contrasena = $_POST["contrasena"];//contiene el valor del campo "contrasena" enviado a través del formulario.
    $ine = $_POST["ine"];//contiene el valor del campo "ine" enviado a través del formulario

    // Validación de los campos ingresados.
    $errores = [];

    // Valida formato del INE (verifica que valor de $ine contiene exactamente 8 dígitos).
    if (!preg_match("/^[0-9]{8}$/", $ine)) {
        $errores[] = "El formato del INE no es válido.";
    }

    // Verifica si el valor de $email es una dirección de correo electrónico válida.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo electrónico no es válido.";
    }

    // Comprueba si hay errores
    if (count($errores) > 0) {
        // Muestra los errores y redirige al formulario utilizando un bucle foreach para mostrar cada error
        echo "<h2>Se encontraron los siguientes errores:</h2>";
        foreach ($errores as $error) {
            echo "<p>$error</p>";
        }
        echo '<a href="index.html">Volver al formulario</a>';
    } else {
        // Genera un informe y lo muestra por pantalla
        echo "<h2>Informe de validación:</h2>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo electrónico: $email</p>";
        echo "<p>Fecha de nacimiento: $fecha</p>";
        echo "<p>Contraseña: $contrasena</p>";
        echo "<p>INE: $ine</p>";
    }
}

/*
Mediante el método POST se obtienen los valores enviados a través del formulario y los asigna a sus variables correspondientes, despues se realiza la validación de los campos.

Para validar el formato del INE, se utiliza preg_match que verifica si el valor de $ine contiene exactamente 8 dígitos, (Si el formato no es válido, se muestra un mensaje de error).

Para validar el correo electrónico, se utiliza la función filter_var junto con la constante FILTER_VALIDATE_EMAIL. Esta función verifica si el valor de $email es una dirección de correo electrónico válida (Si el correo electrónico no es válido, se muestra un mensaje de error).

Además, se muestra un enlace para volver al formulario inicial (index.html), en caso de encontrar errores.

Si no se encuentran errores, se muestra un informe de validación y se muestran los valores ingresados en el formulario, incluidos los datos de nombre, correo electrónico, fecha de nacimiento, contraseña e INE.
*/

?>
