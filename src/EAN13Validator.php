<?php namespace HermesMartins\EAN13;
/**
 * Created by PhpStorm.
 * User: hermes d. martins
 * Date: 29/01/18
 * Time: 16:57
 */

class EAN13Validator
{

    /**
     * @param $ean
     * @return bool
     */
    public function isAValidEAN13($ean)
    {
        $sumEvenIndexes = 0;
        $sumOddIndexes  = 0;

        $eanAsArray = array_map('intval', str_split($ean));

        if (!$this->has13Numbers($eanAsArray)) {
            return false;
        };

        for ($i = 0; $i < count($eanAsArray)-1; $i++) {
            if ($i % 2 === 0) {
                $sumOddIndexes  += $eanAsArray[$i];
            } else {
                $sumEvenIndexes += $eanAsArray[$i];
            }
        }

        $rest = ($sumOddIndexes + (3 * $sumEvenIndexes)) % 10;

        if ($rest !== 0) {
            $rest = 10 - $rest;
        }

        return $rest === $eanAsArray[12];
    }

    /**
     * @param array $ean
     * @return bool
     */
    private function has13Numbers(array $ean)
    {
        return count($ean) === 13;
    }
}