<?php

namespace App\Http\Controllers;

class VisitasController extends Controller
{
    //function __invoke, el controlador busca esta función por defecto
    function __invoke($contador = null)
    {
        $cookie_name = "contador";
        $cookie_value = null;

        if (!isset($_COOKIE[$cookie_name])) {
            $cookie_value = $contador ? $contador : 0;
        } else {
            $cookie_value = $contador ? $contador : intval($_COOKIE[$cookie_name]) + 1;
        }

        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

        //remove session cookie
        // If (isset($_COOKIE[$cookie_name])) {
        //  setcookie($cookie_name, '', time() - 3600, '/');
        //  unset($_COOKIE[$cookie_name]);
        // }

        return view("visitas", compact("cookie_value"));
    }
}
