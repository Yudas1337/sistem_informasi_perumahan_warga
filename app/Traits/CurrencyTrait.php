<?php

namespace App\Traits;

trait CurrencyTrait
{
    /**
     * convert integer number to rupiah currency format
     *
     * @param int $number
     * 
     * @return mixed
     */

    public function convertRupiah(int $number): mixed
    {
        return number_format($number, 2, ',', '.');
    }
}
