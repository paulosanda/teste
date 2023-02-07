<?php

namespace App\Traits;

trait StringToInteger
{
    public function stringtoint($value)
    {
        $valueInt = str_replace('.', '', $value);
        $valueInt = intval(str_replace(',', '', $valueInt));

        return $valueInt;
    }
}
