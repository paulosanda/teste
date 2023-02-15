<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ArcaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function mediana()
    {
        $array = [71, 90, 31, 82, 73, 32, 14, 19, 96, 98, 24, 7, 28, 64, 49, 34, 43, 42, 46, 79, 37, 80, 72, 21, 85, 91, 55, 58, 65, 23, 36, 84, 92, 20, 3, 27, 94, 15, 53, 62, 78, 41, 57, 97, 25, 11];

        sort($array); // ordena o array em ordem crescente
        //dd($array);
        $count = count($array); // obtém o número de elementos no array
        //($count);
        $middle = floor(($count - 1) / 2); // obtém o índice do valor central
        //dd($middle);
        if ($count % 2 == 0) { // verifica se o número de elementos é par
            $left = $array[$middle];
            $right = $array[$middle + 1];

            return ($left + $right) / 2; // retorna a média dos valores centrais
        } else { // o número de elementos é ímpar
            return $array[$middle]; // retorna o valor central
        }
    }

    public function testexecuta()
    {

        $lista = [71, 90, 31, 82, 73, 32, 14, 19, 96, 98, 24, 7, 28, 64, 49, 34, 43, 42, 46, 79, 37, 80, 72, 21, 85, 91, 55, 58, 65, 23, 36, 84, 92, 20, 3, 27, 94, 15, 53, 62, 78, 41, 57, 97, 25, 11];
        echo "A mediana : " . $this->mediana($lista) . "\n\n"; // exibe a mediana
    }

    public function valido($string)
    {
        $regex = '/^R\$\s[1-9]\d{0,2}(\.\d{3})*,\d{3}$/ ';
        if (preg_match($regex, $string)) {
            echo 'válida   \n';
        } else {
            echo 'inválida \n';
        }
    }

    public function testValido()
    {
        $string = 'R$ 1,122';
        $this->valido($string);
    }


    public function desviopadrao($lista)
    {
        $n = count($lista);
        $media = array_sum($lista) / $n;
        $soma_dif_quad = 0;
        foreach ($lista as $valor) {
            $soma_dif_quad += pow(($valor - $media), 2);
        }
        $desvio_padrao = sqrt($soma_dif_quad / $n);
        echo "Desvio padrão: " . $desvio_padrao;
    }

    public function testedesvio()
    {
        $lista = array(71, 90, 31, 82, 73, 32, 14, 19, 96, 98, 24, 7, 28, 64, 49, 34, 43, 42, 46, 79, 37, 80, 72, 21, 85, 91, 55, 58, 65, 23, 36, 84, 92, 20, 3, 27, 94, 15, 53, 62, 78, 41, 57, 97, 25, 11);
        $this->desviopadrao($lista);
    }
}
