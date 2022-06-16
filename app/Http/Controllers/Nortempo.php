<?php

namespace App\Http\Controllers;

class Nortempo extends Controller
{
    public function index()
    {
        return view('guess');
    }

    public function calculate($number)
    {
        $number = intval($number);
        if ($number < 1) {
            return "demasiado pequeño";
        } else if ($number > 10000000000) {
            return "demasiado grande";
        } else {
            $left = 1;
            $right = 10000000000;
            return $this->binarySearch($number, $left, $right);
        }

    }

    public function binarySearch($search, $left, $right)
    {
        /*
        Comprobar si ya no podemos dividir el rango
         */
        if ($left > $right) {
            return -1;
        }
        # Obtener la mitad del rango
        $middle = round(($right + $left) / 2);

        # ¿EL número que buscamos es mitad del rango? Entonces regresa la mitad del rango
        if ($search == $middle) {
            return $middle;
        } else {
            # Si no el rango empezará o terminará con la mitad
            if ($search > $middle) {
                return $this->binarySearch($search, $middle, $right);
            } else {
                return $this->binarySearch($search, $left, $middle);
            }

        }
    }
}
