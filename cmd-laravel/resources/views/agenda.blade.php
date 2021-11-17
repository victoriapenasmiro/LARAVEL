<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agenda con sesiones en Laravel</title>
</head>
<body>
    
    @php
        
    //creamos una sesion si no existe
    session_start();

    $nombre = $telefono = "";

    if (filter_input(INPUT_GET, "submit")) {
        $nombre = trim(filter_input(INPUT_GET, "nombre"));
        $telefono = filter_input(INPUT_GET, "telefono");
        $valido = checkConditions();

        if (isset($_SESSION["agenda"]) && $valido) {

            $_SESSION["agenda"]["$nombre"] = "$telefono";
        } else if ($valido) {

            $_SESSION["agenda"] = [$nombre => $telefono];
        }
    }

    var_dump($_SESSION);

    displayForm();
    displayContacts();

    /**
     * Formulario de registro
     * 
     * @global type $nombre
     * @global type $telefono
     */
    function displayForm() {
        global $nombre, $telefono;

        $output = "<h1>AGENDA</h1>" .
                "<form style='margin-bottom: 20px;' >" .
                "<input type='text' name='nombre' placeholder='nombre' value=$nombre >" .
                "<input type='number' name='telefono' placeholder='telefono' value=$telefono >" .
                "<input type='submit' name='submit' /></form>";

        echo $output;
    }

    /**
     * Agenda de contactos
     * 
     */
    function displayContacts() {
        $list = "<h2>LISTADO DE CONTACTOS</h2><ul>";

        if (isset($_SESSION["agenda"]) && count($_SESSION["agenda"]) > 0) {
            foreach ($_SESSION['agenda'] as $key => $value) {
                $list .= "<li> $key : $value </li>";
            }
        } else {
            $list = "<li style='color:red;'>No hay contactos en agenda.</li>";
        }

        $list .= "</ul>";

        echo $list;
    }

    /**
     * Validación de los formatos y campos vacíos
     * 
     * @global type $nombre
     * @global type $telefono
     * @return boolean true si no hay errores, false si no pasa la validación
     */
    function checkConditions() {
        global $nombre, $telefono;

        //valido que el usuario haya introducido el nombre del nuevo contacto a registrar
        if (empty($nombre)) {

            echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p style='color:red;'>El nombre es obligatorio.</p>";

            return false;
        } else if (empty($telefono)) {

            if (isset($_SESSION['agenda'][$nombre])) {

                //elimino el contacto (la key) de $listado
                unset($_SESSION['agenda'][$nombre]);

                echo "<p>Contacto eliminado.</p>";
            } else {

                echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p style='color:red;'>El nombre indicado no está registrado.</p>";
            }

            return false;
        } else if (strlen($telefono) < 9) {

            echo "<h4 style='color:red;'>¡ATENCIÓN!</h4><p style='color:red;'>El teléfono indicado no es válido."
            . " Por favor, sigue  el formato 9 dígitos entre 0 y 9, ambos incluidos. </p>";

            return false;
        }

        return true;
    }

    //remove session cookie
    // If (isset($_COOKIE[session_name()])) {
    //  setcookie(session_name(), '', time() - 3600, '/');
    //  unset($_COOKIE[session_name()]);
    // }
    
    // remove all session variables
    //session_unset();
    
    // destroy the session
    //session_destroy();
    @endphp

</body>
</html>