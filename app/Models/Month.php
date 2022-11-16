<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    const MONTHS    = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                        'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    /**
     * This function will return a list with the month's name given the list with the month's number
     * 
     * @param Array $list List with the month's number
     * @return String
     */
    public static function list_2_string($list)
    {
        $aux    = array();

        foreach ($list as $element) {
            array_push($aux, Month::MONTHS[$element->month - 1]);
        }

        return $aux;
    }


    /**
     * This function will return the name that represent the number's month
     * 
     * @param String $name Name of the month
     * @return Number
     */
    public static function string_2_number($name)
    {
        return array_search($name, Month::MONTHS) + 1;
    }
}
